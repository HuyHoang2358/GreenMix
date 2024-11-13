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
    public function index($type): Factory|Application|View
    {

        switch($type){
            case 'product':
                $type_id = 1;
                break;
            case 'recruitmnet':
                $type_id = 3;
                break;
            case 'news':
                $type_id = 2;
                break;
            default:
                $type_id = 0;
        }

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

        switch($type){
            case 'product':
                $type_id = 1;
                break;
            case 'recruitmnet':
                $type_id = 3;
                break;
            case 'news':
                $type_id = 2;
                break;
            default:
                $type_id = 0;
        }

        try {

            //dd($seo->id);

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
            $news = News::create([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                // 'category_id' => $request->input('category'),
                'post_id' => $post->id,
            ]);

            DB::commit();

            return redirect()->route('admin.post.index', [
                'type' => $type,
            ])->with('success', 'Post created successfully.');
            
        } catch (\Exception $e) 
        {       
                DB::rollBack();
                return redirect()->route('admin.post.index', [
                    'type' => $type,
            ])->with('error', 'Failed to create post: ' . $e->getMessage());
        }

    }

}
