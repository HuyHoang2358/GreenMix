<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\Models\Post;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    private $typeMap = [
        'knowledge' => 1,
        'recruitment' => 3,
        'news' => 2,
    ];

    public function index($type): Factory|Application|View
    {

        $type_id = $this->typeMap[$type] ?? 0;

        $posts = Post::where('type_id', $type_id)->get();

        return view('admin.content.post.index', [
            'page' => 'post-'.$type.'-manager', // dùng để active menu
            'type' => $type,
            'posts' => $posts
        ]);

    }

    public function create($type){

        return view('admin.content.post.add', [
            'page' => 'post-'.$type.'-manager', // dùng để active menu
            'type' => $type,
        ]);

    }

    public function store(Request $request, $type){


        // dd($request->all());

        $type_id = $this->typeMap[$type] ?? 0;

        try {

            $post = Post::create([
                'name' => $request->input('name'),
                'title' => $request->input('title'),
                'slug' => $request->input('title'),
                'description' => $request->input('post-description'),
                'content' => $request->input('content'),
                'type_id' => $type_id,
                'content' => $request->input('content'),
                'images' => $request->input('post-thumbnail'), 
                'seo_keyword' => $request->input('seo-keyword'),
                'seo_title' => $request->input('seo-title'),
                'seo_description' => $request->input('seo-description')
            ]);

            //dd($request->input('post-thumbnail'));

            // Create a new News instance
            if($type == 'news'){
                $news = News::create([
                    'name' => $request->input('name'),
                    'slug' => $request->input('slug'),
                    // 'category_id' => $request->input('category'),
                    'post_id' => $post->id,
                ]);
            }

            return redirect()->route('admin.post.index', [
                'type' => $type,
                'page' => 'post-'.$type.'-manager'
            ])->with('success', 'Post created successfully.');
            
        } catch (\Exception $e) 
        {       
                return redirect()->route('admin.post.index', [
                    'type' => $type,
                    'page' => 'post-'.$type.'-manager'
            ])->with('error', 'Failed to create post: ' . $e->getMessage());
        }

    }

    public function edit($type, $id){

        $post = Post::findOrFail($id);
        return view('admin.content.post.update', [
            'post' => $post, 
            'type' => $type,
            'page' => 'post-'.$type.'-manager'
        ]);

    }

    public function update(Request $request, $type, $id){


        $type_id = $this->typeMap[$request->input('type')] ?? 0;

        try {
            
            $post = Post::findOrFail($id);

            $post->title = $request->input('title');
            $post->images = $request->input('post-thumbnail');
            $post->name = $request->input('name');
            $post->slug = $request->input('slug');
            $post->type_id = $type_id;
            $post->description = $request->input('post-description');
            $post->seo_title = $request->input('seo-title');
            $post->seo_keyword = $request->input('seo-keyword');
            $post->seo_description = $request->input('seo-description');
            $post->content = $request->input('content');

            // Save the updated post
            $post->save();
           
            return redirect()->route('admin.post.index', [
                'type' => $type,
                'page' => 'post-'.$type.'-manager'
            ])->with('success', 'Cập nhật bài viết thành công.');
            
        } catch (\Exception $e) {
            return redirect()->route('admin.post.index', [
                'type' => $type,
                'page' => 'post-'.$type.'-manager'
            ])->with('error', 'Cập nhật bài viết thất bại: ' . $e->getMessage());
        }

    }

    public function destroy(Request $request, $type){

        $id = $request->input('del-post-id');
        
        try {

            $post = Post::findOrFail($id);
            $post->delete();
            
            return redirect()->route('admin.post.index', [
                'type' => $type,
                'page' => 'post-'.$type.'-manager'
            ])->with('success', 'Xóa bài viết thành công.');

        } catch (\Exception $e) {

            return redirect()->route('admin.post.index', [
                'type' => $type,
                'page' => 'post-'.$type.'-manager'
            ])->with('error', 'Xóa bài viết thất bại: ' . $e->getMessage());

        }

    }

}
