@extends('storefront.layout')
@section('title')
    Home
@endsection
@section('content')
    <section class="breadcrumb-section section">
        <div class="container">
            <div class="row">
                <div class="breadcrumb-inner">
                    <ul class="breadcrumb-links">
                        <li><a href="{{ route('storefront.applications') }}">Home</a></li>
                        <li class="active"> About </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section sidebar-wrapper">
        <div class="container">
            <p>Laravelink is a Laravel Web Development Company in Bangladesh that provides web development services using
                the Laravel framework. Laravel is a popular PHP framework that provides an elegant syntax and tools for web
                developers to build robust and scalable web applications. The company specializes in creating eCommerce
                websites, news & blog websites, store-management software, learning management systems, classified websites,
                job-portal websites, travel agent websites, school management software, ERP software, HRM software, CRM
                software, accounting software, custom web websites, and other web-based solutions using Laravel. We have a
                team of experienced developers who are well-versed in the latest web development technologies, including
                Laravel. We also provide ongoing maintenance and support for our clients to ensure the smooth running of our
                web applications. We are dedicated to delivering high-quality solutions that meet the unique needs of our
                clients while ensuring timely delivery. You don't have to hire developers and pay thousands of dollars to
                develop new websites. We are providing completely ready-to-use websites and scripts to start your business
                in 30 minutes.</p>
        </div>
    </section>
@endsection
