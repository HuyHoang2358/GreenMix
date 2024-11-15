<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Languague;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

class LanguagueController extends Controller
{

    public function index(Request $request): Factory|Application|View
    {
        $languagues = Languague::all();
        //echo "<pre>";
        //print_r($languagues);
        //echo"</pre>";
        //exit;
        return view('admin.content.setting.language.index', [
            'page' => 'setting-language', // dùng để active menu
            'languagues' => $languagues,
        ]);
    }
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view ('admin.content.setting.language.create', [
            'page' => 'setting-language',
        ]);
    }
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request-> all();
     /*   echo "<pre>";
        echo print_r($input);
        echo "</pre>";
        exit;*/

        $item = new Languague();
        $item["name"] = $input["name"];
        $item["slug"] = $input["slug"] ?? Str::slug($input["name"]);
        $item["icon"] = $input["icon"] ?? null;
        $item -> save();

        return redirect()->route('admin.setting.language.index');
    }
    public function edit($id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $languague = Languague::find($id);
        $languagues = $request->all();
        return view('admin.content.setting.language.edit', [
            'page' => 'setting-language',
            'languague' => $languague,
            'languagues' => $languagues,
        ]);
    }
    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();
        $item = Languague::find($id);

        $item["name"] = $input["name"];
        $item["slug"] = $input["slug"] ?? Str::slug($input["name"]);
        $item["icon"] = $input["icon"] ?? null;

        $item->save();
        return redirect()->route('admin.setting.language.index');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $item = Languague::find($id);
        $item -> delete();
        return redirect()->route('admin.setting.language.index');
    }
}
