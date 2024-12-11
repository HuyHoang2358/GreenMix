<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\DataUsers;
use App\Models\Product;
use Dflydev\DotAccessData\Data;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Contracts\View\View;

class AdminController extends Controller
{
    public function index(): Factory|Application|View
    {
        $dataUsers = DataUsers::orderBy('updated_at', 'desc')->get();
        $addresses = Address::all();
        $products = Product::orderBy('updated_at', 'desc')->paginate(3);
        return view('admin.homepage', [
            'page' => 'homepage', // dùng để active menu
            'dataUsers' => $dataUsers,
            'addresses' => $addresses,
            'products' => $products,
        ]);
    }
}
