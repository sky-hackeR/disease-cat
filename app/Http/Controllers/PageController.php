<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

use App\Models\SiteInfo as Setting;
use App\Models\Swiper;
use App\Models\Banner;
use App\Models\Service;
use App\Models\About;



use SweetAlert;
use Alert;
use Log;
use Carbon\Carbon;

class PageController extends Controller
{
    public function welcome() {
        $swipers = Swiper::all();
        $banners = Banner::first();
        $services = Service::all();
        return view('welcome',[
            'swipers' => $swipers, 
            'banners' => $banners,
            'services' => $services
        ]);
    }

    public function viewService($slug){
        $service = Service::where('slug', $slug)->firstOrFail();
        $allServices = Service::all();
        $banner = Banner::first();

        $benefits = [];

        if (str_contains($service->description, 'More Benefits:')) {
            [, $after] = explode('More Benefits:', $service->description, 2);
            $benefits = array_filter(array_map('trim', explode('.', $after)));
        }

        return view('viewService', [
            'service' => $service,
            'allServices' => $allServices,
            'banner' => $banner,
            'benefits' => $benefits,
        ]);
    }

    public function about() {
        $about = About::first();
        $services = Service::all();
        return view('about', [
            'about' => $about,
            'services' => $services
        ]);
    }


}
