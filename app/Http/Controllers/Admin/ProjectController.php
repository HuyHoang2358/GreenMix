<?php
namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

use App\Models\Project;
use App\Http\Controllers\Controller;

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
        return view('admin.content.project.add', [
            'page' => 'project-manager', // dùng để active menu
        ]);

    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        try {
            // Tạo mới dự án với dữ liệu được gửi lên từ form
            Project::create([
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'image' => $request->input('image')
            ]);

            // Chuyển hướng về trang danh sách dự án và kèm theo thông báo thành công
            return redirect()->route('admin.project.index')->with('success', 'Thêm mới dự án thành công!');

        } catch (Exception $e) {
            // Trường hợp có lỗi xảy ra, chuyển hướng về trang danh sách dự án và kèm theo thông báo lỗi
            return redirect()->route('admin.project.index')->with('error', 'Thêm mới dự án thất bại: ' . $e->getMessage());
        }
    }


    public function edit($id): Factory|Application|View
    {
        $project = Project::findOrFail($id);

        return view('admin.content.project.edit', [
            'page' => 'project-manager', // dùng để active menu
            'project' => $project
        ]);
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        try {
            $project = Project::findOrFail($id);

            $project->name = $request->input('name');
            $project->address = $request->input('address');
            $project->image = $request->input('image');
            $project->save();

            return redirect()->route('admin.project.index')->with('success', 'Cập nhật dự án thành công!');
        } catch (Exception $e) {
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
