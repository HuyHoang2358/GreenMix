<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\GroupCategoryTrait;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\Models\Post;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
class PostController extends Controller
{

    use GroupCategoryTrait;
    private array $typeMap = [
        'introduce' => 0,
        'knowledge' => 1,
        'post' => 2,
        'product' => 4
    ];
    private function getPageTitle($type): string
    {
        return match ($type) {
            'introduce' => 'Bài viết giới thiệu',
            'knowledge' => 'Bài viết Kiến thức',
            'post' => 'Bài viết truyền thông',
            'product' => 'Bài viết sản phẩm',
            default => '',
        };
    }

    public function index($type): Factory|Application|View
    {

        $type_id = $this->typeMap[$type] ?? 0;

        $posts = Post::where('type_id', $type_id)->orderBy('updated_at', 'desc')->paginate(6);

        return view('admin.content.post.index', [
            'page' => 'post-'.$type.'-manager', // dùng để active menu
            'type' => $type,
            'title' => $this->getPageTitle($type),
            'posts' => $posts
        ]);

    }

    public function create($type): Factory|Application|View
    {
        return view('admin.content.post.createOrUpdateForm', [
            'page' => 'post-'.$type.'-manager', // dùng để active menu
            'type' => $type,
            'categories' => $this->getCategories($type),
            'isUpdate' => false,
            'item' => null,
        ]);

    }

    public function store(Request $request, $type): RedirectResponse
    {
        $type_id = $this->typeMap[$type];

        try {
            $post = Post::create([
                'name' => $request->input('name'),
                'title' => $request->input('title'),
                'slug' => $request->input('slug') ?? Str::slug($request->input('name')),
                'description' => $request->input('post-description'),
                'content' => $request->input('content'),
                'type_id' => $type_id,
                'images' => $request->input('post-thumbnail'),
                'seo_keyword' => $request->input('seo-keyword'),
                'seo_title' => $request->input('seo-title'),
                'seo_description' => $request->input('seo-description')
            ]);

            return redirect()->route('admin.post.index', ['type' => $type,])->with('success', 'Thêm mới bài viết thành công.');

        } catch (\Exception $e)
        {
                return redirect()->route('admin.post.index', ['type' => $type,])->with('error', 'Thêm mới bài viết thất bại: ' . $e->getMessage());
        }

    }

    public function edit($type, $id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {

        $post = Post::findOrFail($id);
        return view('admin.content.post.createOrUpdateForm', [
            'type' => $type,
            'page' => 'post-'.$type.'-manager',
            'isUpdate' => true,
            'item' => $post,
        ]);

    }

    public function update(Request $request, $type, $id){


        $type_id = $this->typeMap[$type] ?? 0;

        try {

            $post = Post::findOrFail($id);

            $post->title = $request->input('title');
            $post->images = $request->input('post-thumbnail');
            $post->name = $request->input('name');
            $post->slug = $request->input('slug') ?? Str::slug($request->input('name'));
            $post->type_id = $type_id;
            $post->description = $request->input('post-description');
            $post->seo_title = $request->input('seo-title');
            $post->seo_keyword = $request->input('seo-keyword');
            $post->seo_description = $request->input('seo-description');
            $post->content = $request->input('content');

            // Save the updated post
            $post->save();

            return redirect()->route('admin.post.index', ['type' => $type,])->with('success', 'Cập nhật bài viết thành công.');

        } catch (\Exception $e) {
            return redirect()->route('admin.post.index', ['type' => $type,])->with('error', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
        }

    }

    public function destroy(Request $request, $type){

        $id = $request->input('del-object-id');

        try {

            $post = Post::findOrFail($id);
            $post->delete();

            return redirect()->route('admin.post.index', ['type' => $type,])->with('success', 'Xóa bài viết thành công.');

        } catch (\Exception $e) {

            return redirect()->route('admin.post.index', ['type' => $type,])->with('error', 'Xóa bài viết thất bại: ' . $e->getMessage());

        }

    }

}
