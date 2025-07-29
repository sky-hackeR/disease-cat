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



use SweetAlert;
use Alert;
use Log;
use Carbon\Carbon;

class PageController extends Controller
{
    public function welcome() {
        $swipers = Swiper::all();
        $banners = Banner::all();
        return view('welcome',[
            'swipers' => $swipers, 
            'banners' => $banners
        ]);
    }
}
