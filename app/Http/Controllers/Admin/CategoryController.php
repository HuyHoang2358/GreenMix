<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\GroupCategoryTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use GroupCategoryTrait;


    // TODO: Phương thức điền dữ liệu vào đối tượng danh mục và lưu lại
    private function fillDataToModel($item, $input, $type): void
    {
        $item["name"] = $input["name"]; // Gán tên danh mục
        $item["slug"] = $input["slug"] ?? Str::slug($input["name"]); // Gán slug cho danh mục, nếu không có slug thì tạo từ tên danh mục
        $item["icon"] = $input["icon"] ?? ""; // Gán icon nếu có
        $item["description"] = $input["description"] ?? ""; // Gán mô tả nếu có
        $item["type"] = $type; // Gán nhóm danh mục
        $item["parent_id"] = $input["parent_id"]; // Gán danh mục cha
        $item->save(); // Lưu đối tượng danh mục vào cơ sở dữ liệu
    }

    // TODO: Trả về view hiển thị danh sách danh mục loại $type
    public function index($type): Factory|Application|View
    {
        return view('admin.content.category.index', [
            'page' => 'category-'.$type.'-manager', // dùng để active menu
            'type' => $type,
            "categories" => $this->getCategories($type),
            "type_name" => $this->getGroupName($type)
        ]);
    }

    // TODO: Phương thức hiển thị trang thêm mới danh mục
    public function create($type): Factory|View|Application
    {
        return view("admin.content.category.add",[
            'page' => 'category-'.$type.'-manager', // dùng để active menu
            'type' => $type,
            "categories" => $this->getCategories($type),
            "type_name" => $this->getGroupName($type)
        ]);
    }

    // TODO: Phương thức lưu danh mục mới vào CSDL
    public function store(Request $request, $type): RedirectResponse
    {
        $input = $request->all(); // Lấy tất cả dữ liệu từ request
        $category = new Category(); // Tạo đối tượng danh mục mới
        $this->fillDataToModel($category, $input, $type); // Điền dữ liệu và lưu lại

        return redirect()->route("admin.category.index", $type); // Chuyển hướng về trang danh sách danh mục
    }

    // TODO: Phương thức hiển thị trang chỉnh sửa danh mục
    public function edit($type, $id): Factory|View|Application|RedirectResponse
    {
        $item = Category::find($id); // Tìm danh mục trong CSDL theo id
        if (!$item)  return redirect()->back(); // Nếu không tìm thấy, quay lại trang trước

        return view('admin.content.category.edit', [
            "item" => $item, // Truyền đối tượng danh mục vào view
            'page' => 'category-'.$type.'-manager', // dùng để active menu sidebar
            'type' => $type,
            "categories" => $this->getCategories($type),
            "type_name" => $this->getGroupName($type)
        ]);
    }

    // TODO: Phương thức cập nhật danh mục
    public function update($type, $id, Request $request): RedirectResponse
    {
        $item = Category::find($id); // Tìm danh mục theo id
        if (!$item) return redirect()->back(); // Nếu không tìm thấy, quay lại trang trước

        $input = $request->all(); // Lấy tất cả dữ liệu từ request
        $this->fillDataToModel($item, $input, $type); // Điền dữ liệu và lưu lại

        return redirect()->route("admin.category.index", $type); // Chuyển hướng về trang danh sách danh mục
    }

    // TODO: Phương thức xóa danh mục
    public function destroy($group,$id): RedirectResponse
    {
        $item = Category::find($id); // Tìm danh mục theo id
        if (!$item) return redirect()->back(); // Nếu không tìm thấy, quay lại trang trước

        $item->delete(); // Xóa danh mục
        return redirect()->route("admin.category.index", $group); // Chuyển hướng về trang danh sách danh mục
    }

}
