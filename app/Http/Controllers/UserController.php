<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\User\UserDataResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends ParentController
{
    public function index()
    {
        return Inertia::render('Admin/User/index');
    }

    public function all(Request $request)
    {
        $query = User::orderBy('id', 'desc');

        if ($request->filled('search_name')) {
            $query->where('name', 'like', '%' . $request->search_name . '%');
        }

        if ($request->filled('search_role')) {
            $query->where('role_id', $request->search_role);
        }

        if ($request->filled('search_status')) {
            $query->where('status', $request->search_status);
        }

        $payload = $query->paginate($request->input('per_page', config('basic.pagination_per_page')));
        return UserDataResource::collection($payload);
    }

    public function store(StoreUserRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);

        return;
    }

    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        return;
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
