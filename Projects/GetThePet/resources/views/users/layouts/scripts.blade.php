<script src="{{ asset('users/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('users/js/bootstrap.js') }}"></script>
<!-- lightbox -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js  "></script>
<!-- custom js -->
<script src="{{ asset('users/js/custom.js') }}"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<!-- End Google Map -->

<script src="{{ asset('users/template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<!-- Template Javascript -->
<script src="{{ asset('users/template/js/main.js') }}"></script>

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

    '<?php if(Session::has('success')){ ?> Command: toastr['success']("<?php echo Session('success'); ?>"); <?php } ?>''
    <?php if(Session::has('error')){ ?> Command: toastr['error']("<?php echo Session('error'); ?>"); <?php } ?>'
    '<?php if(Session::has('warning')){ ?> Command: toastr['warning']("<?php echo Session('warning'); ?>"); <?php } ?>'
    '<?php if(Session::has('info')){ ?> Command: toastr['info']("<?php echo Session('info'); ?>"); <?php } ?>'
</script>
<!-- TOASTERS -->             

<!-- Custom JS -->
<script>
    /*-------------------
		Navbar Animation
	--------------------- */

    $(document).ready(function() {
        $(".nav-item").on('mouseenter', function() {
            $(this).find(".nav-link").css("color", "#90a955");
        });

        $(".nav-item").on('mouseleave', function() {
            $(this).find(".nav-link").css("color", "");
        });
        $(".nav-item").each(function() {
            if ($(this).hasClass("active")) {
                $(this).find(".nav-link").css("color", "#90a955");
            }
        });
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            /* Don't allow decrementing below zero */
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }9
        }
        $button.parent().find('input').val(newVal);
    });

	/*-------------------
		Redirect to Login
	--------------------- */
    function BacktoShop() {
        toastr.success("Redirecting to the Home page");

        setTimeout(function() {
            window.location.href = "/";
        }, 2000);
    }

	/*-------------------
		Redirect to Login
	--------------------- */
    function RedirectToLogin(destination) {
        let userId = "{{ Session::get('user_name') }}";
        if(userId) {
            var destination = $(this).data('destination').val();
            if(destination == 'cart') {
                window.location.href="/cart";     
            }
        } else {
            toastr.info("You need to login first.");

            setTimeout(function() {
                window.location.href = "/login";
            }, 2000);
        }
    }
	
</script>
