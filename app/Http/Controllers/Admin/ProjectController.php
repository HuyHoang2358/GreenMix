<?php
namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(): Factory|Application|View
    {
        // Lấy ra danh sách dự án có phân trang và săp xếp theo thời gian cập nhật mới nhất
        $projects = Project::orderBy('updated_at', 'desc')->paginate(6);

        // Trả về view index và truyền biến projects chứa danh sách dự án
        return view('admin.content.project.index', [
            'page' => 'project-manager', // dùng để active menu
            'projects' => $projects
        ]);
    }

    public function create(): Factory|Application|View
    {
        // Trả về view thêm mới dự án
        return view('admin.content.project.createOrUpdateForm', [
            'isUpdate' => false, // dùng để hiển thị form thêm mới
            'item' => null, // dùng để truyền dữ liệu vào form
            'page' => 'project-manager', // dùng để active menu
        ]);

    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();

        // database transaction
        DB::beginTransaction();
        try {
            // Tạo mới bài viết
            $post = Post::create([
                'name' => $input['name'],
                'title' => $input['name'],
                'slug' =>  $input['slug'] ?? Str::slug($input['name']),
                'description' => $input['description'] ?? '',
                'content' => $input['content'],
                'type_id' => 4,
                'images' => $input['images'],
                'seo_keyword' => $input['seo-keyword'],
                'seo_title' => $input['seo-title'],
                'seo_description' => $input['seo-description']
            ]);

            // Tạo mới dự án với dữ liệu được gửi lên từ form
            Project::create([
                'name' => $input['name'],
                'address' => $input['address'],
                'image' => $input['images'],
                'order' => $input['order'],
                'slug' => $input['slug'] ?? Str::slug($input['name']),
                'post_id' => $post->id,
            ]);

            // Lưu dự án và post vao database
            DB::commit();

            // Chuyển hướng về trang danh sách dự án và kèm theo thông báo thành công
            return redirect()->route('admin.project.index')->with('success', 'Thêm mới dự án thành công!');

        } catch (Exception $e) {

            DB::rollBack();
            return redirect()->route('admin.project.index')->with('error', 'Thêm mới dự án thất bại: ' . $e->getMessage());
        }
    }


    public function edit($id): Factory|Application|View
    {
        $project = Project::findOrFail($id);
        $post = Post::findOrFail($project->post_id);

        return view('admin.content.project.createOrUpdateForm', [
            'page' => 'project-manager', // dùng để active menu
            'isUpdate' => true, // dùng để hiển thị form cập nhật
            'item' => $project,
            'selectedImage' =>  $post->images,
        ]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();
        try {
            $project = Project::findOrFail($id);

            $project->name = $request->input('name');
            $project->address = $request->input('address');
            $project->image = $request->input('images');
            $project->order = $request->input('order');

            // update post
            $post = Post::findOrFail($project->post_id);
            $post->name = $input["name"] ?? $post["name"];
            $post->title = $input["title"] ?? $post["title"];
            $post->slug = $input["slug"] ?? Str::slug($input["name"]);
            $post->description = $input['description'] ?? $post["description"];
            $post->content = $input['content'] ?? $post["content"];
            $post->images = $input['images'];
            $post->seo_keyword = $input['seo_keyword'] ?? $post["seo_keyword"];
            $post->seo_title = $input['seo_title'] ?? $post["seo_title"];
            $post->seo_description = $input['seo_description'] ?? $post["seo_description"];

            $post->save();
            $project->save();

            return redirect()->route('admin.project.index')->with('success', 'Cập nhật dự án thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.project.index')->with('error', 'Cập nhật dự án thất bại: ' . $e->getMessage());
        }
    }

    public function destroy(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $project = Project::findOrFail($request->input('del-object-id'));
            $project->delete();

            return redirect()->route('admin.project.index')->with('success', 'Xóa dự án thành công.');
        } catch (Exception $e) {
            return redirect()->route('admin.project.index')->with('error', 'Xóa dự án thất bại: ' . $e->getMessage());
        }
    }

}
