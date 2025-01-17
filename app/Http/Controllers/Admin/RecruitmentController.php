<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recruitment;
use Illuminate\Http\Request;
use App\Traits\GroupCategoryTrait;

class RecruitmentController extends Controller
{

    use GroupCategoryTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $recruitments = Recruitment::with('category')->get();
         
        return view('admin.content.recruitment.index',[
            'recruitments' => $recruitments,
            'page' => 'recruitment-manager'        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = $this->getCategories('recruitment');
        return view('admin.content.recruitment.add',[
            'page' => 'recruitment-manager',
            'categories' => $categories     
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'num_people' => 'required|integer|min:1',
        ]);

        try {
            // Create a new recruitment
            $recruitment = Recruitment::create([
                'name' => $request->input('name'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'category_id' => $request->input('category'),
                'address' => $request->input('address'),
                'num_people' => $request->input('num_people'),
                'description' => $request->input('description'),
                'requirements' => $request->input('requirements'),
                'benefit' => $request->input('benefit'),
            ]);

            return redirect()->route('admin.recruitment.index')->with('success', 'Thêm mới vị trí ứng tuyển thành công.');

        } catch (\Exception $e) {
            return redirect()->route('admin.recruitment.index')->with('error', 'Thêm mới vị trí ứng tuyển thất bại: ' . $e->getMessage());
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $recruitment = Recruitment::with('category')->findOrFail($id);

        $categories = $this->getCategories('recruitment');

        return view('admin.content.recruitment.update',[
            'page' => 'recruitment-manager',
            'recruitment' => $recruitment,
            'categories' => $categories     
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // dd($request->all());

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'num_people' => 'required|integer|min:1',
        ]);

        try {
            // Create a new recruitment
            $recruitment = Recruitment::findOrFail($id);

            $recruitment->name = $request->input('name');
            $recruitment->start_date = $request->input('start_date');
            $recruitment->end_date = $request->input('end_date');
            $recruitment->category_id = $request->input('category');
            $recruitment->address = $request->input('address');
            $recruitment->num_people = $request->input('num_people');
            $recruitment->description = $request->input('description');
            $recruitment->requirements = $request->input('requirements');
            $recruitment->benefit = $request->input('benefit');

            $recruitment->save();

            return redirect()->route('admin.recruitment.index')->with('success', 'Cập nhật vị trí ứng tuyển thành công.');

        } catch (\Exception $e) {
            return redirect()->route('admin.recruitment.index')->with('error', 'Cập nhật vị trí ứng tuyển thất bại: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        try{

            Recruitment::findOrFail($request->input('del-recruitment-id'))->delete();

            return redirect()->route('admin.recruitment.index')->with('success', 'Xóa vị trí ứng tuyển thành công.');

        }catch (\Exception $e) {

            return redirect()->route('admin.recruitment.index')->with('error', 'Xóa vị trí ứng tuyển thất bại: ' . $e->getMessage());

        }


    }
}
