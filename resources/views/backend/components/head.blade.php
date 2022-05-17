<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | Ads Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/weathericons/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/summernote/dist/summernote-bs4.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/css/style.css">
    <link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/css/components.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
    <link rel="icon" href="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/logo.png">

    @if (\Lang::getLocale() == 'ar')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Kufam:wght@600&family=Noto+Kufi+Arabic:wght@500&display=swap');
            body,span,h1,h2,h3,h4,h5,h6,a{
                font-family: 'Noto Kufi Arabic', sans-serif !important;
            }
            .dropdown-menu.show{
                text-align: right;
            }
            table,.hero-inner{
                text-align: right !important;
            }
            label{
                float: right;
            }
            .content_en,.content_ar{
                float: inherit !important;
            }
            form .btn{
                float: right;
            }
        </style>
        <link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/css/rtl.css">
    @endif



    <style>
        label{
            font-weight: bold;
        }
        .dropdown-menu.show{
            width: 150px;
        }
        #example_filter input[type=search]{
            width:300px;
            border-radius: 50px;
            height: 32px;
            padding-right: 15px;
            background: url('{{URL::asset('/')}}{{setPublic()}}dashboard/assets/search.png') no-repeat scroll 7px 7px;
            padding-left:30px;
            margin-left: 10px;
            margin-right: 10px;
            background-size: 17px;

        }
        div#example_paginate {
            margin-top: 30px;
        }
        a#example_previous , a#example_next{
            margin-left: 15px !important;
            margin-right: 15px !important;
            color: #ffffff !important;
            border: 1px solid #a84d97;
            padding: 9px !important;
            border-radius: 25px;
            background: #a84d97 !important;
        }
        a.paginate_button.current , span > a.paginate_button {
            background: transparent !important;
            border: 0 !important;
            font-size: 21px;
            line-height: 38px;
        }
        div#example_info {
            margin-top: 30px;
            font-size: 16px;
            color: #a84d97;
            font-weight: bold;
        }
        button.dt-button.buttons-copy.buttons-html5,
        button.dt-button.buttons-csv.buttons-html5,
        button.dt-button.buttons-excel.buttons-html5,
        button.dt-button.buttons-pdf.buttons-html5,
        button.dt-button.buttons-print
         {
            background: #a84d97;
            border-color: #a84d97;
            color: white;
            border-radius: 15px;
        }
        td.sorting_1{
            background: white !important;
        }
        tr.odd td{
            background-color: #f9f9f9 !important;
        }

    </style>

    @yield('stylesheet')
</head>
