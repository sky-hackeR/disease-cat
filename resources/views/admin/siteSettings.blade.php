@extends('admin.layout.dashboard')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Site Settings</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Site Settings</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Set Site Settings</h5>
                <p class="card-title-desc">Set Important Requirements of the website</p>

                <form action="{{ url('/admin/updateSiteInfo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="site_info_id" value="{{ !empty($setting) ? $setting->id : null }}">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Site Name" name="site_name">
                        <label for="floatingnameInput">Site Name</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea name="description" class="form-control" id="floatingDescInput" cols="30" rows="10"></textarea>
                        <label for="floatingDescInput">Site Description</label>
                    </div>
                   
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Save</button>
                    </div>
                </form>

                <br>
                <form action="{{ url('/admin/updateSiteInfo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="site_info_id" value="{{ !empty($setting) ? $setting->id : null }}">

                    <hr>
                    <h5 class="card-title">Set Logo and Favicon</h5>
                    <hr>

                    <fieldset class="mb-3">
                        <p>Logo </p>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="floatingLogoWInput" name="logo">
                        </div>
                    </fieldset>

                    <fieldset class="mb-3">
                        <p>Site Favicon</p>
                        <div class="form-floating mb-3">
                            <input type="file" class="form-control" id="floatingFaviconInput" name="favicon">
                        </div>
                    </fieldset>
                   
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Save</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4">Current Settings</h5>
                <div class="table-responsive">
                    <table class="table table-nowrap align-middle mb-0">
                        <tbody>
                            <tr> 
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Site Name</a></h5>
                                </td>
                                
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{{ !empty($setting) ? $setting->site_name : "sky-hackeR." }}</span>
                                    </div>
                                </td>
                            </tr>

                            <tr> 
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Site Description</a></h5>
                                </td>
                                
                                <td>
                                    <div class="text-end">
                                        <span class="font-size-11">{!! !empty($setting) ? $setting->description : "Solution for everyone" !!}</span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Site Logo</a></h5>
                                </td>
                                <td>
                                    <style>
                                        .avatar-xl-plus {
                                            width: 300px;
                                            height: auto;
                                        }

                                    </style>
                                    <div class="text-end">
                                        <img src="{{ $pageGlobalData->setting->logo ?? '' }}" alt="Site Logo" class="avatar-xl-plus" style="background: rgba(0,0,0,0.08); border-radius: 5px;">

                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <h5 class="text-truncate font-size-14 m-0"><a href="javascript: void(0);" class="text-dark">Site Favicon</a></h5>
                                </td>
                                <td>
                                    <div class="text-end">
                                        {{-- <img src="{{ !empty($setting) ? $setting->favicon : null }}" alt="" class="rounded-circle avatar-xs"> --}}
                                        <img src="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->favicon : null }}" alt="Favicon" class="rounded-circle avatar-xl" style="background: rgba(0,0,0,0.08);">
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection