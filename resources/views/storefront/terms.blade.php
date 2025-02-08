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
                        <li class="active"> Terms & Conditions </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section sidebar-wrapper">
        <div class="container">
            <h6>Acceptance of the Use of Laravelink</h6>
            <p>
                By availing of any services from Laravelink, you’re acknowledging the terms and conditions provided by us.
                Any of these services are subject to follow these terms and conditions strictly. If you are availing
                services from Laravelink, that signifies the agreement with the disclaimers, terms, and conditions provided
                by our company. You will not utilize Laravelink’s service for any purpose which is illegal or forbidden by
                any terms and conditions.
            </p>


            <h6>Change of Use</h6>
            <p>
                Laravelink reserves the right to:

                We adjust, modify or eliminate anything from its website anytime without any prior notice. What’s more, by
                accepting these terms and conditions you’re affirming that Laravelink will neither be at risk for any
                progressions done in its webpage, nor it needs to educate about any adjustment to its website.

                Modify the terms and conditions whenever with no prior notice. What’s more, proceeding with the utilization
                of your site after the alteration will pass on your acceptance of the changes made.
            </p>
        </div>
    </section>
@endsection
