    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/images.loaded.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/waypoint.min.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/js/easing.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#searchbox").submit(function(event) {
            event.preventDefault();
            window.location = config('app.name') + "softwares/" + $("#search").val();
        });
        $("#buy_now").click(function(e) {
            e.preventDefault();
            var sid = $("#buy_now").attr('sid');
            var href = $("#buy_now").attr('href');
            $.ajax({
                type: "POST",
                url: "https://larawebdev.com/buy-now",
                data: {
                    software_id: sid
                }
            }).done(function(data) {
                if (data['success'] == 'done') {
                    window.location = href;
                }
            });
        });
        $("#ask_demo").click(function(e) {
            e.preventDefault();
            var sid = $("#ask_demo").attr('sid');
            var href = $("#ask_demo").attr('href');
            $.ajax({
                type: "POST",
                url: "https://larawebdev.com/ask-demo",
                data: {
                    software_id: sid
                }
            }).done(function(data) {
                if (data['success'] == 'done') {
                    window.location = href;
                }
            });
        });
        $(document).ready(function() {
            $("#product-desc-img").mouseenter(function() {
                $("#show_demo").fadeIn();
            });
            $("#product-desc-img").mouseleave(function() {
                $("#show_demo").fadeOut();
            });
        });
    </script>
