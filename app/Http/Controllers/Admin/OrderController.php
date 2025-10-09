<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ParentController;
use App\Http\Resources\Order\OrderDataResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends ParentController
{
    public function index()
    {
        return Inertia::render('Admin/Orders/index');
    }

    public function all(Request $request)
    {
        $query = Order::orderBy('id', 'desc');

        if ($request->filled('search_code')) {
            $query->where('order_code', 'like', '%' . $request->search_code . '%');
        }

        if ($request->filled('search_status')) {
            $query->where('order_status', $request->search_status);
        }

        $payload = $query->paginate($request->input('per_page', config('basic.pagination_per_page')));
        return OrderDataResource::collection($payload);
    }

    public function view($id)
    {
        $order = Order::with(['items.product'])->findOrFail($id);

        return Inertia::render('Admin/Orders/view', [
            'order' => $order
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->order_status = $request->status;
        $order->save();

        return;
    }
}
