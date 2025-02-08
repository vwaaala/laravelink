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
                        <li class="active"> Privacy Policy </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="section sidebar-wrapper">
        <div class="container">
            <h6>Site Activity Data</h6>
            <p>
                Each time a guest results in these present circumstances site; our web server gathers and logs certain data.
                These entrance logs are kept for a reasonable period of time. These logs incorporate however are not
                confined to your machine’s TCP/IP address, your username (if pertinent), date, time and documents got to.
            </p>


            <h6>Cookies</h6>
            <p>
                Parts of the site may utilize cookies just for security and authentication purposes. This data is utilized
                exclusively to keep up your computer’s session to the server. This data isn’t shared or sold to outsider
                associations for any reason.

            </p>

            <h6>Personal Information</h6>
            <p>
                Individual data, for example, your name, individual postal and email address, or individual phone number is
                collected just when you voluntarily share it with us. Such data is received when you send an email through
                the website or reach, for example, finishing an online form or enrolling for a course.

                The personal information you give to the association is sent just to the individual or division prepared to
                deal with your demand and is utilized just to react to your request.

                As a software development company, we will not be selling any of the Personal information to any third
                parties.
            </p>
        </div>
    </section>
@endsection
