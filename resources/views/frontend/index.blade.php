<!doctype html>
<html lang="en">
    
<head>
    @include('components.frontend.head')
</head>
	   

<body class="preload-wrapper">

        @include('components.frontend.header')


        <!-- Slider -->
        <div class="tf-slideshow slider-default default-2 slider-effect-fade">
            <div dir="ltr" class="swiper tf-sw-slideshow" 
                data-preview="1" 
                data-tablet="1" 
                data-mobile="1" 
                data-centered="false" 
                data-space="0" 
                data-space-mb="0" 
                data-loop="true" 
                data-auto-play="true" 
                aria-label="Fashion slideshow">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                    <!-- Slide -->
                    <div class="swiper-slide">
                        <div class="wrap-slider">
                            <img src="{{ asset('murupp/home/banner/' . $banner->banner_images) }}" 
                                alt="{{ $banner->banner_heading }}" 
                                loading="lazy">
                            <div class="box-content">
                                <div class="container">
                                    <div class="content-slider">
                                        <div class="box-title-slider">
                                            <p class="fade-item fade-item-3 body-text-1 subheading text-white">
                                                {{ $banner->banner_heading }}
                                            </p>
                                            <div class="fade-item fade-item-1 heading text-white title-display">
                                                {{ $banner->banner_title }}
                                            </div>
                                        </div>
                                        <div class="fade-item fade-item-3 box-btn-slider">
                                            <a href="#" class="tf-btn btn-fill btn-white">
                                                <span class="text">Shop Now</span>
                                                <i class="icon icon-arrowUpRight"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <!-- Pagination Dots -->
            <div class="wrap-pagination">
                <div class="container">
                    <div class="sw-dots sw-pagination-slider type-circle white-circle-line justify-content-center" 
                        role="navigation" 
                        aria-label="Slideshow navigation">
                    </div>
                </div>
            </div>
        </div>
        <!-- /Slider -->

        <!-- Marquee -->
        <section class="tf-marquee bg-surface">
            <div class="marquee-wrapper">
                <div class="initial-child-container">
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <!-- 2 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <!-- 3 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <!-- 4 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <!-- 5 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <!-- 6 -->
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Free shipping on all orders over $20.00</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                    <div class="marquee-child-item">
                        <p class="text-btn-uppercase">Returns are free within 14 days</p>
                    </div>
                    <div class="marquee-child-item">
                        <span class="icon icon-lightning-line"></span>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Marquee -->


        <!-- Selling -->
        <section class="flat-spacing">
            <div class="container">
                <div class="heading-section-2 wow fadeInUp">
                    <h3 class="heading">New Arrivals</h3>
                    <a href="#" class="btn-line">View All Collection</a>
                </div>
                <div dir="ltr" class="swiper tf-sw-recent" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                    <div class="swiper-wrapper">
                        @foreach ($newArrivals as $product)
                        <div class="swiper-slide">
                            <div class="card-product card-product-size wow fadeInUp" data-wow-delay="0s">
                                <div class="card-product-wrapper">
                                    <a href="#" class="product-img">
                                        <img class="lazyload img-product" data-src="{{ asset('murupp/home/new-arrivals/' . $product->product_image) }}" src="{{ asset('murupp/home/new-arrivals/' . $product->product_image) }}" alt="image-product">
                                        <img class="lazyload img-hover" data-src="{{ asset('murupp/home/new-arrivals/' . $product->product_image) }}" src="{{ asset('murupp/home/new-arrivals/' . $product->product_image) }}" alt="image-product">
                                    </a>
                                    <div class="variant-wrap size-list">
                                        <ul class="variant-box">
                                            <li class="size-item">{{ $product->product_size }}</li>
                                        </ul>
                                    </div>
                                    <div class="list-product-btn">
                                        <a href="#" class="box-icon wishlist btn-icon-action" aria-label="Add to Wishlist">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Wishlist</span>
                                        </a>
                                    </div>
                                    <div class="list-btn-main">
                                        <a href="#" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <a href="#" class="title link">{{ $product->product_name }}</a>
                                    <span class="price"><i class="fa fa-inr" aria-hidden="true"></i> {{ $product->product_price }} INR</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="sw-pagination-recent sw-dots type-circle justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /Selling -->

        <!-- Banner with text -->
        <section class="flat-spacing about-us-main pt-0">
            <div class="container">
                <div class="row flat-img-with-text-v2 align-items-center">
                    <!-- Image Section -->
                    <div class="col-lg-5 col-md-6">
                        <div class="about-us-features wow fadeInLeft">
                            <img class="lazyload" 
                                data-src="{{ asset('murupp/home/collection-details/' . $collectionDetail->image) }}" 
                                alt="{{ $collectionDetail->heading }}">
                        </div>
                    </div>
                    <!-- Text Section -->
                    <div class="col-lg-7 col-md-6">
                        <article class="banner-left">
                            <div class="box-title wow fadeInUp">
                                <h3>{{ $collectionDetail->heading }}</h3>
                                <blockquote>
                                    <p>{!! $collectionDetail->description !!}</p>
                                </blockquote>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Banner with text -->

        <!-- Categories -->
        <section class="flat-spacing pt-0">
            <div class="container">
                <div class="heading-section text-center wow fadeInUp">
                    <h3 class="heading">Shop by categories</h3>
                </div>
                <div class="grid-cls grid-cls-v2">
                    @foreach ($shopCategories as $category)
                        <div class="item{{ $loop->iteration }} collection-position-2 hover-img">
                            <a class="img-style">
                                <img class="lazyload" 
                                    data-src="{{ asset('murupp/home/shop_categories/' . $category->product_image) }}" 
                                    src="{{ asset('murupp/home/shop_categories/' . $category->product_image) }}" 
                                    alt="{{ $category->image_title }}">
                            </a>
                            <div class="content">
                                <div class="title-top">
                                    <h4 class="title">
                                        <a href="{{ !empty($category->slug) ? url('/category-' . $category->slug) : '#' }}" class="link text-white wow fadeInUp">
                                            {{ $category->image_title }}
                                        </a>
                                    </h4>
                                </div>
                                <div>
                                    <a href="{{ !empty($category->slug) ? url('/category-' . $category->slug) : '#' }}" class="btn-line style-white">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- /Categories -->

        <!-- Iconbox -->
        <section class="flat-spacing line-top-container">
            <div class="container">
                <div dir="ltr" class="swiper tf-sw-iconbox" data-preview="4" data-tablet="3" data-mobile-sm="2" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-sm="2" data-pagination-md="3" data-pagination-lg="4">
                    <div class="swiper-wrapper">
                        @foreach ($productPolicies as $policy)
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-2">
                                    <!-- Displaying Policy Image instead of Static Icon -->
                                    @if($policy->policy_image)
                                        <div class="icon-box">
                                            <img src="{{ asset('/murupp/home/product-policies/' . $policy->policy_image) }}" alt="{{ $policy->heading }}" class="img-fluid">
                                        </div>
                                    @else
                                        <div class="icon-box">
                                            <span class="icon icon-return"></span> <!-- Fallback icon in case no image is set -->
                                        </div>
                                    @endif
                                    <div class="content">
                                        <h6>{{ $policy->heading }}</h6>
                                        <p class="text-secondary">{{ $policy->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sw-pagination-iconbox sw-dots type-circle justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /Iconbox -->


        <!-- Testimonial -->
        <section class="flat-spacing bg-surface">
            <div class="container">
                <div class="heading-section text-center wow fadeInUp">
                    <h3 class="heading">Customer Say!</h3>
                    <p class="subheading">Our customers adore our products, and we constantly aim to delight them.</p>
                </div>
                <div class="swiper tf-sw-testimonial wow fadeInUp" data-wow-delay="0.1s" data-preview="3" data-tablet="2" data-mobile="1" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-item style-2 style-3">
                                    <div class="content-top">
                                        <div class="box-icon">
                                            <i class="icon icon-quote"></i>
                                        </div>
                                        <div class="text-title">{{ $testimonial->heading }}</div>
                                        <p class="text-secondary">{!! $testimonial->description !!}</p>
                                    </div>
                                    <div class="box-avt">
                                        <div class="box-rate-author">
                                            <div class="list-star-default">
                                                @for ($i = 0; $i < $testimonial->star_rating; $i++)
                                                    <i class="icon icon-star"></i>
                                                @endfor
                                            </div>
                                            <div class="box-author">
                                                <div class="text-title author">{{ $testimonial->reviewer }}</div>
                                                <svg class="icon" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_15758_14563)">
                                                    <path d="M6.875 11.6255L8.75 13.5005L13.125 9.12549" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M10 18.5005C14.1421 18.5005 17.5 15.1426 17.5 11.0005C17.5 6.85835 14.1421 3.50049 10 3.50049C5.85786 3.50049 2.5 6.85835 2.5 11.0005C2.5 15.1426 5.85786 18.5005 10 18.5005Z" stroke="#3DAB25" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    <defs>
                                                    <clipPath id="clip0_15758_14563">
                                                    <rect width="20" height="20" fill="white" transform="translate(0 0.684082)"/>
                                                    </clipPath>
                                                    </defs>
                                                </svg> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sw-pagination-testimonial sw-dots type-circle d-flex justify-content-center"></div>
                </div>
            </div>
        </section>
        <!-- /Testimonial -->


        <!-- /Iconbox -->
        <section class="flat-spacing pb-0">
            @if($socialMedia)
                <div class="heading-section text-center wow fadeInUp">
                    <h3 class="heading">{{ $socialMedia->section_heading }}</h3>
                    <p class="subheading text-secondary">{{ $socialMedia->section_title }}</p>
                </div>
            @endif
            <script src="https://static.elfsight.com/platform/platform.js" async></script>
            <div class="elfsight-app-8f24f565-abc8-4144-95c9-4922f192f0cf" data-elfsight-app-lazy></div>
        </section>
        <!-- /Iconbox -->





        @include('components.frontend.footer')

            <!-- search -->
    <div class="modal fade modal-search" id="search">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Search</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <form class="form-search">
                    <fieldset class="text">
                        <input type="text" placeholder="Searching..." class="" name="text" tabindex="0" value="" aria-required="true" required="">
                    </fieldset>
                    <button class="" type="submit">
                        <svg class="icon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M21.35 21.0004L17 16.6504" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- /search -->
      
    <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <div class="mb-content-top">
                    <form class="form-search">
                        <fieldset class="text">
                            <input type="text" placeholder="What are you looking for?" class="" name="text" tabindex="0" value="" aria-required="true" required="">
                        </fieldset>
                        <button class="" type="submit">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#181818" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.9984 20.9999L16.6484 16.6499" stroke="#181818" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                                
                        </button>
                    </form>
                    <ul class="nav-ul-mb" id="wrapper-menu-navigation">

                        <li class="nav-mb-item">
                            <a href="#" class="mb-menu-link">About Us</a>
                        </li>
                        <li class="nav-mb-item">
                            <a href="#dropdown-menu-four" class="collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-four">
                                <span>Shop by Collection</span>
                                <span class="btn-open-sub"></span>
                            </a>
                            <div id="dropdown-menu-four" class="collapse">
                                <ul class="sub-nav-menu">
                                    <li><a href="#" class="sub-nav-link">T’SEM - AW 24/25</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-mb-item">
                            <a href="#dropdown-menu-four" class="collapsed mb-menu-link" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dropdown-menu-four">
                                <span>Shop by Category</span>
                                <span class="btn-open-sub"></span>
                            </a>
                            <div id="dropdown-menu-four" class="collapse">
                                <ul class="sub-nav-menu">
                                    <li><a href="#" class="sub-nav-link">Dresses</a></li>
                                    <li><a href="#" class="sub-nav-link">Tops</a></li>
                                    <li><a href="#" class="sub-nav-link">Bottoms</a></li>
                                    <li><a href="#" class="sub-nav-link">Co-ords</a></li>
                                    <li><a href="#" class="sub-nav-link">Blazers/Jackets</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="mb-other-content">
                    <div class="group-icon">
                        <a href="#" class="site-nav-icon">
                            <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.8401 4.60987C20.3294 4.09888 19.7229 3.69352 19.0555 3.41696C18.388 3.14039 17.6726 2.99805 16.9501 2.99805C16.2276 2.99805 15.5122 3.14039 14.8448 3.41696C14.1773 3.69352 13.5709 4.09888 13.0601 4.60987L12.0001 5.66987L10.9401 4.60987C9.90843 3.57818 8.50915 2.99858 7.05012 2.99858C5.59109 2.99858 4.19181 3.57818 3.16012 4.60987C2.12843 5.64156 1.54883 7.04084 1.54883 8.49987C1.54883 9.95891 2.12843 11.3582 3.16012 12.3899L4.22012 13.4499L12.0001 21.2299L19.7801 13.4499L20.8401 12.3899C21.3511 11.8791 21.7565 11.2727 22.033 10.6052C22.3096 9.93777 22.4519 9.22236 22.4519 8.49987C22.4519 7.77738 22.3096 7.06198 22.033 6.39452C21.7565 5.72706 21.3511 5.12063 20.8401 4.60987V4.60987Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Wishlist 
                        </a>
                        
                        <a href="#" class="site-nav-icon">
                            <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>  
                            Login
                        </a>

                    </div>
                    <div class="mb-notice">
                        <a href="#" class="text-need">Need Help?</a>
                    </div>
                    <div class="mb-contact">
                        <p class="text-caption-1">Lorem ipsum dolor sit amet</p>
                        <a href="#" class="tf-btn-default text-btn-uppercase">GET DIRECTION<i class="icon-arrowUpRight"></i></a>
                    </div>
                    <ul class="mb-info">
                        <li>
                            <i class="icon icon-mail"></i>
                            <p>noreply@gmail.com</p>
                        </li>
                        <li>
                            <i class="icon icon-phone"></i>
                            <p>315-666-6688</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>       
    </div>
    <!-- /mobile menu -->

    @include('components.frontend.main-js')
</body>

</html>