@extends('storefront.layout')
@section('title')
    Applications
@endsection
@section('content')
    <section class="breadcrumb-section section">
        <div class="container">
            <div class="row">
                <div class="breadcrumb-inner">
                    <ul class="breadcrumb-links">
                        <li><a href="{{ route('storefront.applications') }}">Home</a></li>
                        <li class="active"> Category </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section sidebar-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget-sidebar">
                        {{-- <div class="sidebar-widgets">
                            <h5 class="inner-header-title">Search</h5>
                            <form id="searchbox">
                                <div class="blog-search-bar position-relative"><input id="search" type="search"
                                        placeholder="Search..." class="search-form-control" required=""><button
                                        type="submit" class="blog-search-btn"><span class="fa fa-search"></span></button>
                                </div>
                            </form>
                        </div> --}}
                        <div class="sidebar-widgets">
                            <h5 class="inner-header-title">Categories</h5>
                            <ul class="sidebar-category-list clearfix">
                                <li class="{{ request()->routeIs('storefront.applications') ? 'active' : '' }}">
                                    <a href="{{ route('storefront.applications') }}">All Categories</a>
                                </li>
                                @foreach ($categories as $item)
                                    <li class="{{ request()->route('category') === $item->slug ? 'active' : '' }}">
                                        <a href="{{ route('storefront.search', $item->slug) }}">{{ $item->name }}
                                            <span class="category-count">({{ $item->products->count() }})</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($products as $item)
                            <div class="col-lg-6 col-md-6">
                                <div class="product-list-item">
                                    <div class="product-img"><a
                                            href="{{ route('storefront.detail', ['category' => $item->category->slug, 'product' => $item->slug]) }}"><img
                                                src="{{ asset($item->thumbnail) }}"
                                                alt="Laravel Multi-Vendor eCommerce Website (1)" class="img-fluid"></a>
                                        <div class="product-buttons">
                                            <a
                                                href="{{ route('storefront.detail', ['category' => $item->category->slug, 'product' => $item->slug]) }}">Details</a>
                                            <a target="_blank" href="https://{{ $item->url['demo'] }}">
                                                Demo</a>
                                        </div>
                                    </div>
                                    <div class="product-body"><small><a class="product_tag"
                                                href="{{ route('storefront.search', $item->category->slug) }}"><i
                                                    class="fa fa-hashtag"></i>{{ $item->category->name }}</a></small>
                                        <h5><a
                                                href="{{ route('storefront.detail', ['category' => $item->category->slug, 'product' => $item->slug]) }}">{{ $item->name }}
                                                <small class="title_last">({{ $item->url['code'] }})</small></a>
                                        </h5>
                                        {{-- <h3 class="product_price"><sup>৳</sup>6,000 <del
                                                class="discount_price"><sup>৳</sup>15,000</del><sup class="price_off">60%
                                                OFF</sup></h3> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
