<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProducts extends Controller
{

    public function addproduct(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|integer',
            'menu_id' => 'required|integer',
            'saleof' => 'required|integer',
            'description' => 'required|string',
            'active' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $file_image = $request->file('image');
            $filename  =  $file_image->getClientOriginalName();
            $file_image->move(public_path('storage/image/products'), $filename);
            $data['image'] = 'storage/image/products/' . $filename;
        }

        $products = Products::create($data);

        return response()->json(['message' => "Add product success", 'products' => $products], 202);
    }
    public function getproducts()
    {
        $products = Products::all();
        foreach ($products as $product) {
            $product->image = asset($product->image);
        }
        return response()->json(['message' => 'Data GET success', 'products' => $products]);
    }
    public function updateproduct(Request $request, $id)
    {
        $productid = Products::find($id);
        $productid->name = $request->name;
        $productid->menu_id = $request->menu_id;
        $productid->description = $request->description;
        $productid->price = $request->price;
        $productid->saleof = $request->saleof;
        $productid->active = $request->active;
        if ($request->hasFile('image')) {
            $filePath = public_path($productid->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('storage/image/products/'), $filename);
            $productid->image = 'storage/image/products/' . $filename;
        }
        $productid->save();
        return response()->json(['message' => 'Menu update success !']);
    }
    public function deleteproduct($id)
    {
        $product = Products::find($id);
        $filePath = public_path($product->image);
        unlink($filePath);
        $product->delete();
        return response()->json(['message' => 'Delete success']);
    }
}
