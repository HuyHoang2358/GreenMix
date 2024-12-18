<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
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
        // Truyền danh sách lĩnh vực ra để chọn
        $fields = Field::all();
        return view('admin.content.product.createOrUpdateForm',  [
            'page' => 'product-manager',
            'isUpdate' => false,
            'item' => null,
            'fields' => $fields
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

            // Tạo mới sản phẩm
            $product = Product::create([
                'name' => $input['name'],
                'slug' => $input['slug'] ?? Str::slug($input['name']),
                'description' => $input['description'] ?? '',
                'images' => json_encode($imageArray), // encode mảng image thành chuỗi json
                'post_id' => $post->id,
                'field_id' => $input['field_id']
            ]);

            // Lưu sản phẩm và post vao database
            DB::commit();

            return redirect()->route('admin.product.index')->with('success', 'Thêm mới sản phẩm thành công!');

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

        // Truyền danh sách lĩnh vực ra để chọn
        $fields = Field::all();
        return view('admin.content.product.createOrUpdateForm', [
            'page' => 'product-manager',
            'item' => $product,
            'isUpdate' => true,
            'images' => $decodedImages,
            'fields' => $fields
        ]);

    }

    public function update(Request $request, $id): RedirectResponse
    {
        $input = $request->all();
        try {
            // update field
            $product = Product::findOrFail($id);
            $images = $input['images'];
            $imageArray = [];
            if ($images) $imageArray = explode(',', $images); // Tách các phần tử trong mảng image thành các phần tử riêng lẻ dựa vào dấu ','
            $product->images =  json_encode($imageArray);
            $product->name = $input['name'] ?? $product["name"];
            $product->slug = $input["slug"] ?? Str::slug($input["name"]);
            $product->description = $input['description'] ?? $product["description"];
            $product->field_id = $input['field_id'] ?? $product["field_id"];
            $product->save();

            // update post
            $post = Post::findOrFail($product->post_id);
            $post->name = $input["name"] ?? $post["name"];
            $post->title = $input["title"] ?? $post["title"];
            $post->slug = $input["slug"] ?? Str::slug($input["name"]);
            $post->description = $input['description'] ?? $post["description"];
            $post->content = $input['content'] ?? $post["content"];
            $post->images = json_encode($imageArray);
            $post->seo_keyword = $input['seo_keyword'] ?? $post["seo_keyword"];
            $post->seo_title = $input['seo_title'] ?? $post["seo_title"];
            $post->seo_description = $input['seo_description'] ?? $post["seo_description"];



            $post->save();
            return redirect()->route('admin.product.index')->with('success', 'Cập nhật thông tin sản phẩm thành công.');
        } catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->route('admin.product.index')->with('error', 'Cập nhật thông tin sản phẩm thất bại: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
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

