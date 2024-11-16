<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\Models\Product;
use App\Models\Post;

class ProductController extends Controller
{
    public function index(): Factory|Application|View
    {

        $products = Product::all();

        return view('admin.content.product.index', [
            'page' => 'product-manager', // dùng để active menu
            'products' => $products
        ]);
    }

    public function create(){

        $posts = Post::all();

        return view('admin.content.product.add',  [
            'page' => 'product-manager', // dùng để active menu
            'posts' => $posts
        ]);

    }

    public function store(Request $request){

        try {

            $product = Product::create([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'post_id' => $request->input('post_id'),
                'images' => $request->input('images'), 
            ]);


            return redirect()->route('admin.product.index')->with('success', 'Thêm mới sản phẩm thành công.');
            
        } catch (\Exception $e) 
        {       
                return redirect()->route('admin.product.index')->with('error', 'Thêm mới sản phẩm thất bại: ' . $e->getMessage());
        }

    }

    public function edit($id){

        $product = Product::findOrFail($id);
        $posts = Post::all();

        return view('admin.content.product.update', [
            'page' => 'product-manager', 
            'product' => $product,
            'posts' => $posts
        ]);

    }

    public function update(Request $request, $id){

        try {

            $product = Product::findOrFail($id);

            $product->name = $request->input('name');
            $product->slug = $request->input('slug');
            $product->description = $request->input('description');
            $product->post_id = $request->input('post_id');
            $product->images = $request->input('images');

            $product->save();

            return redirect()->route('admin.product.index')->with('success', 'Cập nhật sản phẩm thành công.');
            
        } catch (\Exception $e) 
        {       
                return redirect()->route('admin.product.index')->with('error', 'Cập nhật sản phẩm thất bại: ' . $e->getMessage());
        }

    }

    public function destroy(Request $request){

        $id = $request->input('del-product-id');
        
        try {

            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('admin.product.index', [
                'page' => 'product-manager'
            ])->with('success', 'Xóa sản phẩm thành công.');

        } catch (\Exception $e) {

            return redirect()->route('admin.product.index', [
                'page' => 'product-manager'
            ])->with('error', 'Xóa sản phẩm thất bại: ' . $e->getMessage());

        }


    }

}
