<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\Models\Product;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

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

        return view('admin.content.product.add',  [
            'page' => 'product-manager', // dùng để active menu
        ]);

    }

    public function store(Request $request){

        DB::beginTransaction();

        try {

            $product = Product::create([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'description' => $request->input('description'),
                'images' => $request->input('images'), 
            ]);

            if($request->input('togglePostFields')){

                $post = Post::create([
                    'name' => $request->input('post-name'),
                    'title' => $request->input('title'),
                    'slug' => $request->input('post-slug'),
                    'description' => $request->input('post-description'),
                    'content' => $request->input('content'),
                    'type_id' => 4,
                    'images' => $request->input('post-thumbnail'), 
                    'seo_keyword' => $request->input('seo-keyword'),
                    'seo_title' => $request->input('seo-title'),
                    'seo_description' => $request->input('seo-description')
                ]);

                $product->post_id = $post->id;

            }

            DB::commit();

            return redirect()->route('admin.product.index')->with('success', 'Thêm mới sản phẩm thành công.');
            
        } catch (\Exception $e) 
        {       
            DB::rollBack();
            return redirect()->route('admin.product.index')->with('error', 'Thêm mới sản phẩm thất bại: ' . $e->getMessage());
        }

    }

    public function edit($id){

        $product = Product::with('post')->findOrFail($id);

        return view('admin.content.product.update', [
            'page' => 'product-manager', 
            'product' => $product,
        ]);

    }

    public function update(Request $request, $id){

        // dd($request->all());

        try {

            $product = Product::findOrFail($id);

            $product->name = $request->input('name');
            $product->slug = $request->input('slug');
            $product->description = $request->input('description');
            $product->images = $request->input('images');

            if($request->input('togglePostFields')){

                $post = Post::find($product->post_id);

                if($post){
                    $post->title = $request->input('title');
                    $post->images = $request->input('post-thumbnail');
                    $post->name = $request->input('post-name');
                    $post->slug = $request->input('post-slug');
                    $post->type_id = 4;
                    $post->description = $request->input('post-description');
                    $post->seo_title = $request->input('seo-title');
                    $post->seo_keyword = $request->input('seo-keyword');
                    $post->seo_description = $request->input('seo-description');
                    $post->content = $request->input('content');    
                } else{
                    DB::beginTransaction();

                    $post = Post::create([
                        'name' => $request->input('post-name'),
                        'title' => $request->input('title'),
                        'slug' => $request->input('post-slug'),
                        'description' => $request->input('post-description'),
                        'content' => $request->input('content'),
                        'type_id' => 4,
                        'images' => $request->input('post-thumbnail'), 
                        'seo_keyword' => $request->input('seo-keyword'),
                        'seo_title' => $request->input('seo-title'),
                        'seo_description' => $request->input('seo-description')
                    ]);
    
                    $product->post_id = $post->id;

                    DB::commit();

                }
                

            } else {

                if($product->post_id){
                    $post = Post::findOrFail($product->post_id);
                    $product->post_id = null;
                    $product->save();
                    $post->delete();
                }
            
            }

            $product->save();

            return redirect()->route('admin.product.index')->with('success', 'Cập nhật sản phẩm thành công.');
            
        } catch (\Exception $e) 
        {       
            DB::rollBack();
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
