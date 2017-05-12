<?php

namespace AbysKit\Http\Controllers;

use AbysKit\Role;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        if(auth()->check()) {
            $user = auth()->user();

            if($user->role->permission > 222) {
                return view('abyskit::layouts.index');
            }
        }

        return redirect(route('abyskit.login.page'));
    }
}