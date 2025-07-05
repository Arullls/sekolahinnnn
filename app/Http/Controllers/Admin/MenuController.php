<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::with('children')->whereNull('parent_id')->orderBy('order')->get();

        return view('admin.menu.index', [
            'menus' => $menus,
            'pageTitle' => 'Page Menu',
            'breadcrumbs' => [
                'Home' => route('admin.dashboard'),
                'Menu' => null,
            ],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
            'route' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'parent_id' => 'nullable|exists:menus,id',
        ]);

        $menu = Menu::create($validated);

        return response()->json(['message' => 'Menu berhasil dibuat', 'menu' => $menu]);
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return response()->json(['message' => 'Menu berhasil dihapus']);
    }
}
