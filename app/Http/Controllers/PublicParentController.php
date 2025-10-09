<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicParentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:public_user');
    }
}
