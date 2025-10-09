<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ParentController;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends ParentController
{
    public function index()
    {
        return Inertia::render('Admin/Settings/index');
    }
}
