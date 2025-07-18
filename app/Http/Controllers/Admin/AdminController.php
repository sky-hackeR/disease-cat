<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

use App\Models\SiteInfo as Setting;
use App\Models\Social;
use App\Models\Admin;
use App\Models\Swiper;


use SweetAlert;
use Alert;
use Log;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){
        $setting = Setting::first();
        if(empty($setting->favicon) || empty($setting->site_name) || empty($setting->logo_bottom) || empty($setting->logo_top) || empty($setting->image)){
            return view('admin.siteSettings', [
                'setting' => $setting
            ]);
        }

        return view('admin.home');
    }

    public function siteSettings(){
        $setting = Setting::first();
        return view('admin.siteSettings', [
            'setting' => $setting,
        ]);
    }

    public function socials(){
        $socials = Social::get();
        return view('admin.socials', [
            'socials' => $socials
        ]);
    }

    public function contacts(){
        $contacts = ContactInfo::get();
        return view('admin.contacts', [
            'contacts' => $contacts
        ]);
    }

    public function swipers(){
        $swipers = Swiper::get();
        return view('admin.swipers', [
            'swipers' => $swipers
        ]);
    }
}
