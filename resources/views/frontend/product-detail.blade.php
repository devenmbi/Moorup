<!doctype html>
<html lang="en">
    
<head>
    @include('components.frontend.head')
</head>
	   

<body class="preload-wrapper">

        @include('components.frontend.header')


        <!-- page-title -->
        <div class="page-title" style="background-image: url('{{ asset('frontend/assets/images/bg/page-title.webp') }}');">
            <div class="container-full">
                <div class="row">
                    <div class="col-12">
                        <h3 class="heading text-center">{{ $category->category_name }}</h3>
                        <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                            <li>
                                <a class="link" href="{{ route('frontend.index') }}">Home</a>
                            </li>
                            <li>
                                <i class="icon-arrRight"></i>
                            </li>
                            <li>
                                <a class="link" href="#">Shop by Category</a>
                            </li>
                            <li>
                                <i class="icon-arrRight"></i>
                            </li>
                            <li>
                                {{ $category->category_name }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page-title -->



        <!-- Product_Main -->
        <section class="flat-spacing">
            <div class="tf-main-product section-image-zoom">
                <div class="container">
                    <div class="row">
                        <!-- Product default -->
                        <div class="col-md-6">
                            <div class="tf-product-media-wrap sticky-top">
                                <div class="thumbs-slider">
                                    <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom" data-direction="vertical">
                                        <div class="swiper-wrapper stagger-wrap">
                                            @foreach($galleryImages as $image)
                                            <div class="swiper-slide stagger-item" data-color="gray">
                                                <div class="item">
                                                    <img class="lazyload" data-src="{{ asset('murupp/product/gallery/' . $image) }}" 
                                                        src="{{ asset('murupp/product/gallery/' . $image) }}" alt="">
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                        <div class="swiper-wrapper">
                                            @foreach($galleryImages as $image)
                                            <div class="swiper-slide" data-color="gray">
                                                <a href="{{ asset('murupp/product/gallery/' . $image) }}" target="_blank" class="item" 
                                                    data-pswp-width="600px" data-pswp-height="800px">
                                                    <img class="tf-image-zoom lazyload" 
                                                        data-zoom="{{ asset('murupp/product/gallery/' . $image) }}" 
                                                        data-src="{{ asset('murupp/product/gallery/' . $image) }}" 
                                                        src="{{ asset('murupp/product/gallery/' . $image) }}" alt="">
                                                </a>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <!-- /Product default -->


                        <!-- tf-product-info-list -->
                        <div class="col-md-6">
                            <div class="tf-product-info-wrap position-relative">
                                <div class="tf-zoom-main"></div>
                                <div class="tf-product-info-list other-image-zoom">
                                    <div class="tf-product-info-heading">
                                        <div class="tf-product-info-name">
                                            <h3 class="name">{{ $product->product_name }}</h3>
                                        </div>
                                        <div class="tf-product-info-desc">
                                            <div class="tf-product-info-price">
                                                <h5 class="price-on-sale font-2">
                                                    <i class="fa fa-inr" aria-hidden="true"></i> INR {{ $product->product_price }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    @if(!empty($productColor) && count($productColor) > 0)
                                        <div class="tf-product-info-choose-option">
                                            <div class="variant-picker-item">
                                                <div class="variant-picker-label mb_12">
                                                    Colors: <span class="text-title" id="selected-color">{{ $productColor[0] ?? 'Select Color' }}</span>
                                                </div>
                                                <div class="variant-picker-values">
                                                    @foreach($productColor as $id => $color)
                                                        <input id="color_{{ $id }}" type="radio" name="color1" value="{{ $color }}" 
                                                            {{ $loop->first ? 'checked' : '' }} onchange="updateSelectedColor(this)">
                                                        <label for="color_{{ $id }}" class="hover-tooltip tooltip-bot radius-60 color-btn {{ $loop->first ? 'active' : '' }}">
                                                            <span class="btn-checkbox" style="background-color: {{ $color }};"></span>
                                                            <span class="tooltip">{{ $color }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <br>

                                    @if(!empty($productSizes) && count($productSizes) > 0)
                                        <div class="variant-picker-item">
                                            <div class="d-flex justify-content-between mb_12">
                                                <div class="variant-picker-label">
                                                    Size:
                                                    <span class="text-title variant-picker-label-value" id="selected-size">
                                                        {{ $productSizes[0] ?? 'Select Size' }}
                                                    </span>
                                                </div>
                                                <a href="#size-guide" data-bs-toggle="modal" class="size-guide text-title link">Size Guide</a>
                                            </div>

                                            <div class="variant-picker-values gap12">
                                                @foreach($productSizes as $id => $size)
                                                    <input type="radio" id="size_{{ $id }}" name="size" value="{{ $size }}" 
                                                        {{ $loop->first ? 'checked' : '' }} onchange="updateSelectedSize(this)">
                                                    <label for="size_{{ $id }}" class="style-text size-btn">
                                                        <span class="text-title">{{ $size }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <p class="mt-3">
                                                For customized sizes, please <a class="contact-link" href="">contact us.</a>
                                            </p>
                                        </div>
                                    @endif
                                        <br>

                                        <div class="tf-product-info-quantity">
                                            <div class="title mb_12">Quantity:</div>
                                            <div class="wg-quantity">
                                                <span class="btn-quantity btn-decrease">-</span>
                                                <input class="quantity-product" type="text" name="quantity" value="1">
                                                <span class="btn-quantity btn-increase">+</span>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <div class="tf-product-info-by-btn mb_10">
                                                <a href="{{ route('cart.add', ['id' => $product->id, 'quantity' => 1]) }}" 
                                                class="btn-style-2 flex-grow-1 text-btn-uppercase fw-6 btn-add-to-cart">
                                                    <span>Add to cart</span>
                                                </a>
                                                <a href="{{ route('wishlist.add', ['id' => $product->id]) }}" 
                                                class="box-icon hover-tooltip text-caption-2 wishlist btn-icon-action">
                                                    <span class="icon icon-heart"></span>
                                                    <span class="tooltip text-caption-2">Wishlist</span>
                                                </a>
                                            </div>
                                        </div><br>

                                        
                                        <ul class="tf-product-info-sku">
                                        
                                            <li>
                                                <p class="text-caption-1">Available:</p>
                                                @if($product->available_quantity > 0)
                                                    <p class="text-caption-1 text-1">Stock</p>
                                                @else
                                                    <p class="text-caption-1 text-1 text-danger">Out of Stock</p>
                                                @endif
                                            </li>

                                            <li>
                                                <p class="text-caption-1">Categories:</p>
                                                <p class="text-caption-1">
                                                    @if(!empty($category))
                                                        <a href="#" class="text-1 link">{{ $category->category_name }}</a>
                                                    @else
                                                        <span class="text-muted">No Category</span>
                                                    @endif
                                                </p>
                                            </li>

                                            <li>
                                                <p class="text-caption-1">Fabric:</p>
                                                <p class="text-caption-1">
                                                    @if(!empty($fabric))
                                                        <a href="#" class="text-1 link">{{ $fabric }}</a>
                                                    @else
                                                        <span class="text-muted">Not Available</span>
                                                    @endif
                                                </p>
                                            </li>

                                            <li>
                                                <p class="text-caption-1">Fabric Composition:</p>
                                                <p class="text-caption-1">
                                                    @if(!empty($fabricComposition))
                                                        <a href="#" class="text-1 link">{{ $fabricComposition }}</a>
                                                    @else
                                                        <span class="text-muted">Not Available</span>
                                                    @endif
                                                </p>
                                            </li><br>

                                        </ul>
                                        <div class="tf-product-info-guranteed">
                                            <div class="text-title">
                                                Guranteed safe checkout:
                                            </div>
                                            <div class="tf-payment">
                                                <a href="#">
                                                    <img src="{{ asset('frontend/assets/images/payment/img-1.png') }}" alt="">
                                                </a>
                                                <a href="#">
                                                    <img src="{{ asset('frontend/assets/images/payment/img-2.png') }}" alt="">
                                                </a>
                                                <a href="#">
                                                    <img src="{{ asset('frontend/assets/images/payment/img-3.png') }}" alt="">
                                                </a>
                                                <a href="#">
                                                    <img src="{{ asset('frontend/assets/images/payment/img-4.png') }}" alt="">
                                                </a>
                                                <a href="#">
                                                    <img src="{{ asset('frontend/assets/images/payment/img-5.png') }}" alt="">
                                                </a>
                                                <a href="#">
                                                    <img src="{{ asset('frontend/assets/images/payment/img-6.png') }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /tf-product-info-list -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /Product_Main -->



        <!-- Product_Description_Tabs -->
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="widget-tabs style-1">
                            <ul class="widget-menu-tab">
                                <li class="item-title active">
                                    <span class="inner">Description & Care</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Shipping Fees & Timeline</span>
                                </li>
                                <li class="item-title">
                                    <span class="inner">Returns & Exchange</span>
                                </li>
                            </ul>
                            <div class="widget-content-tab">
                                <div class="widget-content-inner active">
                                    <div class="tab-description">
                                    <p>{!! $product->description ?? 'No description available.' !!}</p>
                                    </div>
                                </div>
                                
                                <div class="widget-content-inner">
                                    <div class="tab-shipping">
                                        <div>
                                            @php
                                                $shippingLines = array_filter(explode('.', $product->shipping)); // Split into sentences and remove empty values
                                                $firstLine = strtoupper(trim(array_shift($shippingLines))); // Get and remove the first sentence
                                            @endphp

                                            <p class="text-btn-uppercase mb_12"><b>{{ $firstLine }}.</b></p>

                                            @foreach($shippingLines as $line)
                                                <p class="mb_12">{{ trim($line) }}.</p>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                <div class="widget-content-inner">
                                <div class="tab-policies">
                                    <p class="text-btn-uppercase mb_12"><b>{{ strtoupper(strtok($product->return, '.')) }}.</b></p>
                                    <p class="mb_12 text-secondary">
                                        {{ substr($product->return, strlen(strtok($product->return, '.')) + 1) ?? 'No policies available.' }}
                                        <a href="#">Return & Exchange Policy.</a>
                                    </p>
                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Product_Description_Tabs -->




        <!-- size-guide -->
        <div class="modal fade modal-size-guide" id="size-guide">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content widget-tabs style-2">
                    <div class="header">
                        <ul class="widget-menu-tab">
                            <li class="item-title active">
                                <span class="inner text-button">Size Guide</span>
                            </li>
                        </ul>
                        <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                    </div>
                    <div class="wrap">
                        <div class="widget-content-tab">
                            <div class="widget-content-inner active">
                                @if($sizeCharts->isNotEmpty())
                                    <table class="tab-sizeguide-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                @foreach($sizeCharts as $size => $sizeGroup)
                                                    <th>{{ strtoupper($size) }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bust</td>
                                                @foreach($sizeCharts as $sizeGroup)
                                                    <td>{{ $sizeGroup->first()->bust }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>Waist</td>
                                                @foreach($sizeCharts as $sizeGroup)
                                                    <td>{{ $sizeGroup->first()->waist }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>Hips</td>
                                                @foreach($sizeCharts as $sizeGroup)
                                                    <td>{{ $sizeGroup->first()->hips }}</td>
                                                @endforeach
                                            </tr>    
                                        </tbody>
                                    </table>
                                @else
                                    <p>No size guide available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /size-guide -->



        @if($relatedProducts->isNotEmpty())
            <section class="flat-spacing">
                <div class="container">
                    <div class="heading-section text-center wow fadeInUp">
                        <h3 class="heading">Related Products</h3>
                    </div>
                    <div dir="ltr" class="swiper tf-sw-recent" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-pagination="1" data-pagination-md="1" data-pagination-lg="1">
                        <div class="swiper-wrapper">
                            @foreach($relatedProducts as $related)
                            <div class="swiper-slide">
                                <div class="card-product card-product-size wow fadeInUp" data-wow-delay="0s">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('product.show', $related->slug) }}" class="product-img">
                                            @php
                                                $images = json_decode($related->thumbnail_image, true) ?? [];
                                                $thumbnail = count($images) > 0 ? asset('/murupp/product/thumbnails/' . $images[0]) : asset('images/default-product.jpg');
                                            @endphp
                                            <img class="lazyload img-product" data-src="{{ $thumbnail }}" src="{{ $thumbnail }}" alt="{{ $related->name }}">
                                            <img class="lazyload img-hover" data-src="{{ $thumbnail }}" src="{{ $thumbnail }}" alt="{{ $related->name }}">
                                        </a>
                                        <div class="variant-wrap size-list">
                                        @php
                                            // Fetch sizes based on stored size IDs
                                            $sizeIds = json_decode($related->sizes, true) ?? [];
                                            $productSizes = \App\Models\ProductSizes::whereIn('id', $sizeIds)
                                                ->whereNull('deleted_at')
                                                ->pluck('size')
                                                ->toArray();
                                        @endphp

                                        @if(!empty($productSizes))
                                            <ul class="variant-box">
                                                @foreach($productSizes as $size)
                                                    <li class="size-item">{{ $size }}</li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        </div>
                                        <div class="list-product-btn">
                                            <a href="{{ route('wishlist.add', ['id' => $related->id]) }}" class="box-icon wishlist btn-icon-action" aria-label="Add to Wishlist">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Wishlist</span>
                                            </a>
                                        </div>
                                        <div class="list-btn-main">
                                            <a href="{{ route('cart.add', ['id' => $related->id]) }}" data-bs-toggle="modal" class="btn-main-product">Quick Add</a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="{{ route('product.show', $related->slug) }}" class="title link">{{ $related->product_name }}</a>
                                        <span class="price"><i class="fa fa-inr" aria-hidden="true"></i> {{ $related->product_price }} INR</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="sw-pagination-recent sw-dots type-circle justify-content-center"></div>
                    </div>
                </div>
            </section>
        @endif



        @include('components.frontend.footer')

        @include('components.frontend.main-js')

        <script src="{{ asset('frontend/assets/js/drift.min.js') }}" defer></script>
        <script type="module" src="{{ asset('frontend/assets/js/model-viewer.min.js') }}"></script>
        <script type="module" src="{{ asset('frontend/assets/js/zoom.js') }}"></script>

 <!-- For dynamic size fetching -->       
<script>
    function updateSelectedSize(element) {
        document.getElementById('selected-size').innerText = element.value;
    }
</script>


 <!-- For Product color -->   
<script>
    function updateSelectedColor(element) {
        document.getElementById('selected-color').innerText = element.value;
    }
</script>



</body>

</html>