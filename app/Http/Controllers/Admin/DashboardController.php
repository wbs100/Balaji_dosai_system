<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\PublicUser;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPendingOrders = Order::where('order_status', 'pending')->count();
        $totalIncome = Order::where('order_status', 'completed')->sum('total');
        $totalCustomers = PublicUser::count();
        $totalProducts = Product::count();

        // Monthly Sales
        $monthlySales = array_fill(0, 12, 0);

        $sales = Order::selectRaw('MONTH(created_at) as month, SUM(total) as total_amount')
            ->whereYear('created_at', now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->get();

        foreach ($sales as $sale) {
            $monthlySales[$sale->month - 1] = (float) $sale->total_amount;
        }

        //Monthly Enrollment
        $monthlyCustomers = array_fill(0, 12, 0);

        $customers = PublicUser::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->get();

        foreach ($customers as $customer) {
            $monthlyCustomers[$customer->month - 1] = (int) $customer->total;
        }

        return Inertia::render('Admin/Dashboard/index', [
            'totalPendingOrders' => $totalPendingOrders,
            'totalIncome' => $totalIncome,
            'totalCustomers' => $totalCustomers,
            'totalProducts' => $totalProducts,
            'monthlySales' => $monthlySales,
            'monthlyCustomers' => $monthlyCustomers,
        ]);
    }

    public function task()
    {
        return Inertia::render('Admin/Dashboard/task');
    }
}
