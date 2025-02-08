<!DOCTYPE html>
<html dir="lrt" lang="en">
@include('storefront._header')

<body data-spy="scroll" data-target="#fixedNavbar">
    @include('storefront._api')
    <div class="page-wrapper" id="wrapper">
        @include('storefront._navbar')
        <main class="main-area">
            @yield('content')
            @include('storefront._footer')
        </main>
        <a href="{{ config('app.url') }}softwares#" class="landing scroll-top-btn" data-scroll-goto="1">
            <i class="fas fa-long-arrow-alt-up"></i>
        </a>
        <div class="cookie-wrap d-none">
            <h4>I Use Cookies</h4>
            <p>My website uses essential cookies necessary for its functioning. By continuing browsing, you consent to
                my use of cookies and other technologies.</p>
            <div class="button-wrap"><a href="https://larawebdev.com/softwares#" class="landing-button">I
                    understand</a><a href="https://larawebdev.com/softwares#" class="learn-more-link">Learn More</a>
            </div>
        </div>
    </div>
    @stack('script')
</body>

</html>
