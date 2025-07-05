<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $menus = Menu::whereNull('parent_id')->with('children')->orderBy('order')->get();
        return view('components/sidebar', compact('menus'));
    }

    public function indexx()
    {
        return view('admin.dashboard', [
            'pageTitle' => 'Dashboard',
            'breadcrumbs' => ['Home' => route('admin.dashboard')],
            'user' => Auth::user(), // kirim user ke view
        ]);
    }
}
