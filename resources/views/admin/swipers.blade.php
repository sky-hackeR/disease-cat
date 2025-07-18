@extends('admin.layout.dashboard')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Swipers</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active">Swipers</li>
                </ol>
            </div>

        </div>
    </div>
</div>


    <div class="row">
        <!-- Form -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Swiper Slide</h5>
                    <p class="card-title-desc">Manage homepage swiper slides</p>

                    <form action="{{ url('/admin/addSwiper') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingTitleInput" name="title" placeholder="Enter Slide Title">
                            <label for="floatingTitleInput">Title</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingSubtitleInput" name="subtitle" placeholder="Enter Slide Subtitle">
                            <label for="floatingSubtitleInput">Subtitle</label>
                        </div>

                        <fieldset class="mb-3">
                            <p>Slide Image</p>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="floatingImageInput" name="image">
                            </div>
                        </fieldset>

                        <div>
                            <button type="submit" class="btn btn-primary w-md float-end">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Preview Table -->

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Swiper Slides</h4>
                    <hr>

                    <div class="accordion" id="swiperAccordion">
                        @forelse($swipers as $index => $swiper)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button fw-medium {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                        Swiper {{ $index + 1 }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#swiperAccordion">
                                    <div class="accordion-body">

                                        <div class="row align-items-center">
                                            <!-- Left Side: Title and Subtitle -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Title</label>
                                                    <div>{{ $swiper->title }}</div>
                                                </div>
                                                <br>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Subtitle</label>
                                                    <div>{{ $swiper->subtitle }}</div>
                                                </div>
                                            </div>

                                            <!-- Right Side: Image -->
                                            <div class="col-md-6">
                                                <img src="{{ asset($swiper->image) }}" alt="Swiper Image" class="img-fluid float-end" style="max-width: 80%; border-radius: 6px;">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-end gap-2 mt-3">
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editSwiper{{ $swiper->id }}" class="btn btn-info"><i class="mdi mdi-pencil"></i></a>
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteSwiper{{ $swiper->id }}" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>

                                            <!-- Edit Modal -->
                                            <div id="editSwiper{{ $swiper->id }}" class="modal fade" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content border-0">
                                                        <div class="modal-header p-3">
                                                            <h5 class="modal-title">Edit Swiper Slide</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form action="{{ url('/admin/updateSwiper') }}" method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="swiper_id" value="{{ $swiper->id }}">

                                                                <div class="row">
                                                                    <!-- Left: Text Fields -->
                                                                    <div class="col-md-7">
                                                                        <div class="mb-3">
                                                                            <label class="form-label fw-semibold">Title</label>
                                                                            <input type="text" name="title" class="form-control" value="{{ $swiper->title }}" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label class="form-label fw-semibold">Subtitle</label>
                                                                            <input type="text" name="subtitle" class="form-control" value="{{ $swiper->subtitle }}" required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Right: Image Preview & Upload -->
                                                                    <div class="col-md-5 text-center">
                                                                        <label class="form-label fw-semibold">Current Image</label>
                                                                        <div>
                                                                            <img src="{{ asset($swiper->image) }}" alt="Swiper Image" class="img-fluid mb-2" style="max-width: 100%; border-radius: 8px;">
                                                                        </div>
                                                                        <input type="file" name="image" class="form-control mt-2" accept="image/*">
                                                                    </div>
                                                                </div>

                                                                <div class="text-end mt-3">
                                                                    <button type="submit" class="btn btn-primary">Update Swiper</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div id="deleteSwiper{{ $swiper->id }}" class="modal fade" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center p-4">
                                                            <div class="text-end">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="mt-2">
                                                                <h4>Are you sure?</h4>
                                                                <p class="text-muted">You are about to delete the swiper titled:</p>
                                                                <p><strong>{{ $swiper->title }}</strong></p>

                                                                <form action="{{ url('/admin/deleteSwiper') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="swiper_id" value="{{ $swiper->id }}">
                                                                    <div class="mt-3">
                                                                        <button type="submit" class="btn btn-danger w-100">Yes, Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-warning mt-3" role="alert">
                                No swiper slides yet.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection