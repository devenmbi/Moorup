 <!-- Page Body Start-->
 <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="stroke-svg">
          <div class="logo-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo.png') }}" alt="" style="max-width: 20% !important;"></a>
		  	<a href="{{ route('admin.dashboard') }}">
				<img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo-icon.png') }}" alt="" style="max-width: 65% !important;">
			</a>  
		  <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo-1.png') }}" alt="" ></a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo-icon.png') }}" alt=""></a>
                  <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>
                <li class="pin-title sidebar-main-title">
                  <div> 
                    <h6>Pinned</h6>
                  </div>
                </li>
                <li class="sidebar-main-title">
                  <div>
                    <h6 class="lan-1">General</h6>
                  </div>
                </li>
                <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i>
                <a class="sidebar-link sidebar-title link-nav active" href="{{ route('admin.dashboard') }}">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                    </svg><span class="lan-3">Dashboard </span>
                  </a>
                </li>

                <li class="sidebar-list"> <i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-user') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-user') }}"></use>
                    </svg><span>Users Management</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ route('user-list.index') }}">New User</a></li>
                    <li><a href="{{ route('user-permissions.index') }}">Users Permissions</a></li>
                  </ul>
                </li>


                <li class="sidebar-list"> <i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#product-category') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#product-category') }}"></use>
                    </svg><span>Masters</span></a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ route('collections.index') }}">Collections</a></li>
                    <li><a href="{{ route('product-category.index') }}">Product Category</a></li>
                    <li><a href="{{ route('product-fabrics.index') }}">Product Fabrics</a></li>
                    <li><a href="{{ route('user-permissions.index') }}">Fabric Composition</a></li>
                    <li><a href="{{ route('user-permissions.index') }}">Product Sizes</a></li>
                    <li><a href="{{ route('user-permissions.index') }}">Print Options</a></li>
                  </ul>
                </li>

                
              </ul>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </div>