<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('assets/vendor/libs/jquery/jquery.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/popper/popper.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/bootstrap.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/hammer/hammer.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/i18n/i18n.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/libs/typeahead-js/typeahead.js')) }}"></script>
<script src="{{ asset(mix('assets/vendor/js/menu.js')) }}"></script>
<!-- TOASTERS -->
<link href="{{asset('toasters/toastr.min.css')}}" rel="stylesheet" type="text/css" />   
<script src="{{asset('toasters/toastr.min.js')}}" type="text/javascript"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "1000",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    //Command: toastr['success']("hello");
</script>
@if(Session::has('success'))
    <script>
        Command: toastr['success']("{{ Session('success') }}");
    </script>
@endif

@if(Session::has('error'))
    <script>
        Command: toastr['error']("{{ Session('error') }}");
    </script>
@endif

@if(Session::has('warning'))
    <script>
        Command: toastr['warning']("{{ Session('warning') }}");
    </script>
@endif

@if(Session::has('info'))
    <script>
        Command: toastr['info']("{{ Session('info') }}");
    </script>
@endif

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Hide success message after 3 seconds
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000);

        // Hide error message after 3 seconds
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 3000);
    });
</script>
<!-- TOASTERS --> 
@yield('vendor-script')
<script src="{{ asset(mix('assets/vendor/libs/toastr/toastr.js')) }}"></script>
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('assets/js/main.js')) }}"></script>

<!-- END: Theme JS-->
<!-- Pricing Modal JS-->
@stack('pricing-script')
<!-- END: Pricing Modal JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->
