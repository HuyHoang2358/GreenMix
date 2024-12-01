<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\Setting\BannerController;
use App\Models\Address;
use App\Models\Banner;
use App\Models\DataUsers;
use App\Models\Partner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Foundation\Application;


class HomeController extends Controller
{
    // Trang chủ
    public function index(): Factory|Application|View
    {
        $partners = Partner::all();
        $banners = Banner::orderBy('order', 'ASC')->limit(6)->get();
      // set điều kiện để lấy ra các địa chỉ hiển thị
        return view('homepage', [
            'partners' => $partners,
            'banners' => $banners,
        ]);
    }

    // Trang lĩnh vực kinh doanh
    public function business(): Factory|Application|View
    {
        return view('front.business.index');
    }

    // Trang chi tiết lĩnh vực kinh doanh
    public function businessDetail($slug): Factory|Application|View
    {
        return view('front.business.detail');
    }

    // Trang danh sách dòng sản phẩm
    public function product(): Factory|Application|View
    {
        return view('front.product.index');
    }
    // Trang chi tiết dòng sản phẩm
    public function productDetail($slug): Factory|Application|View
    {
        return view('front.product.detail');
    }


    // Trang liên hệ
    public function contact(): Factory|Application|View
    {
        $addresses = Address::all();
        return view('front.contact', [
        'addresses' => $addresses,
        ]);
    }

    public function dataUser(Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();
        try {
            DataUsers::create([
                'name' => $input['name'],
                'company' => $input['company'],
                'phone' => $input['phone'],
                'content' => $input['content'],
                'status' => 1,
            ]);

            // Chuyển hướng về trang danh sách dự án và kèm theo thông báo thành công
            return redirect()->route('home')->with('success', 'Thêm mới thông tin thành công!');

        } catch (Exception $e) {
            // Trường hợp có lỗi xảy ra, chuyển hướng về trang danh sách dự án và kèm theo thông báo lỗi
            return redirect()->route('home')->with('error', 'Thêm mới thông tin thất bại: ' . $e->getMessage());
        }
    }
}
