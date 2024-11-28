<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Field;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class FieldController extends Controller
{
    public function index(): Factory|Application|View
    {
        $fields = Field::orderBy('updated_at', 'desc')->paginate(6);

        return view('admin.content.field.index', [
            'page' => 'field-manager', // dùng để active menu
            'fields' => $fields,
        ]);
    }
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.content.field.createOrUpdateForm',  [
            'page' => 'field-manager',
            'isUpdate' => false,
            'item' => null,
        ]);

    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // database transaction
        $input = $request->all();
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
                'type_id' => 5,
                'images' => json_encode($imageArray),
                'seo_keyword' => $input['seo-keyword'],
                'seo_title' => $input['seo-title'],
                'seo_description' => $input['seo-description']
            ]);

            // Tạo mới sản phẩm
            $field = Field::create([
                'name' => $input['name'],
                'slug' => $input['slug'] ?? Str::slug($input['name']),
                'images' => json_encode($imageArray), // encode mảng image thành chuỗi json
                'description' => $input['description'] ?? '',
                'post_id' =>  $post->id,
            ]);

            // Lưu sản phẩm và post vao database
            DB::commit();

            return redirect()->route('admin.field.index')->with('success', 'Thêm mới lĩnh vực kinh doanh thành công.');

        } catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->route('admin.field.index')->with('error', 'Thêm mới lĩnh vực kinh doanh thất bại: ' . $e->getMessage());
        }
    }

    public function edit($id): Factory|Application|View
    {
        $field = Field::with('post')->findOrFail($id);
        $decodedImages = json_decode($field->images, true);

        // Check if the decoded value is an array
        if (is_array($decodedImages)) {
            // Join the array elements into a comma-separated string
            $field->images = implode(',', $decodedImages);
        }

        return view('admin.content.field.createOrUpdateForm', [
            'page' => 'field-manager',
            'item' => $field,
            'isUpdate' => true,
            'images' => $decodedImages,
        ]);

    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();

        try {
            // update field
            $field = Field::findOrFail($id);
            $images = $input['images'];
            $imageArray = [];
            if ($images) $imageArray = explode(',', $images); // Tách các phần tử trong mảng image thành các phần tử riêng lẻ dựa vào dấu ','
            $field->images =  json_encode($imageArray);
            $field->name = $input['name'] ?? $field["name"];
            $field->slug = $input["slug"] ?? Str::slug($input["name"]);
            $field->description = $input['description'] ?? $field["description"];

            // update post
            $post = Post::findOrFail($field->post_id);
            $post->name = $input["name"] ?? $post["name"];
            $post->title = $input["title"] ?? $post["title"];
            $post->slug = $input["slug"] ?? Str::slug($input["name"]);
            $post->description = $input['description'] ?? $post["description"];
            $post->content = $input['content'] ?? $post["content"];
            $post->images = json_encode($imageArray);
            $post->seo_keyword = $input['seo_keyword'] ?? $post["seo_keyword"];
            $post->seo_title = $input['seo_title'] ?? $post["seo_title"];
            $post->seo_description = $input['seo_description'] ?? $post["seo_description"];


            $field->save();
            $post->save();
            return redirect()->route('admin.field.index')->with('success', 'Cập nhật lĩnh vực kinh doanh thành công.');
        } catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->route('admin.field.index')->with('error', 'Cập nhật lĩnh vực kinh doanh thất bại: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id =  $request->input('del-object-id');
        $field = Field::findOrFail($id);
        if ($field) $field->delete(); // Neu field ko null thi xoa
        return redirect()->route('admin.field.index')->with('success', 'Xóa lĩnh vực kinh doanh thành công.');
    }

}
