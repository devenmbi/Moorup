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
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <!-- Zero Configuration  Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb mb-0">
										<li class="breadcrumb-item">
											<a href="{{ route('seo-tags.index') }}">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">SEO</li>
									</ol>
								</nav>

								<a href="{{ route('seo-tags.create') }}" class="btn btn-primary px-5 radius-30">+ Add SEO</a>
							</div>


                  
                    <div class="table-responsive custom-scrollbar">
                    <table class="display" id="basic-1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Page Name</th>
                                <th>Page URL</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($seo as $index => $tag)
                              <tr>
                                  <td>{{ $index + 1 }}</td>
                                  <td>{{ $tag->page_name }}</td>
                                  <td>
                                      <a href="{{ $tag->page_url }}" target="_blank">{{ $tag->page_url }}</a>
                                  </td>
                                  <td>
                                    <a href="{{ route('seo-tags.edit', $tag->id) }}" class="btn btn-sm btn-primary">Edit</a> &nbsp
                                    <form action="{{ route('seo-tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>


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
    $(document).ready(function() {
        $('#basic').DataTable();
    });
</script>
</body>

</html>