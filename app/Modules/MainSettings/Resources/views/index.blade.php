@extends('backend.layouts.master')

@section('title',$title)

@section('stylesheet')
<link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/assets/css/togglebutton.css">
@endsection

@section('content')

    @include('backend.components.errors')

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link show active" data-toggle="tab" href="#Main">{{ transWord('Main Settings') }}</a></li>
                        <li class="nav-item"><a class="nav-link show" data-toggle="tab" href="#Home">{{ transWord('Home Page') }}</a></li>
                        <li class="nav-item"><a class="nav-link show" data-toggle="tab" href="#Logo">{{ transWord('Logo') }}</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Meta">{{ transWord('Meta Tags') }}</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Social">{{ transWord('Social Media') }}</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#User">{{ transWord('User') }}</a></li>
                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Payment">{{ transWord('Payment') }}</a></li>
                    </ul>
                    <form action="{{ route('save_mainsettings') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="tab-content">
                                <div class="tab-pane show vivify fadeIn active" id="Main">
                                    <div class="row">
                                        {!! BuildFields('title' , getDataFromJson($settings->title) , 'text' ,['required' => 'required']) !!}
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="email">{{ transWord('Email') }}</label>
                                            <input type="email" name="email" id="email" value="{{ checkHasValue($settings->email) }}" class="form-control" placeholder="{{ transWord('Email') }}">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="mobile">{{ transWord('Mobile') }}</label>
                                            <input type="text" name="mobile" id="mobile" value="{{ checkHasValue($settings->mobile) }}" class="form-control" placeholder="{{ transWord('Mobile') }}">
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        {!! BuildFields('address' , getDataFromJson($settings->address) , 'text') !!}
                                    </div>
                                    <hr>
                                    <div class="row">
                                        {!! BuildFields('content' , getDataFromJson($settings->content) , 'textarea' , ['required' => 'required']) !!}
                                    </div>
                                </div>
                                <div class="tab-pane vivify fadeIn" id="Home">
                                    @if ($settings->home_video != null)
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <video controls style="display: block;margin-left:auto;margin-right:auto;">
                                                <source src="{{ URL::asset('/').setPublic() }}uploads/backend/settings/{{ $settings->home_video }}" type="video/mp4" width="100">
                                            </video>
                                        </div>
                                    </div>
                                    <br>
                                    @endif
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="file" name="home_video" id="video" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        {!! BuildFields('home_title' , getDataFromJson($settings->home_title) , 'text' , ['required' => 'required']) !!}
                                        {!! BuildFields('home_content' , getDataFromJson($settings->home_content) , 'textarea' , ['required' => 'required','style'=>'height:200px;']) !!}
                                    </div>
                                </div>
                                <div class="tab-pane vivify fadeIn" id="Logo">
                                    <div class="row">
                                        @foreach (getDataFromJson($settings->logo) as $key => $value)
                                            <div class="col-lg-6">
                                                <img src="{{URL::asset('/')}}{{setPublic()}}uploads/backend/settings/{{ $value }}" style="width:70px;height70px;display:block;margin-left:auto;margin-right:auto;" class="img-thumbnail img-responsive" alt="">
                                                <p style="display:block;margin-left:auto;margin-right:auto;width:15%;margin-top:10px;" class="badge badge-primary">{{ $key.' '.transWord('Logo') }}</p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        {!! BuildFields('logo' , null , 'file' ) !!}
                                    </div>
                                </div>
                                <div class="tab-pane vivify fadeIn" id="Meta">
                                    <div class="row">
                                        {!! BuildFields('meta_title' , getDataFromJson($settings->meta_title) , 'text') !!}
                                    </div>

                                    <hr>
                                    <div class="row">
                                        {!! BuildFields('meta_desc' , getDataFromJson($settings->meta_desc) , 'text') !!}
                                    </div>

                                    <hr>
                                    <div class="row">
                                        {!! BuildFields('meta_keywords' , getDataFromJson($settings->meta_keywords) , 'text') !!}
                                    </div>
                                </div>
                                <div class="tab-pane vivify fadeIn" id="Social">
                                    <div class="row">
                                        {!! socialMediaInputs($settings->socialmedia) !!}
                                    </div>
                                </div>
                                <div class="tab-pane vivify fadeIn" id="User">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="switch">
                                                <input type="checkbox" name="follow_ctrl" @if($settings->follow_ctrl == 1) {{ 'checked' }} @endif id="follow_ctrl">
                                                <span class="slider round"></span>
                                            </label>
                                            <label for="follow_ctrl" style="line-height: 43px; margin: 0 10px 0 10px;">{{ transWord('Follow Control') }}</label>
                                        </div>

                                        <div class="col-lg-4">
                                            <label class="switch">
                                                <input type="checkbox" id="message_ctrl" name="message_ctrl" @if($settings->message_ctrl == 1) {{ 'checked' }} @endif id="message_ctrl">
                                                <span class="slider round"></span>
                                            </label>
                                            <label for="message_ctrl" style="line-height: 43px; margin: 0 10px 0 10px;">{{ transWord('Message Control') }}</label>
                                        </div>

                                        <div class="col-lg-4">
                                            <label class="switch">
                                                <input type="checkbox" id="service_ctrl" name="service_ctrl" @if($settings->service_ctrl == 1) {{ 'checked' }} @endif id="service_ctrl">
                                                <span class="slider round"></span>
                                            </label>
                                            <label for="service_ctrl" style="line-height: 43px; margin: 0 10px 0 10px;">{{ transWord('Service Control') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane vivify fadeIn" id="Payment">
                                    <div class="row">

                                        <div class="col-lg-12 mb-3">
                                            <input type="text" name="account_name" value="{{ $settings->account_name }}" class="form-control" placeholder="{{ transWord('Account Name') }}">
                                        </div>
                                        <div class="col-lg-12 mb-3">
                                            <input type="text" name="account_number" value="{{ $settings->account_number }}" class="form-control" placeholder="{{ transWord('Account Number') }}">
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="percentage" value="{{ $settings->percentage }}" class="form-control" placeholder="{{ transWord('Percentage') }}">
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary"><i class="icon-plus"></i>&nbsp;Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        var languages = [];

        <?php foreach(getLang() as $key => $val){ ?>
        languages.push('<?php echo $val; ?>');
        <?php } ?>

        var i = 0;
        for (i; i < languages.length; i++) {
            CKEDITOR.replace( 'content['+languages[i]+']', {
                height: 300,
                filebrowserUploadUrl: "{{route('upload_pages', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        }

    </script>
@endsection
