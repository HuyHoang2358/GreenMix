<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(): Factory|Application|View
    {   

        $projects = Project::all();

        return view('admin.content.project.index', [
            'page' => 'project-manager', // dùng để active menu
            'projects' => $projects
        ]);
    }

    public function create(){

        return view('admin.content.project.add', [
            'page' => 'project-manager', // dùng để active menu
        ]);

    }

    public function store(Request $request){

        try {

            Project::create([

                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'image' => $request->input('image')

            ]);

            return redirect()->route('admin.project.index', [
                'page' => 'project-manager'
            ])->with('success', 'Thêm mới dự án thành công.');
            
        } catch (\Exception $e) 
        {       
                return redirect()->route('admin.project.index', [
                    'page' => 'project-manager'
            ])->with('error', 'Thêm mới dự án thất bại: ' . $e->getMessage());
        }

    }

    public function edit($id){

        $project = Project::findOrFail($id);

        return view('admin.content.project.update', [
            'page' => 'project-manager', // dùng để active menu\
            'project' => $project
        ]);

    }

    public function update(Request $request, $id){

        try {

            $project = Project::findOrFail($id);

            $project->name = $request->input('name');
            $project->address = $request->input('address');
            $project->image = $request->input('image');

            $project->save();

            return redirect()->route('admin.project.index', [
                'page' => 'project-manager'
            ])->with('success', 'Cập nhật dự án thành công.');
            
        } catch (\Exception $e) 
        {       
                return redirect()->route('admin.project.index', [
                    'page' => 'project-manager'
            ])->with('error', 'Cập nhật dự án thất bại: ' . $e->getMessage());
        }

    }

    public function destroy(Request $request){

        try {

            $project = Project::findOrFail($request->input('del-project-id'));

            $project->delete();

            return redirect()->route('admin.project.index', [
                'page' => 'project-manager'
            ])->with('success', 'Xóa dự án thành công.');
            
        } catch (\Exception $e) 
        {       
                return redirect()->route('admin.project.index', [
                    'page' => 'project-manager'
            ])->with('error', 'Xóa dự án thất bại: ' . $e->getMessage());
        }

    }

}
