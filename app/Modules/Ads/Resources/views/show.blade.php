@extends('backend.layouts.master')

@section('title',$title)

@section('stylesheet')

@endsection

@section('content')

@include('backend.components.errors')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-body">
                <div class="card-header">
                    <h4>{{ $ads->title }}</h4>
                </div>
                <div class="card-body">
                    {!! $ads->content !!}
                    <hr>
                    Category : {{ $ads->category->title }}
                    <hr>
                    Tags :
                    @foreach ($ads->tags as $tag)
                        <span class="badge badge-primary">{{ $tag->tag->title }}</span>
                    @endforeach
                    <hr>
                    Advertiser : {{ $ads->user->name }}
                    <hr>
                    Start Date : {{ $ads->start_date }}
                    <hr>
                    Type : {{ $ads->type }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

@endsection
