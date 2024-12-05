<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Post;
use App\Traits\GroupCategoryTrait;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class KnowledgeController extends Controller
{
    use GroupCategoryTrait;
    public function index(): Factory|Application|View
    {
        $posts = News::orderBy('updated_at', 'desc')->paginate(6);
        return view('admin.content.knowledge.index', [
            'page' => 'post-knowledge-manager', // dùng để active menu
            'type' => 'knowledge',
            'title' => 'Bài viết Kiến thức',
            'posts' => $posts
        ]);
    }

    public function create(): Factory|Application|View
    {
        $type = 'knowledge';
        return view('admin.content.knowledge.createOrUpdateForm', [
            'page' => 'post-'.$type.'-manager', // dùng để active menu
            'type' => $type,
            'categories' => $this->getCategories($type),
            'isUpdate' => false,
            'item' => null,
        ]);
    }
    public function store(Request $request): RedirectResponse
    {
        $type = 'knowledge';
        $type_id = $this->typeMap[$type] ?? 0;

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
            // Create a new News instance
            $news = News::create([
                'name' => $request->input('name'),
                'slug' => $request->input('slug') ?? Str::slug($request->input('name')),
                'category_id' => $request->input('category_id'),
                'post_id' => $post->id,
            ]);
            return redirect()->route('admin.knowledge.index')->with('success', 'Thêm mới bài viết thành công.');

        } catch (\Exception $e)
        {
            return redirect()->route('admin.knowledge.index')->with('error', 'Thêm mới bài viết thất bại: ' . $e->getMessage());
        }
    }


    public function edit($id): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {

        $post = News::findOrFail($id);
        return view('admin.content.knowledge.createOrUpdateForm', [
            'type' => 'knowledge',
            'page' => 'post-knowledge-manager',
            'isUpdate' => true,
            'categories' => $this->getCategories('knowledge'),
            'item' => $post,
        ]);

    }

    public function update(Request $request, $id){
        $type = 'knowledge';
        $type_id = $this->typeMap[$type] ?? 0;

        try {
            $new = News::findOrFail($id);
            $new->name = $request->input('name');
            $new->slug = $request->input('slug') ?? Str::slug($request->input('name'));
            $new->category_id = $request->input('category_id');
            $new->save();

            $post = Post::findOrFail($new->post_id);
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

            return redirect()->route('admin.knowledge.index')->with('success', 'Cập nhật bài viết thành công.');

        } catch (\Exception $e) {
            return redirect()->route('admin.knowledge.index')->with('error', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): RedirectResponse
    {

        $id = $request->input('del-object-id');

        try {

            $new = News::findOrFail($id);
            $new->delete();

            return redirect()->route('admin.knowledge.index')->with('success', 'Xóa bài viết thành công.');

        } catch (\Exception $e) {

            return redirect()->route('admin.knowledge.index')->with('error', 'Xóa bài viết thất bại: ' . $e->getMessage());

        }

    }

}
