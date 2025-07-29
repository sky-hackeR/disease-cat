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
use App\Models\Banner;
use App\Models\About;


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

    public function about(){
        $about = About::get();
        return view('admin.about', [
            'about' => $about
        ]);
    }

    public function swipers(){
        $swipers = Swiper::all();
        return view('admin.swipers', [
            'swipers' => $swipers
        ]);
    }

    public function banners(){
        $banner = Banner::latest()->first();
        return view('admin.banners', [
            'banner' => $banner
        ]);
    }



    public function updateSiteInfo(Request $request){
        $validator = Validator::make($request->all(), [
            'site_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image',
            'favicon' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            alert()->error('Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        // Retrieve or create new SiteInfo
        $siteInfo = Setting::find($request->site_info_id) ?? new Setting;

        // Mass assign basic fillable attributes
        $siteInfo->fill($request->only(['site_name', 'description']));

        // Handle image uploads
        if ($request->hasFile('logo')) {
            $logoPath = cloudinary()->uploadFile($request->file('logo')->getRealPath())->getSecurePath();
            $siteInfo->logo = $logoPath;
        }

        if ($request->hasFile('favicon')) {
            $faviconPath = cloudinary()->uploadFile($request->file('favicon')->getRealPath())->getSecurePath();
            $siteInfo->favicon = $faviconPath;
        }

        if ($siteInfo->save()) {
            alert()->success('Success', 'Site information updated successfully')->persistent('Close');
        } else {
            alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        }

        return redirect()->back();
    }

    public function addSwiper(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            alert()->error('Validation Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        // Ensure all fields are present
        if (!$request->hasFile('image') || !$request->title || !$request->subtitle) {
            alert()->error('Error', 'All fields (title, subtitle, and image) are required.')->persistent('Close');
            return redirect()->back();
        }

        $swiper = new Swiper();
        $swiper->title = $request->title;
        $swiper->subtitle = $request->subtitle;

        // Upload image to Cloudinary
        $imagePath = cloudinary()->uploadFile($request->file('image')->getRealPath())->getSecurePath();
        $swiper->image = $imagePath;

        if ($swiper->save()) {
            alert()->success('Success', 'Swiper slide added successfully')->persistent('Close');
        } else {
            alert()->error('Oops!', 'Something went wrong while saving')->persistent('Close');
        }

        return redirect()->back();
    }

    public function deleteSwiper(Request $request){
        $validator = Validator::make($request->all(), [
            'swiper_id' => 'required|exists:swipers,id',
        ]);

        if ($validator->fails()) {
            alert()->error('Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        $swiper = Swiper::find($request->swiper_id);

        if ($swiper->delete()) {
            alert()->success('Deleted', 'Swiper deleted successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Something went wrong')->persistent('Close');
        return redirect()->back();
    }

    public function editSwiper(Request $request){
        // Validate request
        $validator = Validator::make($request->all(), [
            'swiper_id' => 'required|exists:swipers,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            alert()->error('Validation Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        // Fetch the swiper record
        $swiper = Swiper::find($request->swiper_id);
        if (!$swiper) {
            alert()->error('Not Found', 'The swiper slide you are trying to edit does not exist.')->persistent('Close');
            return redirect()->back();
        }

        // Update title and subtitle
        $swiper->title = $request->title;
        $swiper->subtitle = $request->subtitle;

        // If new image is uploaded, upload to Cloudinary
        if ($request->hasFile('image')) {
            try {
                $imagePath = cloudinary()->uploadFile($request->file('image')->getRealPath())->getSecurePath();
                $swiper->image = $imagePath;
            } catch (\Exception $e) {
                alert()->error('Image Upload Failed', 'Could not upload image: ' . $e->getMessage())->persistent('Close');
                return redirect()->back();
            }
        }

        // Save the changes
        if ($swiper->save()) {
            alert()->success('Success', 'Swiper updated successfully')->persistent('Close');
        } else {
            alert()->error('Oops!', 'Something went wrong while updating')->persistent('Close');
        }

        return redirect()->back();
    }



    public function addBanner(Request $request){
        $validator = Validator::make($request->all(), [
            'home_banner' => 'nullable|image|max:2048',
            'about_banner' => 'nullable|image|max:2048',
            'project_banner' => 'nullable|image|max:2048',
            'service_banner' => 'nullable|image|max:2048',
            'blog_banner' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            alert()->error('Validation Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        // Only get the first or create if it doesn't exist
        $banner = Banner::first() ?? new Banner();

        foreach (['home_banner', 'about_banner', 'project_banner', 'service_banner', 'blog_banner'] as $field) {
            if ($request->hasFile($field)) {
                $banner->$field = cloudinary()->uploadFile($request->file($field)->getRealPath())->getSecurePath();
            }
        }

        $banner->save();
        alert()->success('Success', 'Banners saved successfully')->persistent('Close');
        return redirect()->back();
    }


    public function editBanner(Request $request){
        $banner = Banner::find($request->banner_id);

        if (!$banner) {
            alert()->error('Error', 'Banner not found')->persistent('Close');
            return redirect()->back();
        }

        $field = $request->input('banner_type'); // example: "home"

        $fieldKey = $field . '_banner';

        if ($request->hasFile($fieldKey)) {
            $banner->$fieldKey = cloudinary()->uploadFile($request->file($fieldKey)->getRealPath())->getSecurePath();
            $banner->save();
            alert()->success('Updated', ucfirst($field).' banner updated')->persistent('Close');
        } else {
            alert()->info('No Change', 'No file uploaded for update')->persistent('Close');
        }

        return redirect()->back();
    }


    public function deleteBanner(Request $request){
        $banner = Banner::findOrFail($request->banner_id);
        $type = $request->banner_type . '_banner';

        if (!in_array($type, ['home_banner', 'about_banner', 'project_banner', 'service_banner', 'blog_banner'])) {
            return back()->with('error', 'Invalid banner type.');
        }

        // Delete file from storage if needed
        if ($banner->$type && file_exists(public_path($banner->$type))) {
            unlink(public_path($banner->$type));
        }

        $banner->$type = null;
        $banner->save();

        return back()->with('success', ucfirst($request->banner_type) . ' banner removed.');
    }



    

}
