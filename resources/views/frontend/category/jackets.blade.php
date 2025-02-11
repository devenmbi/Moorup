<!doctype html>
<html lang="en">
    
<head>
    @include('components.frontend.head')
</head>
	   

<body class="preload-wrapper">

        @include('components.frontend.header')


        <!-- page-title -->
        <div class="page-title" style="background-image: url({{ asset('murupp/category/jackets/' . $banner->banner_image) }});">
            <div class="container-full">
                <div class="row">
                    <div class="col-12">
                        <h3 class="heading text-center">{{ $banner->banner_heading }}</h3>
                        <ul class="breadcrumbs d-flex align-items-center justify-content-center">
                            <li>
                                <a class="link" href="#">Home</a>
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
                                {{ $banner->banner_heading }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page-title -->

        <!-- Section product -->
        <section class="flat-spacing">
            <div class="container">
                <div class="tf-shop-control">
                    <div class="tf-control-filter">
                        <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="filterShop" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filters</span></a>
                    </div>
                    <ul class="tf-control-layout">
                        <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                            <div class="item">
                                <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="6" cy="6" r="2.5" stroke="#181818"></circle>
                                    <circle cx="14" cy="6" r="2.5" stroke="#181818"></circle>
                                    <circle cx="6" cy="14" r="2.5" stroke="#181818"></circle>
                                    <circle cx="14" cy="14" r="2.5" stroke="#181818"></circle>
                                </svg>
                            </div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-3 active" data-value-layout="tf-col-3">
                            <div class="item">
                                <svg class="icon" width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="11" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="19" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="11" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="19" cy="14" r="2.5" stroke="#181818" />
                                </svg>
                            </div>
                        </li>
                        <li class="tf-view-layout-switch sw-layout-4 " data-value-layout="tf-col-4">
                            <div class="item">
                                <svg class="icon" width="30" height="20" viewBox="0 0 30 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="3" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="11" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="19" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="27" cy="6" r="2.5" stroke="#181818" />
                                    <circle cx="3" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="11" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="19" cy="14" r="2.5" stroke="#181818" />
                                    <circle cx="27" cy="14" r="2.5" stroke="#181818" />
                                </svg>
                            </div>
                        </li>
                    </ul>
                    <div class="tf-control-sorting">
                        <p class="d-none d-lg-block text-caption-1">Sort by:</p>
                        <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                            <div class="btn-select">
                                <span class="text-sort-value">Best selling</span>
                                <span class="icon icon-arrow-down"></span>
                            </div>
                            <div class="dropdown-menu">
                                <div class="select-item" data-sort-value="best-selling">
                                    <span class="text-value-item">Best selling</span>
                                </div>
                                <div class="select-item" data-sort-value="a-z">
                                    <span class="text-value-item">Alphabetically, A-Z</span>
                                </div>
                                <div class="select-item" data-sort-value="z-a">
                                    <span class="text-value-item">Alphabetically, Z-A</span>
                                </div>
                                <div class="select-item" data-sort-value="price-low-high">
                                    <span class="text-value-item">Price, low to high</span>
                                </div>
                                <div class="select-item" data-sort-value="price-high-low">
                                    <span class="text-value-item">Price, high to low</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrapper-control-shop">
                    <div class="meta-filter-shop">
                        <div id="product-count-grid" class="count-text"></div>
                        <div id="product-count-list" class="count-text"></div>
                        <div id="applied-filters"></div>
                        <button id="remove-all" class="remove-all-filters text-btn-uppercase" style="display: none;">REMOVE ALL <i class="icon icon-close"></i></button>
                    </div>
                    <div class="tf-grid-layout wrapper-shop tf-col-3" id="gridLayout">
                        @foreach($products as $product)
                            <div class="card-product grid">
                                <div class="card-product-wrapper">
                                    <a href="#" class="product-img">
                                        @php
                                            $thumbnailImages = json_decode($product->thumbnail_image);
                                        @endphp
                                        @if($thumbnailImages && count($thumbnailImages) > 1)
                                            <img class="lazyload img-product" data-src="{{ asset('murupp/product/thumbnails/'.$thumbnailImages[0]) }}" src="{{ asset('murupp/product/thumbnails/'.$thumbnailImages[0]) }}" alt="image-product">
                                            <img class="lazyload img-hover" data-src="{{ asset('murupp/product/thumbnails/'.$thumbnailImages[1]) }}" src="{{ asset('murupp/product/thumbnails/'.$thumbnailImages[1]) }}" alt="image-product">
                                        @elseif($thumbnailImages && count($thumbnailImages) > 0)
                                            <img class="lazyload img-product" data-src="{{ asset('murupp/product/thumbnails/'.$thumbnailImages[0]) }}" src="{{ asset('murupp/product/thumbnails/'.$thumbnailImages[0]) }}" alt="image-product">
                                        @endif
                                    </a>
                                    <div class="list-product-btn">
                                        <a href="" class="box-icon wishlist btn-icon-action">
                                            <span class="icon icon-heart"></span>
                                            <span class="tooltip">Wishlist</span>
                                        </a>
                                    </div>
                                    <div class="list-btn-main">
                                        <a href="#" data-bs-toggle="modal" class="btn-main-product">Add To cart</a>
                                    </div>
                                </div>
                                <div class="card-product-info">
                                    <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="title link">
                                        {{ $product->product_name }}
                                    </a>
                                    <span class="price current-price"><i class="fa fa-inr" aria-hidden="true"></i> INR {{ $product->product_price }}</span>
                                </div>
                            </div>
                        @endforeach


                           <!-- pagination -->
                        <ul class="wg-pagination justify-content-center">
                            <li><a href="#" class="pagination-item text-button">1</a></li>
                            <li class="active">
                                <div class="pagination-item text-button">2</div>
                            </li>
                            <li><a href="#" class="pagination-item text-button">3</a></li>
                            <li><a href="#" class="pagination-item text-button"><i class="icon-arrRight"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </section>
        <!-- /Section product -->


    <!-- Filter -->
    <div class="offcanvas offcanvas-start canvas-filter" id="filterShop">
        <div class="canvas-wrapper">
            <div class="canvas-header">
                <h5>Filters</h5>
                <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
            </div>
            <div class="canvas-body">
                <div class="widget-facet facet-categories">
                    <h6 class="facet-title">Shop by Category</h6>
                    <ul class="facet-content">
                        <li><a href="#" class="categories-item active">Dresses <span class="count-cate">(112)</span></a></li>
                        <li><a href="#" class="categories-item">Tops <span class="count-cate">(32)</span> </a></li>
                        <li><a href="#" class="categories-item">Bottoms <span class="count-cate">(42)</span></a></li>
                        <li><a href="#" class="categories-item">Co-Ords <span class="count-cate">(13)</span></a></li>
                        <li><a href="#" class="categories-item">Blazers/Jackets <span class="count-cate">(52)</span></a></li>
                    </ul>
                </div>
                <div class="widget-facet facet-price">
                    <h6 class="facet-title">Price</h6>
                    <div class="price-val-range" id="price-value-range" data-min="0" data-max="500"></div>
                    <div class="box-price-product">
                        <div class="box-price-item">
                            <span class="title-price">Min price</span>
                            <div class="price-val" id="price-min-value" data-currency="$"></div>
                        </div>
                        <div class="box-price-item">
                            <span class="title-price">Max price</span>
                            <div class="price-val" id="price-max-value" data-currency="$"></div>
                        </div>
                    </div>
                </div>
                <div class="widget-facet facet-size">
                    <h6 class="facet-title">Size</h6>
                    <div class="facet-size-box size-box">
                        <span class="size-item size-check">XS</span>
                        <span class="size-item size-check">S</span>
                        <span class="size-item size-check">M</span>
                        <span class="size-item size-check">L</span>
                        <span class="size-item size-check">XL</span>
                        <span class="size-item size-check">2XL</span>
                        <span class="size-item size-check">3XL</span>
                        <span class="size-item size-check free-size">Free Size</span>
                    </div>
                </div>
                <div class="widget-facet facet-fieldset">
                    <h6 class="facet-title">Availability</h6>
                    <div class="box-fieldset-item">
                        <fieldset class="fieldset-item">
                            <input type="radio" name="availability" class="tf-check" id="inStock">
                            <label for="inStock">In stock <span class="count-stock">(32)</span></label>
                        </fieldset>
                        <fieldset class="fieldset-item">
                            <input type="radio" name="availability" class="tf-check" id="outStock">
                            <label for="outStock">Out of stock <span class="count-stock">(2)</span></label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="canvas-bottom">
                <button id="reset-filter" class="tf-btn btn-reset">Reset Filters</button>
            </div>
        </div>
    </div>
    <!-- /Filter -->

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
                                <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#181818" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M20.9984 20.9999L16.6484 16.6499" stroke="#181818" stroke-linecap="round" stroke-linejoin="round" />
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
                                <path d="M20.8401 4.60987C20.3294 4.09888 19.7229 3.69352 19.0555 3.41696C18.388 3.14039 17.6726 2.99805 16.9501 2.99805C16.2276 2.99805 15.5122 3.14039 14.8448 3.41696C14.1773 3.69352 13.5709 4.09888 13.0601 4.60987L12.0001 5.66987L10.9401 4.60987C9.90843 3.57818 8.50915 2.99858 7.05012 2.99858C5.59109 2.99858 4.19181 3.57818 3.16012 4.60987C2.12843 5.64156 1.54883 7.04084 1.54883 8.49987C1.54883 9.95891 2.12843 11.3582 3.16012 12.3899L4.22012 13.4499L12.0001 21.2299L19.7801 13.4499L20.8401 12.3899C21.3511 11.8791 21.7565 11.2727 22.033 10.6052C22.3096 9.93777 22.4519 9.22236 22.4519 8.49987C22.4519 7.77738 22.3096 7.06198 22.033 6.39452C21.7565 5.72706 21.3511 5.12063 20.8401 4.60987V4.60987Z"
                                stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            Wishlist
                        </a>

                        <a href="#" class="site-nav-icon">
                            <svg class="icon" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92172 15.4214 5.17157 16.1716C4.42143 16.9217 4 17.9391 4 19V21" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                />
                                <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="#181818" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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

        @include('components.frontend.footer')


@include('components.frontend.main-js')


<!-- To manage the dopdown filters of arrainging the data-->
<script>

    document.addEventListener("DOMContentLoaded", function () {
        const dropdown = document.querySelector(".tf-dropdown-sort");
        const dropdownMenu = document.querySelector(".dropdown-menu");
        const sortButton = document.querySelector(".btn-select .text-sort-value");
        const sortItems = document.querySelectorAll(".select-item");
        const productContainer = document.getElementById("gridLayout");

        // Bootstrap dropdown toggle (removes need for manual event handling)
        dropdown.addEventListener("click", function (event) {
            event.stopPropagation();
        });

        // Sorting function
        function getPrice(element) {
            let priceText = element.querySelector(".current-price")?.textContent || "";
            let price = priceText.replace(/[^\d.]/g, "").trim(); // Remove non-numeric characters
            return price ? parseFloat(price) : 0; // Ensure valid number
        }

        sortItems.forEach(item => {
            item.addEventListener("click", function () {
                const sortValue = this.getAttribute("data-sort-value");
                let products = Array.from(productContainer.children);

                if (sortValue === "best-selling") {
                    // Implement logic for best-selling if applicable
                    return;
                } else if (sortValue === "a-z") {
                    products.sort((a, b) => 
                        a.querySelector(".title").textContent.trim().localeCompare(
                            b.querySelector(".title").textContent.trim()
                        )
                    );
                } else if (sortValue === "z-a") {
                    products.sort((a, b) => 
                        b.querySelector(".title").textContent.trim().localeCompare(
                            a.querySelector(".title").textContent.trim()
                        )
                    );
                } else if (sortValue === "price-low-high") {
                    products.sort((a, b) => {
                        let priceA = getPrice(a);
                        let priceB = getPrice(b);

                        if (priceA === priceB) {
                            return a.querySelector(".title").textContent.trim().localeCompare(
                                b.querySelector(".title").textContent.trim()
                            );
                        }
                        return priceA - priceB;
                    });
                } else if (sortValue === "price-high-low") {
                    products.sort((a, b) => {
                        let priceA = getPrice(a);
                        let priceB = getPrice(b);

                        if (priceA === priceB) {
                            return a.querySelector(".title").textContent.trim().localeCompare(
                                b.querySelector(".title").textContent.trim()
                            );
                        }
                        return priceB - priceA;
                    });
                }

                // Update the product list
                productContainer.innerHTML = "";
                products.forEach(product => productContainer.appendChild(product));

                // Update the dropdown button text
                sortButton.textContent = this.textContent.trim();
            });
        });
    });

</script>

</body>

</html>