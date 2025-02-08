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
                        <li class="active">Support</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section sidebar-wrapper">
        <div class="container">
            <p>
                We are committed to providing our clients with the highest level of support for our software (1 Year of free
                support). Our dedicated support team is available to answer any questions or address any issues that may
                arise during the implementation and use of our products. We offer a variety of support options to meet the
                needs of our clients, including email support, live chat support, phone support, and remote access support.
                Our support team is available during regular business hours, and we also offer after-hours support for
                urgent issues. We also offer online training sessions, to ensure that our clients are able to fully utilize
                the capabilities of our products.

                We understand the importance of timely and effective support, and we are dedicated to ensuring that our
                clients have a positive experience with our products. If you have any questions or need assistance, please
                don't hesitate to contact us.
            </p>
        </div>
    </section>
@endsection
