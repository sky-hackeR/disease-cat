@extends('admin.layout.dashboard')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Banners</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Banners</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Upload Banners</h5>
                    <p class="card-title-desc">Upload banner images for each site page</p>

                    <form action="{{ url('/admin/addBanner') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @foreach (['home', 'about', 'project', 'service', 'blog'] as $section)
                            <div class="mb-3">
                                <label class="form-label text-capitalize">{{ $section }} Banner</label>
                                <input type="file" class="form-control" name="{{ $section }}_banner">
                            </div>
                        @endforeach

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary w-md float-end">Save Banners</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if(!empty($banner))
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Current Banners</h4>
                        <form action="{{ url('/admin/editBanner') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="banner_id" value="{{ $banner->id }}">

                            <div class="row">
                                @foreach (['home', 'about', 'project', 'service', 'blog'] as $section)
                                    <div class="col-md-6 mb-4">
                                        <label class="form-label text-capitalize">{{ $section }} Banner</label>
                                        <div class="mb-2">
                                            <img src="{{ $banner[$section.'_banner'] ?? '' }}" class="img-fluid rounded shadow" style="max-height: 150px;">
                                        </div>
                                        <input type="file" name="{{ $section }}_banner" class="form-control">
                                    </div>
                                @endforeach
                            </div>

                            <div class="text-end mt-3">
                                <button type="submit" class="btn btn-success">Update Banners</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>


@endsection