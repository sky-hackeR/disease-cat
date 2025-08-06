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
use App\Models\Service;


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
        $about = About::first();
        return view('admin.about', [
            'about' => $about
        ]);
    }

    public function services(){
        $services = Service::all();
        return view('admin.services', [
            'services' => $services
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



    public function addService(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            alert()->error('Validation Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        try {
            $imagePath1 = cloudinary()->uploadFile($request->file('image')->getRealPath())->getSecurePath();
            $imagePath2 = cloudinary()->uploadFile($request->file('image_2')->getRealPath())->getSecurePath();
        } catch (\Exception $e) {
            alert()->error('Upload Failed', 'Could not upload image(s): ' . $e->getMessage())->persistent('Close');
            return redirect()->back();
        }

        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));

        $newService = new Service();
        $newService->title = $request->title;
        $newService->description = $request->description;
        $newService->slug = $slug;
        $newService->image = $imagePath1;
        $newService->image_2 = $imagePath2;

        if ($newService->save()) {
            alert()->success('Success', 'Service added successfully')->persistent('Close');
        } else {
            alert()->error('Oops!', 'Something went wrong while saving')->persistent('Close');
        }

        return redirect()->back();
    }

    public function editService(Request $request){
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|exists:services,id',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            alert()->error('Validation Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        $service = Service::find($request->service_id);
        if (!$service) {
            alert()->error('Not Found', 'Service not found')->persistent('Close');
            return redirect()->back();
        }

        if ($request->filled('title') && $request->title !== $service->title) {
            $service->title = $request->title;
            $service->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title)));
        }

        if ($request->filled('description')) {
            $service->description = $request->description;
        }

        if ($request->hasFile('image')) {
            try {
                $imagePath = cloudinary()->uploadFile($request->file('image')->getRealPath())->getSecurePath();
                $service->image = $imagePath;
            } catch (\Exception $e) {
                alert()->error('Image Upload Failed', 'Could not upload image: ' . $e->getMessage())->persistent('Close');
                return redirect()->back();
            }
        }

        if ($request->hasFile('image_2')) {
            try {
                $imagePath2 = cloudinary()->uploadFile($request->file('image_2')->getRealPath())->getSecurePath();
                $service->image_2 = $imagePath2;
            } catch (\Exception $e) {
                alert()->error('Image Upload Failed', 'Could not upload second image: ' . $e->getMessage())->persistent('Close');
                return redirect()->back();
            }
        }

        if ($service->save()) {
            alert()->success('Success', 'Service updated successfully')->persistent('Close');
        } else {
            alert()->error('Oops!', 'Something went wrong while updating')->persistent('Close');
        }

        return redirect()->back();
    }
    
    public function deleteService(Request $request){
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|exists:services,id',
        ]);

        if ($validator->fails()) {
            alert()->error('Error', $validator->messages()->all()[0])->persistent('Close');
            return redirect()->back();
        }

        $service = Service::find($request->service_id);
        if (!$service) {
            alert()->error('Oops', 'Invalid Service')->persistent('Close');
            return redirect()->back();
        }

        if ($service->delete()) {
            alert()->success('Deleted', 'Service deleted successfully')->persistent('Close');
            return redirect()->back();
        }

        alert()->error('Oops!', 'Could not delete service')->persistent('Close');
        return redirect()->back();
    }



    public function updateAbout(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'values' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            alert()->error('Validation Error', $validator->messages()->first())->persistent('Close');
            return redirect()->back();
        }

        // Find the first About entry or create a new one
        $about = About::first() ?? new About();

        $about->title = $request->title;
        $about->description = $request->description;
        $about->values = $request->values;

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Example using Cloudinary
            $imagePath = cloudinary()->uploadFile($request->file('image')->getRealPath())->getSecurePath();
            $about->image = $imagePath;
        }

        if ($about->save()) {
            alert()->success('Success', 'About page updated successfully!')->persistent('Close');
        } else {
            alert()->error('Oops!', 'Something went wrong while saving')->persistent('Close');
        }

        return redirect()->back();
    }
}
