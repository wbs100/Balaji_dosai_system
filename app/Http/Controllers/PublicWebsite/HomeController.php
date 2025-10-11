<?php

namespace App\Http\Controllers\PublicWebsite;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categoryIds = Product::select('category_id')->where('stock_quantity', '>', 0)
            ->distinct()
            ->pluck('category_id');

        $categories = Category::whereIn('id', $categoryIds)
            ->take(5)
            ->get();

        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $topProductIds = OrderItem::where('created_at', '>=', $thirtyDaysAgo)
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->pluck('product_id')
            ->toArray();

        $featured_products = Product::with(['category', 'primaryImage'])->whereIn('id', $topProductIds)
            ->where('stock_quantity', '>', 0)
            ->get();

        $deal_products = Product::with(['category', 'primaryImage'])->where('product_discount', '>', 0)
            ->where('stock_quantity', '>', 0)
            ->take(5)
            ->get();

        $snacks = Product::with(['category', 'primaryImage'])
            ->whereHas('category', function ($query) {
                $query->where('name', 'Snacks');
            })
            ->where('stock_quantity', '>', 0)
            ->inRandomOrder()
            ->take(5)
            ->get();

        $latest_products = Product::with(['category', 'primaryImage'])
            ->orderBy('created_at', 'desc')
            ->take(7)
            ->get();

        return view('public.pages.index', compact('categories', 'featured_products', 'deal_products', 'snacks', 'latest_products'));
    }

    public function goToAbout()
    {
        return view('public.pages.about');
    }

    public function goToContact()
    {
        return view('public.pages.contact');
    }

    public function goToSpecialties()
    {
        $categories = Category::withCount('products')->get();

        $products = Product::with('category')->where('status', 'active')->get();

        return view('public.pages.specialties', compact('categories', 'products'));
    }

    public function goToServices()
    {
        return view('public.pages.services');
    }

    public function goToGallery()
    {
        return view('public.pages.gallery');
    }

    public function goToShop()
    {
        return view('public.pages.shop');
    }

    public function goToReturnPolicy()
    {
        return view('public.pages.returnPolicy');
    }

    public function goPrivacyPolicy()
    {
        return view('public.pages.privacyPolicy');
    }

    public function goToTermsConditions()
    {
        return view('public.pages.termsConditions');
    }

    public function getByCategory($id)
    {
        $products = Product::with(['category', 'primaryImage'])
            ->where('category_id', $id)
            ->where('stock_quantity', '>', 0)
            ->take(8)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->primaryImage ? asset($product->primaryImage->image_path) : asset('images/empty_product.png'),
                    'product_discount' => $product->product_discount,
                    'selling_price' => $product->selling_price,
                    'category_name' => $product->category->name ?? 'Unknown',
                ];
            });

        return response()->json($products);
    }

    public function goToProducts(Request $request)
    {
        $categories = Category::withCount('products')->get();
        $brands = Brand::withCount('products')->get();

        $query = Product::with(['primaryImage'])->where('stock_quantity', '>', 0);

        // 🔍 Search filter
        if ($request->filled('search')) {
            $search = strtolower($request->search);
            $query->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
        }

        // 📂 Category filter
        if ($request->filled('category')) {
            $category = Category::where('id', $request->category)
                ->orWhere('name', $request->category)
                ->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // 💰 Price filter
        $minPrice = is_numeric($request->min_price) ? (float) $request->min_price : 0;
        $maxPrice = is_numeric($request->max_price) ? (float) $request->max_price : 1000000;

        if ($minPrice <= $maxPrice) {
            $query->whereBetween('selling_price', [$minPrice, $maxPrice]);
        }

        // 🏷️ Brand filter
        if ($request->filled('brand')) {
            $brand = Brand::where('id', $request->brand)
                ->orWhere('name', $request->brand)
                ->first();
            if ($brand) {
                $query->where('brand_id', $brand->id);
            }
        }

        // 📌 Sorting
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price':
                    $query->orderBy('selling_price', 'asc');
                    break;
                case 'price-desc':
                    $query->orderBy('selling_price', 'desc');
                    break;
                case 'date':
                    $query->orderBy('created_at', 'desc');
                    break;
                default:
                    $query->latest();
            }
        } else {
            $query->latest();
        }

        // 📄 Pagination
        $allowedPerPage = [12, 16, 20];
        $perPage = in_array($request->per_page, $allowedPerPage) ? $request->per_page : 12;

        $products = $query->paginate($perPage);

        // ✅ Pass all data to the view
        return view('public.pages.shop', compact('categories', 'brands', 'products'));
    }

    public function quickView($id)
    {
        $product = Product::with(['primaryImage', 'images', 'category', 'brand'])
            ->where('id', $id)
            ->where('stock_quantity', '>', 0)
            ->firstOrFail();

        $reviews = Review::where('product_id', $product->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $reviewCount = $reviews->count();

        $thirtyDaysAgo = Carbon::now()->subDays(30);

        $topProductIds = OrderItem::where('created_at', '>=', $thirtyDaysAgo)
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->limit(10)
            ->pluck('product_id')
            ->toArray();

        $featured_products = Product::with(['category', 'primaryImage'])->whereIn('id', $topProductIds)
            ->where('stock_quantity', '>', 0)
            ->get();

        return view('public.pages.products.view', compact('product', 'reviews', 'reviewCount', 'featured_products'));
    }

    public function publicLoginPage()
    {
        if (Auth::guard('public_user')->check()) {
            return redirect()->route('user.dashboard');
        }
        return view('public.pages.user.login');
    }

    public function publicRegisterPage()
    {
        if (Auth::guard('public_user')->check()) {
            return redirect()->route('user.dashboard');
        }
        return view('public.pages.user.register');
    }

}
