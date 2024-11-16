<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;

class PartnerController extends Controller
{
    public function index(): Factory|Application|View
    {
        $partners = Partner::orderBy('order', 'asc')->paginate(5);
        return view('admin.content.partner.index', [
            'page' => 'partner-manager', // dùng để active menu\
            'partners' => $partners,
        ]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.content.partner.create',[
            'page' => 'setting-partner',
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();
        $item = new Partner();

        $item['name'] = $input['name'];
        $item['logo'] = $input['logo'];
        $item['url'] = $input['url'];
        $item['order'] = $input['order'];
        $item->save();

        return redirect()->route('admin.partner.index');
    }
    public function edit($id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $partner = Partner::find($id);
        $partners = $request->all();

        return view('admin.content.partner.edit', [
            'page' => 'setting-partner',
            'partner' => $partner,
            'partners' => $partners,
        ]);
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();
        $item = Partner::find($id);

        $item['name'] = $input['name'];
        $item['logo'] = $input['logo'];
        $item['url'] = $input['url'];
        $item['order'] = $input['order'];
        $item->save();
        return redirect()->route('admin.partner.index');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $item = Partner::find($id);
        $item -> delete();
        return redirect()->route('admin.partner.index');
    }
}
