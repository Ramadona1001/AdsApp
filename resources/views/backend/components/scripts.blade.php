<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/chart.js/dist/Chart.min.js"></script>
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/summernote/dist/summernote-bs4.js"></script>
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

<!-- Template JS File -->

<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/izitoast/dist/js/iziToast.min.js"></script>
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/js/scripts.js"></script>
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/js/page/index-0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@yield('javascript')

@if (Session::has('success'))
<script>
    Command: toastr["warning"]("Process is done", "Success")

    toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }


</script>
@endif

@if (Session::has('failed'))
    <script>
        Command: toastr["error"]("Process is failed", "Failed")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
@endif

@if (Session::has('failedprocess'))
    <script>
        Command: toastr["error"]("{{ Session::get('failedprocess') }}", "Failed")

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
@endif

<script>
function restrictInputOtherThanArabic($field)
{
    // Arabic characters fall in the Unicode range 0600 - 06FF
    var arabicCharUnicodeRange = /[\u0600-\u06FF]/;

    $field.bind("keypress", function(event)
    {
    var key = event.which;
    // 0 = numpad
    // 8 = backspace
    // 32 = space
    if (key==8 || key==0 || key === 32)
    {
        return true;
    }

    var str = String.fromCharCode(key);
    if ( arabicCharUnicodeRange.test(str) )
    {
        return true;
    }

    return false;
    });
}

jQuery(document).ready(function() {
    restrictInputOtherThanArabic($('.title_ar'));
    restrictInputOtherThanArabic($('.content_ar'));
    restrictInputOtherThanArabic($('.tags_ar'));
    restrictInputOtherThanArabic($('.meta_title_ar'));
    restrictInputOtherThanArabic($('.meta_desc_ar'));
    restrictInputOtherThanArabic($('.meta_keywords_ar'));
    restrictInputOtherThanArabic($('.slug_ar'));
    restrictInputOtherThanArabic($('.buy_city_ar'));
    restrictInputOtherThanArabic($('.question_ar'));
    restrictInputOtherThanArabic($('.answer_ar'));
});
</script>
