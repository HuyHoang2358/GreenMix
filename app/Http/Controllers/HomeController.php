<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $partners = Partner::all();
      // set dieu kiện để lấy ra các địa chỉ hiển thị
        return view('homepage', [
            'partners' => $partners,
        ]);
    }

    public function contact(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('front.contact');
    }
}
