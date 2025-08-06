@extends('admin.layout.dashboard')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">About</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">About</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <!-- Left: Form -->
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage About Content</h5>
                    <p class="card-title-desc">Update the content of your About page</p>

                    <form action="{{ url('/admin/updateAbout') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="about_id" value="{{ $about->id ?? '' }}">

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" id="titleInput" class="form-control"
                                value="{{ old('title', $about->title ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="descriptionInput" class="form-control" rows="4">{{ old('description', $about->description ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Values (comma separated)</label>
                            <textarea name="values" id="valuesInput" class="form-control" rows="2">{{ old('values', $about->values ?? '') }}</textarea>
                            <small class="text-muted">Example: Fast Delivery, High Quality, 24/7 Support</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">About Image</label>
                            @if(!empty($about->image))
                                <div class="mb-2">
                                    <img id="imagePreview" src="{{ $about->image }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            @else
                                <img id="imagePreview" class="img-thumbnail mb-2" style="max-height: 200px; display:none;">
                            @endif
                            <input type="file" name="image" class="form-control" accept="image/*"
                                onchange="previewImage(event)">
                            <small class="text-muted">Upload to replace current image</small>
                        </div>

                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary">
                                {{ isset($about) ? 'Update About' : 'Save About' }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- Right: Preview -->
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Live Preview</h5>
                    <p class="card-title-desc">How it will appear on your website</p>
                    
                    <div class="border rounded p-4 bg-light" id="aboutPreview">
                        <div class="about-three__image mb-3 text-center">
                            <img id="previewImage" src="{{ $about->image ?? '' }}" class="img-fluid rounded"
                                style="max-height: 250px; {{ empty($about->image) ? 'display:none;' : '' }}">
                        </div>
                        <h3 id="previewTitle">{{ $about->title ?? 'Your Title Here' }}</h3>
                        <p id="previewDescription">{!! $about->description ?? 'Your description will appear here...' !!}</p>
                        <ul id="previewValues" class="list-unstyled">
                            @if(!empty($about->values))
                                @foreach(explode(',', $about->values) as $value)
                                    <li><i class="fa fa-check-circle text-success"></i> {{ strip_tags(trim($value)) }}</li>
                                @endforeach
                            @else
                                <li><i class="fa fa-check-circle text-muted"></i> Sample Value 1</li>
                                <li><i class="fa fa-check-circle text-muted"></i> Sample Value 2</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <!-- JS for live preview -->
    <script>
        document.getElementById('titleInput').addEventListener('input', function () {
            document.getElementById('previewTitle').innerText = this.value || 'Your Title Here';
        });

        document.getElementById('descriptionInput').addEventListener('input', function () {
            document.getElementById('previewDescription').innerText = this.value || 'Your description will appear here...';
        });

        document.getElementById('valuesInput').addEventListener('input', function () {
            const valuesList = document.getElementById('previewValues');
            valuesList.innerHTML = '';
            const values = this.value.split(',').map(v => v.trim()).filter(Boolean);
            if (values.length === 0) {
                valuesList.innerHTML = '<li><i class="fa fa-check-circle text-muted"></i> Sample Value</li>';
            } else {
                values.forEach(val => {
                    valuesList.innerHTML += `<li><i class="fa fa-check-circle text-success"></i> ${val}</li>`;
                });
            }
        });

        function previewImage(event) {
            const [file] = event.target.files;
            const preview = document.getElementById('previewImage');
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        }
    </script>

@endsection