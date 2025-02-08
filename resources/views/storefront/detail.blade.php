@extends('storefront.layout')
@section('title')
    {{ $product->name }}
@endsection
@section('content')
    <section class="breadcrumb-section section">
        <div class="container">
            <div class="row">
                <div class="breadcrumb-inner">
                    <ul class="breadcrumb-links">
                        <li>
                            <a href="{{ route('storefront.index') }}">Home</a>
                        </li>
                        <li class="active">
                            <a href="{{ route('storefront.applications') }}">Applications</a>
                        </li>
                        <li class="active">
                            <a
                                href="{{ route('storefront.search', $product->category->slug) }}">{{ $product->category->name }}</a>
                        </li>
                        <li class="active">{{ $product->name }} ({{ $product->url['code'] }}) </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section sidebar-wrapper product_detail_page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 product-desc">
                    <h4> {{ $product->name }} <small class="title_last2">({{ $product->url['code'] }})</small></h4>
                </div>
                <div class="col-lg-8">
                    <div class="product-desc">
                        <div id="product-desc-img" class="product-desc-img">
                            <a target="_blank"
                                href="{{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}">
                                <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}" class="img-fluid">
                            </a>
                            <a target="_blank" href="#">
                                <div id="show_demo" class="show_demo" style="display: none;">
                                    <span>Live Demo</span>
                                </div>
                            </a>
                        </div>
                        <div class="product-desc-text">
                            {!! $product->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 right_sidebar">
                    <div class="sidebar-demo-price">
                        <h3 class="product_price">
                            <sup>৳</sup>{{ $product->price * (1 - $product->url['discount'] / 100) }} <del
                                class="discount_price"><sup>৳</sup>{{ $product->price }}</del><sup
                                class="price_off">{{ $product->url['discount'] }}%
                                OFF</sup>
                        </h3>
                        <h6> (For Lifetime) </h6><br><a class="landing-button buy_now" id="buy_now" sid="15"
                            href="#">Buy Now</a>
                    </div>
                    <div class="sidebar-demo-buttons">
                        <h6>Live Demo</h6>
                        <hr>
                        @foreach ($product->url as $key => $value)
                            @if ($key != 'code' && $key != 'discount')
                                <a target="_blank" href="{{ $value }}">{{ ucfirst($key) }}</a>
                            @endif
                        @endforeach
                    </div>
                    <div class="sidebar-demo-list">
                        <h6>Including</h6>
                        <hr>
                        <ul>
                            <li>.com Domain </li>
                            <li>5GB SSD Hosting </li>
                            <li>Source Code </li>
                            <li>Free Installation </li>
                            <li>Free Instruction </li>
                            <li>1 Year Support </li>
                        </ul>
                    </div>
                    <div class="sidebar-demo-list">
                        <h6>Hosting Features</h6>
                        <hr>
                        <ul>
                            <li>5 GB SSD Hosting</li>
                            <li>2 GB RAM</li>
                            <li>Unlimited Bandwidth</li>
                            <li>Unlimited Database</li>
                            <li>Unlimited Email</li>
                            <li>cPanel Control Panel</li>
                            <li>SSL Certificate</li>
                            <li>Hacker Protection</li>
                            <li>Cloud Flare</li>
                            <li>Cloud Linux</li>
                        </ul>
                    </div>
                    <div class="sidebar-demo-share">
                        <h6>Share</h6>
                        <hr>
                        <ul>
                            <li><a class="share"
                                    href="https://www.facebook.com/sharer.php?u={{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}"><i
                                        class="fab fa-facebook-f fb"></i></a></li>
                            <li><a class="share"
                                    href="https://www.facebook.com/dialog/send?app_id=yourappid:3502450872&amp;link={{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}&amp;redirect_uri={{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}"><i
                                        class="fab fa-facebook-messenger msg"></i></a></li>
                            <li><a target="_blank"
                                    href="https://api.whatsapp.com/send?text={{ $product->name }}%{{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}"><i
                                        class="fab fa-whatsapp wa"></i></a></li>
                            <li><a class="share"
                                    href="https://twitter.com/share?url={{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}&amp;text={{ $product->name }}(1)"><i
                                        class="fab fa-twitter tt"></i></a></li>
                            <li><a class="share"
                                    href="https://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}"><i
                                        class="fab fa-linkedin-in li"></i></a></li>
                            <li><a class="share"
                                    href="https://pinterest.com/pin/create/button/?url={{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}&amp;media={{ asset($product->thumbnail) }}"><i
                                        class="fab fa-pinterest-p pt"></i></a></li>
                            <li><a
                                    href="mailto:?subject={{ $product->name }}&amp;body={{ $product->name }}%20({{ $product->url['code'] }})%20{{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}"><i
                                        class="far fa-envelope mail"></i></a></li>
                        </ul>
                        <div class="share_url"><input
                                value="{{ route('storefront.detail', ['category' => $product->category->slug, 'product' => $product->slug]) }}"
                                disabled="" id="current_url" class="form-control" type="text"><button
                                onclick="copyUrl()" title="Copy to clipboard" type="button" id="btn_copy"
                                class="btn_copy">Copy</button></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="container d-none">
            <div class="product-list-slider">
                <h2 class="product-list-header">Most Popular Scripts</h2>
                <div class="owl-carousel owl-theme owl-loaded owl-drag" id="productListCarousel">
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: all;">
                            <div class="owl-item">
                                <div class="item">
                                    <div class="product-list-item">
                                        <div class="product-img"><a href="https://larawebdev.com/product-detail.html"><img
                                                    src="./Detail POS (1)_files/digital-team-preview.png" alt="Blog image"
                                                    class="img-fluid"></a>
                                            <div class="product-buttons"><a
                                                    href="https://larawebdev.com/laravel-store-management-software-with-pos#"><i
                                                        class="fa fa-eye"></i></a></div>
                                        </div>
                                        <div class="product-body"><span>Full Responsive</span><span>Cms</span>
                                            <h5><a href="https://larawebdev.com/product-detail.html">
                                                    DigitalTeam - Creative Portfolio &amp; Agency Script </a>
                                            </h5>
                                            <h3><sub>$</sub>49</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="item">
                                    <div class="product-list-item">
                                        <div class="product-img"><a href="https://larawebdev.com/product-detail.html"><img
                                                    src="./Detail POS (1)_files/01_allegro_preview_img.png"
                                                    alt="Blog image" class="img-fluid"></a>
                                            <div class="product-buttons"><a
                                                    href="https://larawebdev.com/laravel-store-management-software-with-pos#"><i
                                                        class="fa fa-eye"></i></a></div>
                                        </div>
                                        <div class="product-body"><span>Full Responsive</span><span>Cms</span>
                                            <h5><a href="https://larawebdev.com/product-detail.html"> Allegro -
                                                    Multipurpose Laravel CMS Script </a></h5>
                                            <h3><sub>$</sub>69</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                class="fa fa-arrow-left"></span></button><button type="button" role="presentation"
                            class="owl-next"><span class="fa fa-arrow-right"></span></button></div>
                    <div class="owl-dots disabled"></div>
                </div>
            </div>
        </div> --}}
    </section>
@endsection
@push('script')
    <script>
        function copyUrl() {
            const url = window.location.href; // Get the current URL

            // Check if Clipboard API is supported
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(url)
                    .then(() => {
                        alert('URL copied to clipboard!');
                    })
                    .catch(err => {
                        console.error('Failed to copy: ', err);
                        alert('Failed to copy URL.');
                    });
            } else {
                // Fallback for older browsers
                try {
                    const tempInput = document.createElement('input'); // Create temporary input
                    tempInput.style.position = 'absolute';
                    tempInput.style.left = '-9999px'; // Hide it off-screen
                    tempInput.value = url; // Set URL as value
                    document.body.appendChild(tempInput); // Add to document
                    tempInput.select(); // Select the input text
                    document.execCommand('copy'); // Copy the text
                    document.body.removeChild(tempInput); // Remove input
                    alert('URL copied to clipboard!');
                } catch (err) {
                    console.error('Fallback failed: ', err);
                    alert('Failed to copy URL.');
                }
            }
        }
    </script>
@endpush
