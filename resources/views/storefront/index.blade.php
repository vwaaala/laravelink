@extends('storefront.layout')
@section('title')
    Home
@endsection
@section('content')
    <section id="landing-hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                    <div class="landing-hero-img"><a href="{{ route('storefront.applications') }}"><img
                                src="{{ asset('heroimage.webp') }}" alt="স্পেশাল অফার! ৭০% পর্যন্ত ডিসকাউন্ট!"
                                class="img-fluid"></a></div>
                </div>
                <div class="col-lg-6 col-xl-6 col-md-10 wow fadeInUp" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="landing-hero-inner">
                        <h1>Special Offer! Up to 70% Discount!</h1>
                        <h2>Create your website with Laravel framework, the most popular, high-speed, and highly secure
                            technology for
                            website development.</h2>
                        <a href="{{ route('storefront.applications') }}" class="landing-button">Get
                            Started</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <h6>Browse Categories</h6>
            <div class="d-flex flex-wrap mt-2">
                @foreach ($categories as $item)
                    <div class="mr-2"> <!-- Add margin to the right for spacing -->
                        <a href="{{ route('storefront.search', $item->slug) }}" class="landing-button">{{ $item->name }}
                            ({{ $item->products->count() }})
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
