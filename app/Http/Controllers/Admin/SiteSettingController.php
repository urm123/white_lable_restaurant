<?php

namespace App\Http\Controllers\Admin;

use App\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.index');
    }

    public function store(Request $request)
    {
        $section = 'restaurant';
        $rules = SiteSetting::getValidationRules($section);
        $data = $this->validate($request, $rules);
        $validSettings = array_keys($rules);
        foreach ($data as $key => $val) {
            if( in_array($key, $validSettings) ) {
                SiteSetting::add($key, $val, SiteSetting::getDataType($key, $section));
                $type = SiteSetting::getInputType($key, $section);
                // handle file upload
                if (in_array($type, [$key, 'file'])) {
                    $this->uploadFile($key, $request, $section);
                }
            }
        }
        Artisan::call('config:cache');

        return redirect()->back()->with('success', 'Settings has been saved.');
    }


    private function uploadFile($key, $request, $section)
    {
        $uploadedPath = SiteSetting::getFilePath($key, $section);
        $settingName = $key;

        if ($request->$settingName) {
            $file = $request->file($settingName);
            $logoName = $file->getClientOriginalName();
            $uploadedPath = storage_path('app/public') .'/'.$uploadedPath;
            SiteSetting::set($settingName, $logoName);
            File::Delete($uploadedPath . $logoName);
            $file->move($uploadedPath, $logoName);
        }
        return $uploadedPath;
    }
}
