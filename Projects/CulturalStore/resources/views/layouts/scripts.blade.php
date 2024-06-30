
    <!-- Js Plugins -->
    <script src="{{asset('template/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('template/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('template/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('template/js/mixitup.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('template/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('template/js/main.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#travel-tab a').on('shown.bs.tab', function (e) {
            var target = $(e.target).attr("href");
            $('.nav-pills .nav-item').removeClass('active');
            $(this).closest('.nav-item').addClass('active');
        });
    
        $('#travel-tab a.active').each(function() {
            var target = $(this).attr("href");
            $(this).closest('.nav-item').addClass('active');
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Toggle dropdown menu when clicking on the user icon
        $('.user-dropdown-toggle').click(function(e) {
            e.preventDefault();
            var dropdown = $(this).siblings('.dropdown');
            $('.dropdown').not(dropdown).hide(); // Hide other dropdowns
            dropdown.toggle();
        });

        // Close dropdown when clicking outside of it
        $(document).click(function(e) {
            if (!$(e.target).closest('.header__right__auth').length) {
                $('.dropdown').hide();
            }
        });
    });
</script>