@extends('admin.layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Services</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Services</li>
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
                    <h5 class="card-title">Add New Service</h5>
                    <p class="card-title-desc">Manage your offered services</p>

                    <form action="{{ url('/admin/addService') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="title" id="serviceTitle" placeholder="Enter service title">
                            <label for="serviceTitle">Title</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="catchphrase" id="serviceCatchphrase" placeholder="Enter service catchphrase">
                            <label for="serviceCatchphrase">Catchphrase</label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="description" placeholder="Enter service description" style="height: 100px"></textarea>
                            <label>Description</label>
                        </div>

                        <fieldset class="mb-3">
                            <label class="form-label">Primary Image</label>
                            <input type="file" class="form-control" name="image" required>
                        </fieldset>

                        <fieldset class="mb-3">
                            <label class="form-label">Secondary Image</label>
                            <input type="file" class="form-control" name="image_2">
                        </fieldset>


                        <div>
                            <button type="submit" class="btn btn-primary float-end">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Preview Table -->
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Service List</h4>
                    <hr>

                    <div class="accordion" id="serviceAccordion">
                        @forelse($services as $index => $service)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                        {{ $service->title }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <!-- Left Column: Title and Description -->
                                            <div class="col-md-6">
                                                <p><strong>Title:</strong> {{ $service->title }}</p>
                                                <p><strong>Catchphrase:</strong> {{ $service->catchphrase }}</p>
                                                <p><strong>Description:</strong> {!! Str::limit($service->description, 200) !!}</p>
                                            </div>

                                            <!-- Right Column: Images stacked and aligned right -->
                                            <div class="col-md-6 d-flex flex-column align-items-end">
                                                <div class="mb-2">
                                                    <label><strong>Primary Image:</strong></label><br>
                                                    <img src="{{ $service->image }}" alt="Primary Image"
                                                        class="img-thumbnail" style="width: 250px; height: auto;">
                                                </div>

                                                <div>
                                                    <label><strong>Secondary Image:</strong></label><br>
                                                    <img src="{{ $service->image_2 }}" alt="Secondary Image"
                                                        class="img-thumbnail" style="width: 250px; height: auto;">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-flex justify-content-end gap-2 mt-3">
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#viewService{{ $service->id }}" class="btn btn-secondary">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editService{{ $service->id }}" class="btn btn-success"><i class="mdi mdi-pencil"></i></a>
                                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteService{{ $service->id }}" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div id="editService{{ $service->id }}" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Service</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/admin/editService') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="service_id" value="{{ $service->id }}">

                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="mb-3">
                                                            <label class="form-label">Title</label>
                                                            <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Catchphrase</label>
                                                            <input type="text" name="catchphrase" class="form-control" value="{{ $service->catchphrase }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Description</label>
                                                            <textarea name="description" class="form-control" rows="4">{{ $service->description }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 text-center">
                                                        <label class="form-label">Primary Image</label>
                                                        <img src="{{ asset($service->image) }}" alt="Primary Image" class="img-fluid mb-2 rounded">
                                                        <input type="file" name="image" class="form-control mt-2" accept="image/*">

                                                        <label class="form-label mt-3">Secondary Image</label>
                                                        @if ($service->image_2)
                                                            <img src="{{ asset($service->image_2) }}" alt="Secondary Image" class="img-fluid mb-2 rounded">
                                                        @else
                                                            <p class="text-muted">No secondary image</p>
                                                        @endif
                                                        <input type="file" name="image_2" class="form-control mt-2" accept="image/*">
                                                    </div>
                                                </div>

                                                <div class="text-end mt-3">
                                                    <button type="submit" class="btn btn-primary">Update Service</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div id="deleteService{{ $service->id }}" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center p-4">
                                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                            <h4>Are you sure?</h4>
                                            <p class="text-muted">This will permanently delete the service:</p>
                                            <p><strong>{{ $service->title }}</strong></p>

                                            <form action="{{ url('/admin/deleteService') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                                <button type="submit" class="btn btn-danger w-100">Yes, Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- View Modal -->
                            <div class="modal fade" id="viewService{{ $service->id }}" tabindex="-1" aria-labelledby="viewServiceLabel{{ $service->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content border-0">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewServiceLabel{{ \Illuminate\Support\Str::slug($service->slug) }}">Service Details</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row">
                                                <!-- Left Side: Title and Images -->
                                                <div class="col-md-5 d-flex flex-column gap-3">
                                                    <div>
                                                        <label class="form-label mb-1">Title:</label>
                                                        <h5 class="fw-bold">{{ $service->title }}</h5>
                                                    </div>

                                                    <div>
                                                        <label class="form-label mb-1">Catchphrase:</label>
                                                        <h5 class="fw-bold">{{ $service->catchphrase }}</h5>
                                                    </div>

                                                    <div>
                                                        <label class="form-label mb-1">Primary Image:</label>
                                                        <img src="{{ asset($service->image) }}" alt="Primary Image"
                                                            class="img-thumbnail w-100" style="max-height: 200px; object-fit: cover;">
                                                    </div>

                                                    <div>
                                                        <label class="form-label mb-1">Secondary Image:</label>
                                                        <img src="{{ asset($service->image_2) }}" alt="Secondary Image"
                                                            class="img-thumbnail w-100" style="max-height: 200px; object-fit: cover;">
                                                    </div>
                                                </div>

                                                <!-- Right Side: Full Description -->
                                                <div class="col-md-7">
                                                    <label class="form-label mb-2">Description:</label>
                                                    <div class="border p-3 rounded bg-light" style="min-height: 200px;">
                                                        {!! $service->description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-end">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-warning mt-3" role="alert">
                                No services added yet.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
