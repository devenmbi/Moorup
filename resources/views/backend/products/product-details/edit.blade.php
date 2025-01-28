<!doctype html>
<html lang="en">
    
<head>
    @include('components.backend.head')
</head>
	   
		@include('components.backend.header')

	    <!--start sidebar wrapper-->	
	    @include('components.backend.sidebar')
	   <!--end sidebar wrapper-->


        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Edit Product Details Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('product-details.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Product Details</li>
                </ol>

                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h4>Product Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">

                                <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('product-details.update', $product_details->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                    <!-- Collection Name -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="collection_name">Collection Name <span class="txt-danger">*</span></label>
                                        <select class="form-control" id="collection_name" name="collection_name" required>
                                            <option value="" disabled>Select Collection Name</option>
                                            @foreach($collections as $collection)
                                                <option value="{{ $collection->id }}" {{ $product_details->collection_name == $collection->id ? 'selected' : '' }}>{{ $collection->collection_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a Collection Name.</div>
                                    </div>

                                    <!-- Full Look Name -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="look_name">Full Look Name <span class="txt-danger">*</span></label>
                                        <input class="form-control" id="look_name" type="text" name="look_name" value="{{ $product_details->look_name }}" required>
                                        <div class="invalid-feedback">Please enter a product full look name.</div>
                                    </div>

                                    <!-- Product Name -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="product_name">Product Name <span class="txt-danger">*</span></label>
                                        <input class="form-control" id="product_name" type="text" name="product_name" value="{{ $product_details->product_name }}" required>
                                        <div class="invalid-feedback">Please enter a product name.</div>
                                    </div>

                                    <!-- Category -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="product_category">Product Category <span class="txt-danger">*</span></label>
                                        <select class="form-control" id="product_category" name="product_category" required>
                                            <option value="" disabled>Select Product Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $product_details->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <div class="invalid-feedback">Please select a product category.</div>
                                    </div>

                                    <!-- Fabric Composition -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="fabric_composition">Fabric Composition <span class="txt-danger">*</span></label>
                                        <select class="form-control" id="fabric_composition" name="fabric_composition" required>
                                            <option value="" disabled>Select Fabric Composition</option>
                                            @foreach($fabric_composition as $composition)
                                                <option value="{{ $composition->id }}" {{ $product_details->fabric_composition == $composition->id ? 'selected' : '' }}>{{ $composition->composition_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a Fabric Composition.</div>
                                    </div>

                                    <!-- Style Code -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="style_code">Style Code <span class="txt-danger">*</span></label>
                                        <input class="form-control" id="style_code" type="text" name="style_code" value="{{ $product_details->style_code }}" required>
                                        <div class="invalid-feedback">Please enter a product style code.</div>
                                    </div>

                                    <!-- Product Fabric -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="product_fabric">Product Fabric <span class="txt-danger">*</span></label>
                                        <select class="form-control" id="product_fabric" name="product_fabric" required>
                                            <option value="" disabled>Select Product Fabric</option>
                                            @foreach($product_fabric as $fabric)
                                                <option value="{{ $fabric->id }}" {{ $product_details->product_fabric == $fabric->id ? 'selected' : '' }}>{{ $fabric->fabrics_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a Product Fabric.</div>
                                    </div>

                                    <!-- Product Price -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="product_price">Product Price <span class="txt-danger">*</span></label>
                                        <input class="form-control" id="product_price" type="text" name="product_price" value="{{ $product_details->product_price }}" required>
                                        <div class="invalid-feedback">Please enter a product price.</div>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="col-xxl-4 col-sm-12" style="margin-bottom: 20px;">
                                        <label class="form-label" for="description">Product Description <span class="txt-danger">*</span></label>
                                        <textarea id="description" class="form-control" name="description" rows="5" required>{{ $product_details->description }}</textarea>
                                        <div class="invalid-feedback">Please enter Product Description here.</div>
                                    </div>

                                    <!-- Thumbnail Image Upload -->
                                    <div class="table-container" style="margin-bottom: 30px;">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-4 me-3"><strong>Thumbnail Image Upload</strong></h5>
                                            <button type="button" class="btn btn-primary ms-auto" id="addRow">Add More</button>
                                        </div>


                                        <table class="table table-bordered p-3" id="dynamicTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Uploaded Thumbnail Image: <span class="text-danger">*</span></th>
                                                    <th>Preview</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Loop through existing thumbnails if any -->
                                                @if(isset($product_details->thumbnail_image) && $thumbnails = json_decode($product_details->thumbnail_image, true))
                                                    @foreach($thumbnails as $index => $thumbnail)
                                                        <tr>
                                                            <td>
                                                                <!-- File Input for New Images -->
                                                                <input type="file" onchange="previewThumbnail(this, {{ $index }})" accept=".png, .jpg, .jpeg, .webp" name="thumbnail_image[]" id="thumbnail_image_{{ $index }}" class="form-control" placeholder="Upload Thumbnail Image">
                                                                <small class="text-secondary"><b>Note: The file size should be less than 3MB.</b></small>
                                                                <br>
                                                                <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                                                <!-- Hidden Input for Existing Image -->
                                                                <input type="hidden" name="existing_thumbnail_images[]" value="{{ $thumbnail }}">
                                                            </td>
                                                            <td>
                                                                <div id="preview-container-{{ $index }}">
                                                                    <img src="{{ asset('/murupp/product/thumbnails/' . $thumbnail) }}" style="max-width: 120px; max-height: 100px; object-fit: cover;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger removeRow">Remove</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Gallery Image Upload -->
                                    <div class="table-container" style="margin-bottom: 20px;">
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-4 me-3"><strong>Gallery Image Upload</strong></h5>
                                            <button type="button" class="btn btn-primary ms-auto" id="addGalleryRow">Add More</button>
                                        </div>

                                        <table class="table table-bordered p-3" id="galleryTable" style="border: 2px solid #dee2e6;">
                                            <thead>
                                                <tr>
                                                    <th>Uploaded Gallery Image: <span class="text-danger">*</span></th>
                                                    <th>Preview</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($product_details->gallery_images) && $galleryImages = json_decode($product_details->gallery_images, true))
                                                    @foreach($galleryImages as $key => $galleryImage)
                                                        <tr>
                                                            <td>
                                                                <input type="file" onchange="previewGalleryImage(this, {{ $key }})" accept=".png, .jpg, .jpeg, .webp" name="gallery_image[]" id="gallery_image_{{ $key }}" class="form-control" placeholder="Upload Gallery Image">
                                                                @error('gallery_image')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                                <small class="form-text text-muted">Note: The file size should be less than 3MB.</small><br>
                                                                <small class="form-text text-muted">Note: Only files in .jpg, .jpeg, .png, .webp format are allowed.</small>
                                                                <input type="hidden" name="existing_gallery_images[]" value="{{ $galleryImage }}">
                                                            </td>
                                                            <td>
                                                                <img id="gallery-preview-container-{{ $key }}" src="{{ asset('/murupp/product/gallery/' . $galleryImage) }}" alt="Preview" style="max-height: 100px; border: 1px solid #ddd; padding: 5px;">
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger removeGalleryRow">Remove</button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>


                                    <!-- Form Actions -->
                                    <div class="col-12 text-end">
                                        <a href="{{ route('product-details.index') }}" class="btn btn-danger px-4">Cancel</a>
                                        <button class="btn btn-primary" type="submit">Update</button>
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

          </div>
        </div>
        <!-- footer start-->
        @include('components.backend.footer')
        </div>
        </div>

       @include('components.backend.main-js')


<!--Thumbnail Add More Option-->
<script>
    $(document).ready(function () {
        let rowId = 0;
        $('#addRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <input type="file" onchange="previewThumbnail(this, ${rowId})" accept=".png, .jpg, .jpeg, .webp" name="thumbnail_image[]" id="thumbnail_image${rowId}" class="form-control" placeholder="Upload thumbnail Image">
                        <small class="text-secondary"><b>Note: The file size should be less than 3MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                    </td>
                    <td>
                        <div id="preview-container-${rowId}"></div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeRow', function () {
            $(this).closest('tr').remove();
        });
    });

    // Preview function for thumbnail images
    function previewThumbnail(input, rowId) {
        const file = input.files[0];
        const previewContainer = document.getElementById(`preview-container-${rowId}`);

        // Clear previous preview
        previewContainer.innerHTML = '';

        if (file) {
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

            if (validImageTypes.includes(file.type)) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Create an image element for preview
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '120px';
                    img.style.maxHeight = '100px';
                    img.style.objectFit = 'cover';

                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.innerHTML = '<p>Unsupported file type</p>';
            }
        }
    }
</script>




<!--Gallery Image Preview & Add More Option-->
<script>
    $(document).ready(function () {
        let rowId = 0;

        // Add a new gallery image row
        $('#addGalleryRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <input type="file" onchange="previewGalleryImage(this, ${rowId})" accept=".png, .jpg, .jpeg, .webp" name="gallery_image[]" id="gallery_image_${rowId}" class="form-control" placeholder="Upload Gallery Image">
                        <small class="text-secondary"><b>Note: The file size should be less than 3MB.</b></small>
                        <br>
                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                    </td>
                    <td>
                        <div id="gallery-preview-container-${rowId}"></div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeGalleryRow">Remove</button>
                    </td>
                </tr>`;
            $('#galleryTable tbody').append(newRow);
        });

        // Remove a gallery image row
        $(document).on('click', '.removeGalleryRow', function () {
            $(this).closest('tr').remove();
        });
    });

     // Preview function for gallery images
     function previewGalleryImage(input, rowId) {
        const file = input.files[0];
        const previewContainer = document.getElementById(`gallery-preview-container-${rowId}`);

        // Clear previous preview
        previewContainer.innerHTML = '';

        if (file) {
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

            if (validImageTypes.includes(file.type)) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    // Create an image element for preview
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '120px';
                    img.style.maxHeight = '100px';
                    img.style.objectFit = 'cover';

                    previewContainer.appendChild(img);
                };

                reader.readAsDataURL(file);
            } else {
                previewContainer.innerHTML = '<p>Unsupported file type</p>';
            }
        }
    }
</script>

       
</body>

</html>