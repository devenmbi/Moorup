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
                  <h4>Edit Tops Form</h4>
                </div>
                <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="{{ route('tops.index') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Edit Tops Details</li>
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
                        <h4>Tops Details Form</h4>
                        <p class="f-m-light mt-1">Fill up your true details and submit the form.</p>
                    </div>
                    <div class="card-body">
                        <div class="vertical-main-wizard">
                        <div class="row g-3">    
                            <!-- Removed empty col div -->
                            <div class="col-12">
                            <div class="tab-content" id="wizard-tabContent">
                                <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                                <form class="row g-3 needs-validation custom-input" novalidate action="{{ route('tops.update', $tops_details->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT') <!-- This ensures the form is submitted as an update request -->

                                    <!-- Banner Heading -->
                                    <div class="col-xxl-4 col-sm-6">
                                        <label class="form-label" for="banner_heading">Banner Heading <span class="txt-danger">*</span></label>
                                        <input class="form-control" id="banner_heading" type="text" name="banner_heading" value="{{ old('banner_heading', $tops_details->banner_heading) }}" placeholder="Enter Banner Heading" required>
                                        <div class="invalid-feedback">Please enter a Banner Heading.</div>
                                    </div>

                                    <!-- Banner Image -->
                                    <div class="col-xxl-4 col-sm-12">
                                        <label class="form-label" for="banner_image">Banner Image <span class="txt-danger">*</span></label>
                                        <input class="form-control" id="banner_image" type="file" name="banner_image" accept=".jpg, .jpeg, .png, .webp" onchange="previewBannerImage()">
                                        <div class="invalid-feedback">Please upload a Banner Image.</div>
                                        <small class="text-secondary"><b>Note: The file size should be less than 3MB.</b></small>
                                        <br>
                                        <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small><br><br>

                                        <!-- Display current banner image if exists -->
                                        <div id="currentImageContainer">
                                            @if($tops_details->banner_image)
                                                <img id="currentBannerImage" src="{{ asset('/murupp/category/tops/' . $tops_details->banner_image) }}" alt="Current Banner Image" style="max-height: 100px; border: 1px solid #ddd; padding: 5px;">
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Preview Section -->
                                    <div class="col-xxl-4 col-sm-12" id="bannerImagePreviewContainer" style="display: none;">
                                        <img id="banner_image_preview" src="" alt="Preview" class="img-fluid" style="max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                    </div>


                                    <!-- Form Actions -->
                                    <div class="col-12 text-end">
                                        <a href="{{ route('tops.index') }}" class="btn btn-danger px-4">Cancel</a>
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

<script>
   function previewBannerImage() {
    const file = document.getElementById('banner_image').files[0];
    const previewContainer = document.getElementById('bannerImagePreviewContainer');
    const previewImage = document.getElementById('banner_image_preview');
    const currentImageContainer = document.getElementById('currentImageContainer');
    const currentBannerImage = document.getElementById('currentBannerImage');

    // Clear the previous preview
    previewImage.src = '';
    
    // Hide the existing image if a new file is selected
    if (file) {
        currentImageContainer.style.display = 'none';  // Hide the current image
        
        const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

        if (validImageTypes.includes(file.type)) {
            const reader = new FileReader();

            reader.onload = function (e) {
                // Display the image preview
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';  // Show the preview section
            };

            reader.readAsDataURL(file);
        } else {
            alert('Please upload a valid image file (jpg, jpeg, png, webp).');
        }
    } else {
        // If no file is selected, restore the current image (if it exists)
        currentImageContainer.style.display = 'block';  // Show the current image
        previewContainer.style.display = 'none';  // Hide the preview section
    }
}

</script>
</body>

</html>