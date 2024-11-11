<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class CategoryController extends Controller
{
    public function index($type): Factory|Application|View
    {
        return view('admin.content.category.index', [
            'page' => 'category-'.$type.'-manager', // dùng để active menu
            'type' => $type
        ]);
    }
}
