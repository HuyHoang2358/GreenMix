<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{
    public function index()
    {
        $config = config('website');
        return view('admin.content.setting.config.index', [
            'page' => 'setting-config', // dùng để active menu
            'config' => $config,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $config = var_export($data, true);
        $config = "<?php\n\nreturn " . $config .";";
        file_put_contents(config_path('website.php'), $config);
        Artisan::call('config:clear');
        return redirect()->route('admin.setting.config.index');
    }

}
