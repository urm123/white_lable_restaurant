<?php

namespace App\Http\Controllers\MasterAdmin;

use App\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class SiteSettingController extends Controller
{
    public function index()
    {
        return view('master-admin.settings.index');
    }

    public function store(Request $request)
    {
        $section = 'features';
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

    public function general()
    {
        $section = 'general';
        return view('master-admin.settings.general_setting', compact('section'));
    }


    public function mail()
    {
        $section = 'mail';
        return view('master-admin.settings.general_setting', compact('section'));
    }

    public function api()
    {
        $section = 'api';
        return view('master-admin.settings.general_setting', compact('section'));
    }

    public function app()
    {
        $section = 'app-settings';
        return view('master-admin.settings.general_setting', compact('section'));
    }

    public function getHomePage()
    {
        return view('master-admin.settings.home_page_setting');
    }

    public function getMenuPage()
    {
        return view('master-admin.settings.menu_page_setting');
    }

    public function getAboutPage()
    {
        return view('master-admin.settings.about_page_setting');
    }

    public function getContactPage()
    {
        return view('master-admin.settings.contact_page_setting');
    }

    public function getTermsPage()
    {
        return view('master-admin.settings.terms_page_setting');
    }

    public function getPrivacyPage()
    {
        return view('master-admin.settings.privacy_page_setting');
    }

    public function getFaqPage()
    {
        return view('master-admin.settings.faq_page_setting');
    }

    public function getReviewPage()
    {
        return view('master-admin.settings.review_page_setting');
    }

    public function postPageData(Request $request)
    {
        $section = $request->section;
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
            $uploadedPath = $request->file($settingName)->store('site');
            SiteSetting::set($settingName, $uploadedPath);
            File::Delete($uploadedPath);
        }
        return $uploadedPath;
    }

    public function getManageAttributesPage()
    {
        return view('master-admin.settings.attributes_setting');
    }
}
