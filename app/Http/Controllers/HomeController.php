<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Partner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $addresses = Address::all(); // set dieu kiện để lấy ra các địa chỉ hiển thị
        return view('homepage', [
            'partners' => $partners,
            'addresses' => $addresses,
        ]);
    }
}
