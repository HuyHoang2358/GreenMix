<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\Setting\BannerController;
use App\Models\Address;
use App\Models\Banner;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Field;
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
        $businesses = Field::with('post')->orderBy('updated_at', 'desc')->paginate(6);
        return view('front.business.index', ['businesses' => $businesses]);
    }

    // Trang chi tiết lĩnh vực kinh doanh
    public function businessDetail($slug): Factory|Application|View
    {   
        $business = Field::where('slug', $slug)->with('post')->first();
        return view('front.business.detail', ['business' => $business]);
    }

    // Trang danh sách dòng sản phẩm
    public function product(): Factory|Application|View
    {   
        $products = Product::with('post')->orderBy('updated_at', 'desc')->paginate(6);

        return view('front.product.index', ['products' => $products]);
    }
    // Trang chi tiết dòng sản phẩm
    public function productDetail($slug): Factory|Application|View
    {
        $product = Product::where('slug', $slug)->with('post')->first();

        return view('front.product.detail', ['product' => $product]);
    }


    // Trang liên hệ
    public function contact(): Factory|Application|View
    {
        return view('front.contact');
    }
}
