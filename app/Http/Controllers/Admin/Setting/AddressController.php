<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Banner;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(): Factory|Application|View
    {
        $addresses = Address::orderBy('order', 'asc')->paginate(5);
        return view('admin.content.setting.address.index', [
            'page' => 'setting-address',// dùng để active menu
            'addresses' => $addresses,
        ]);
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.content.setting.address.create',[
            'page' => 'setting-address',
        ]);
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();
        $item = new Address();

        $item['name'] = $input['name'];
        $item['detail'] = $input['detail'];
        $item['iframe'] = $input['iframe'];
        $item['order'] = $input['order'];
        $item['is_show'] = $input['is_show'];
        $item->save();

        return redirect()->route('admin.setting.address.index');
    }
    public function edit($id, Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $address = Address::find($id);
        $addresses = $request->all();

        return view('admin.content.setting.address.edit', [
            'page' => 'setting-address',
            'address' => $address,
            'addresses' => $addresses,
        ]);
    }

    public function update($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = $request->all();
        $item = Address::find($id);

        $item['name'] = $input['name'];
        $item['detail'] = $input['detail'];
        $item['iframe'] = $input['iframe'];
        $item['order'] = $input['order'];
        $item['is_show'] = $input['is_show'];
        $item->save();
        return redirect()->route('admin.setting.address.index');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $item = Address::find($id);
        $item -> delete();
        return redirect()->route('admin.setting.address.index');
    }
}
