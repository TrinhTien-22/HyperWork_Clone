<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AdminMenu extends Controller
{
    public function addmenu(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'active' => 'required|string'
        ]);
        if ($request->hasFile('image')) {
            // $imagePath = $request->file('image')->store('public/image/menu');
            // // $data['image'] = 'storage/' . $imagePath;
            // $imageName = $request->file('image')->getClientOriginalName();
            // $data['image'] = asset('storage/image/menu/' . $imageName);
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('storage/image/menu/'), $filename);
            $data['image'] = 'storage/image/menu/' . $filename;
        }

        $menu = Menu::create($data);

        return response()->json(['message' => 'Menu added successfully', 'menu' => $menu], 201);
    }
    public function getmenu(Request $request)
    {
        $menus = Menu::all();
        foreach ($menus as $menu) {
            $menu->image = asset($menu->image);
        }
        return response()->json(['message' => 'Get data menu success !', 'menu' => $menus]);
    }
    public function updatemenu(Request $request, $id)
    {
        $menuid = Menu::find($id);
        $menuid->name = $request->name;
        $menuid->description = $request->description;
        $menuid->active = $request->active;
        if ($request->hasFile('image')) {
            $filePath = public_path($menuid->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('storage/image/menu/'), $filename);
            $menuid->image = 'storage/image/menu/' . $filename;
        }
        $menuid->save();
        return response()->json(['message' => 'Menu update success !']);
    }
}
