<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $accounts = User::all();
        $current_user_id = auth()->id();

        return view('admin.content.account.index', [
            'accounts' => $accounts,
            'page' => 'account-manager',
            'current_user_id' => $current_user_id
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content.account.add', [
            'page' => 'account-manager',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        try{

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

            return redirect()->route('admin.account.index', [
                'page' => 'account-manager'
            ])->with('success', 'Thêm tài khoản thành công');

        } catch(\Exception $e){

            return redirect()->route('admin.account.index', [
                'page' => 'account-manager'
            ])->with('error', 'Thêm tài khoản thất bại: ' . $e->getMessage());

        };

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);

        if($user->id == auth()->id()){
            return redirect()->route('profile.update');
        }

        return view('admin.content.account.update', [
            'account' => $user,
            'page' => 'account-manager'
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::findOrFail($id);

        if($user->email !== $request->input('email')) {
            // Perform validation
            $request->validate([
                'email' => 'required|string|email|max:255|unique:users,email',
            ]);
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->filled('password')){

            $request->validate([
                'password' => 'nullable|string|min:6|confirmed',
            ]);

            if(Hash::check($request->input('current-password'), $user->password)){
                $user->password = bcrypt($request->input('password'));
            } else {
                return redirect()->back()->with('error', 'Mật khẩu hiện tại không chính xác');
            }

        }

        $user->save();

        return redirect()->route('admin.account.index', [
            'page' => 'account-manager'
        ])->with('success', 'Cập nhật tài khoản thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //

        $id = $request->input('del-account-id');
        $user = User::findOrFail(auth()->id());

        try {

            $user_to_delete = User::findOrFail($id);

            if(!Hash::check($request->input('password'), $user->password)){
                return redirect()->route('admin.account.index', [
                    'page' => 'account-manager'
                ])->with('error', 'Mật khẩu người dùng không chính xác.');
            }

            $user_to_delete->delete();

            return redirect()->route('admin.account.index', [
                'page' => 'account-manager'
            ])->with('success', 'Xóa tài khoản thành công.');

        } catch (\Exception $e) {

            return redirect()->route('admin.account.index', [
                'page' => 'account-manager'
            ])->with('error', 'Xóa tài khoản thất bại.');

        }


    }
}
