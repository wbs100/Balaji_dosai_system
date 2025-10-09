<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ParentController;
use App\Http\Resources\PublicUser\PublicUserDataResource;
use App\Models\PublicUser;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicUserController extends ParentController
{
    public function index()
    {
        return Inertia::render('Admin/PublicUser/index');
    }

    public function all(Request $request)
    {
        $query = PublicUser::orderBy('id', 'desc');

        if ($request->filled('search_name')) {
            $query->where('name', 'like', '%' . $request->search_name . '%');
        }

        if ($request->filled('search_status')) {
            $query->where('status', $request->search_status);
        }

        $payload = $query->paginate($request->input('per_page', config('basic.pagination_per_page')));
        return PublicUserDataResource::collection($payload);
    }

    public function changeStatus($id)
    {
        $user = PublicUser::findOrFail($id);
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        return;
    }
}
