@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name_en" class="form-label">Name (English)</label>
                <input type="text" class="form-control @error('name.en') is-invalid @enderror" id="name_en"
                    name="name[en]" value="{{ old('name.en', $product->getTranslation('name', 'en')) }}" required>
                @error('name.en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description_en" class="form-label">Description (English)</label>
                <textarea class="form-control @error('description.en') is-invalid @enderror" id="description_en" name="description[en]">{{ old('description.en', $product->getTranslation('description', 'en', '')) }}</textarea>
                @error('description.en')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description_bd" class="form-label">Description (Bengali)</label>
                <textarea class="form-control @error('description.bn') is-invalid @enderror" id="description_bd" name="description[bn]">{{ old('description.bn') }}</textarea>
                @error('description.bn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="url" class="form-label">External URL</label>
                <input type="hidden" id="url" name="url" value="{{ old('url', json_encode($product->url)) }}">

                <!-- Ace Editor Container -->
                <div id="url-editor" style="height: 300px; width: 100%; border: 1px solid #ddd;"></div>

                @error('url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id"
                    required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->getTranslation('name', 'en') }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                @if ($product->thumbnail)
                    <div class="mb-2">
                        <img src="{{ asset($product->thumbnail) }}" alt="Current thumbnail" class="img-thumbnail"
                            style="max-height: 200px;">
                    </div>
                @endif
                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail"
                    name="thumbnail">
                <small class="form-text text-muted">Leave empty to keep the current image</small>
                @error('thumbnail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="1" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active
                    </option>
                    <option value="0" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the hidden input field and parse the JSON value
            var urlField = document.getElementById('url');
            var urlData = {};

            try {
                // Parse the value into JSON
                urlData = JSON.parse(urlField.value);
            } catch (error) {
                console.error("Error parsing URL JSON:", error);
                urlData = {}; // Fallback to empty object
            }

            // Initialize Ace Editor
            var editor = ace.edit('url-editor');
            editor.setTheme("ace/theme/monokai"); // Restoring the theme to your preference (black theme)
            editor.session.setMode("ace/mode/json"); // Setting the mode to JSON

            // Set the initial value in the Ace Editor, formatted with indentation
            editor.setValue(JSON.stringify(urlData, null, 4));

            // Sync changes from Ace Editor back to the hidden input field
            editor.getSession().on('change', function() {
                urlField.value = editor.getValue(); // Update hidden input with Ace Editor value
            });
        });
        $(document).ready(function() {
            // Initialize TinyMCE -->
            tinymce.init({
                selector: '#description_en',
                plugins: 'image code link lists media',
                toolbar: 'undo redo | bold italic underline strikethrough forecolor|image media|align | blocks fontsize | bullist numlist outdent indent |',
                menubar: false,
                branding: false,
                images_upload_url: '{{ route('admin.products.imageupload') }}', // URL to handle image uploads on the server
                automatic_uploads: true,
                content_style: "body { background-color: #000000; color: #ffffff; } p { line-height: 1.5; }",
                setup: function(editor) {
                    editor.on('change', function() {
                        editor.save(); // Ensure the textarea value is updated on change
                    });
                },
                images_upload_handler: function(blobInfo, success, failure) {
                    let xhr, formData;

                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST',
                        '{{ route('admin.products.imageupload') }}'); // Backend file to handle uploads

                    xhr.onload = function() {
                        let json;

                        if (xhr.status !== 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }

                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location !== 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        success(json.location);
                    };

                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                }
            });

            // Initialize TinyMCE -->
            tinymce.init({
                selector: '#description_bd',
                plugins: 'image code link lists media',
                toolbar: 'undo redo | bold italic underline strikethrough forecolor|image media|align | blocks fontsize | bullist numlist outdent indent |',
                menubar: false,
                branding: false,
                images_upload_url: '{{ route('admin.products.imageupload') }}', // URL to handle image uploads on the server
                automatic_uploads: true,
                content_style: "body { background-color: #000000; color: #ffffff; } p { line-height: 1.5; }",
                setup: function(editor) {
                    editor.on('change', function() {
                        editor.save(); // Ensure the textarea value is updated on change
                    });
                },
                images_upload_handler: function(blobInfo, success, failure) {
                    let xhr, formData;

                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST',
                        '{{ route('admin.products.imageupload') }}'); // Backend file to handle uploads

                    xhr.onload = function() {
                        let json;

                        if (xhr.status !== 200) {
                            failure('HTTP Error: ' + xhr.status);
                            return;
                        }

                        json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location !== 'string') {
                            failure('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        success(json.location);
                    };

                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                }
            });
        });
    </script>
@endpush
