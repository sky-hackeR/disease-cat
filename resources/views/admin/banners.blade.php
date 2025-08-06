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
                        <div class="accordion" id="bannerAccordion">

                            @foreach (['home', 'about', 'project', 'service', 'blog'] as $index => $section)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button fw-medium {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                            {{ ucfirst($section) }} Banner
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#bannerAccordion">
                                        <div class="accordion-body">

                                            <div class="row">
                                                <!-- Left: Current Image Preview -->
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label fw-semibold">Current Banner</label>
                                                    <div class="border rounded p-2 bg-light text-center">
                                                        @if($banner[$section . '_banner'])
                                                            <img src="{{ $banner[$section.'_banner'] }}" class="img-fluid rounded shadow" style="max-height: 180px;">
                                                        @else
                                                            <p class="text-muted">No banner uploaded yet.</p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <!-- Right: Update/Delete -->
                                                {{-- <div class="col-md-6 mb-3">
                                                    <!-- Update Form -->
                                                    <form action="{{ url('/admin/editBanner') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="banner_id" value="{{ $banner->id }}">
                                                        <input type="hidden" name="banner_type" value="{{ $section }}">

                                                        <div class="mb-3">
                                                            <label class="form-label">Replace {{ ucfirst($section) }} Banner</label>
                                                            <input type="file" name="{{ $section }}_banner" class="form-control" accept="image/*">
                                                        </div>

                                                        <button type="submit" class="btn btn-success w-50 mb-2">Update</button>
                                                    </form>

                                                    @if($banner[$section . '_banner'])
                                                        <!-- Delete Form (Not nested) -->
                                                        <form action="{{ url('/admin/deleteBanner') }}" method="POST" onsubmit="return confirm('Delete this banner?')">
                                                            @csrf
                                                            <input type="hidden" name="banner_id" value="{{ $banner->id }}">
                                                            <input type="hidden" name="banner_type" value="{{ $section }}">
                                                            <button type="submit" class="btn btn-outline-danger w-50">Delete</button>
                                                        </form>
                                                    @endif
                                                </div> --}}

                                                <div class="col-md-6 mb-3">
                                                    <!-- Update Form -->
                                                    <form action="{{ url('/admin/editBanner') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="banner_id" value="{{ $banner->id }}">
                                                        <input type="hidden" name="banner_type" value="{{ $section }}">

                                                        <div class="mb-3">
                                                            <label class="form-label">Replace {{ ucfirst($section) }} Banner</label>
                                                            <input type="file" name="{{ $section }}_banner" class="form-control" accept="image/*">
                                                        </div>

                                                        <!-- Flex wrapper to push button to the right -->
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-success w-50 mb-2">Update</button>
                                                        </div>
                                                    </form>

                                                    @if($banner[$section . '_banner'])
                                                        <!-- Delete Form -->
                                                        <form action="{{ url('/admin/deleteBanner') }}" method="POST" onsubmit="return confirm('Delete this banner?')">
                                                            @csrf
                                                            <input type="hidden" name="banner_id" value="{{ $banner->id }}">
                                                            <input type="hidden" name="banner_type" value="{{ $section }}">
                                                            <!-- Align delete button to the right as well (optional) -->
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-outline-danger w-50">Delete</button>
                                                            </div>
                                                        </form>
                                                    @endif
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        @endif



    </div>


@endsection