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
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): Factory|Application|View
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(6);

        return view('admin.content.product.index', [
            'page' => 'product-manager', // dùng để active menu
            'products' => $products
        ]);
    }

    public function create():Factory|Application|View
    {
        return view('admin.content.product.createOrUpdateForm',  [
            'page' => 'product-manager',
            'isUpdate' => false,
            'item' => null,
        ]);

    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        // database transaction
        DB::beginTransaction();

        try {
            $images = $input['images'];
            $imageArray = [];
            if ($images) $imageArray = explode(',', $images); // Tách các phần tử trong mảng image thành các phần tử riêng lẻ dựa vào dấu ','

            // Tạo mới sản phẩm
            $product = Product::create([
                'name' => $input['name'],
                'slug' => $input['slug'] ?? Str::slug($input['name']),
                'description' => $input['description'] ?? '',
                'images' => json_encode($imageArray), // encode mảng image thành chuỗi json
            ]);

            if($request->input('togglePostFields')){
                // Tạo mới bài viết
                $post = Post::create([
                    'name' => $input['name'],
                    'title' => $input['name'],
                    'slug' =>  $input['slug'] ?? Str::slug($input['name']),
                    'description' => $input['description'] ?? '',
                    'content' => $input['content'],
                    'type_id' => 4,
                    'images' => json_encode($imageArray),
                    'seo_keyword' => $input['seo-keyword'],
                    'seo_title' => $input['seo-title'],
                    'seo_description' => $input['seo-description']
                ]);
                $product->post_id = $post->id;
            }
            // Lưu sản phẩm và post vao database
            DB::commit();

            return redirect()->route('admin.product.index')->with('success', 'Thêm mới sản phẩm thành công.');

        } catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->route('admin.product.index')->with('error', 'Thêm mới sản phẩm thất bại: ' . $e->getMessage());
        }

    }

    public function edit($id): Factory|Application|View
    {
        $product = Product::with('post')->findOrFail($id);
        $decodedImages = json_decode($product->images, true);

        // Check if the decoded value is an array
        if (is_array($decodedImages)) {
            // Join the array elements into a comma-separated string
            $product->images = implode(',', $decodedImages);
        }

        return view('admin.content.product.createOrUpdateForm', [
            'page' => 'product-manager',
            'item' => $product,
            'isUpdate' => true,
            'images' => $decodedImages,
        ]);

    }

    public function update(Request $request, $id){

        // TODO: hãy sửa lại cho đúng
        try {
            $product = Product::findOrFail($id);

            $images = $request->input('images');

            if ($images) {
                $imageArray = explode(',', $images);
            } else {
                $imageArray = [];
            }

            $jsonEncodedImages = json_encode($imageArray);

            $product->name = $request->input('name');
            $product->slug = $request->input('slug') ?? Str::slug($request->input('name'));
            $product->description = $request->input('description') ?? '';
            $product->images = $jsonEncodedImages;

            if($request->input('togglePostFields')){

                $post = Post::find($product->post_id);

                if($post){
                    $post->title = $request->input('name');
                    $post->images = $jsonEncodedImages;
                    $post->name = $request->input('name');
                    $post->slug = $request->input('slug') ?? Str::slug($request->input('name'));
                    $post->type_id = 4;
                    $post->description = $request->input('description') ?? '';
                    $post->seo_title = $request->input('seo-title');
                    $post->seo_keyword = $request->input('seo-keyword');
                    $post->seo_description = $request->input('seo-description');
                    $post->content = $request->input('content');
                } else{
                    DB::beginTransaction();

                    $post = Post::create([
                        'name' => $request->input('name'),
                        'title' => $request->input('name'),
                        'slug' => $request->input('slug') ?? Str::slug($request->input('name')),
                        'description' => $request->input('description') ?? '',
                        'content' => $request->input('content'),
                        'type_id' => 4,
                        'images' => $jsonEncodedImages,
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

        // TODO: handle product -> delete post (Tham khảo category model)
        $id = $request->input('del-object-id');

        try {

            $product = Product::findOrFail($id);
            $product->delete();

            return redirect()->route('admin.product.index')->with('success', 'Xóa sản phẩm thành công.');

        } catch (\Exception $e) {

            return redirect()->route('admin.product.index')->with('error', 'Xóa sản phẩm thất bại: ' . $e->getMessage());

        }


    }

}
