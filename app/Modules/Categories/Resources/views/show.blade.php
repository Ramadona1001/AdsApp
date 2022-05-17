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
                    <h4>{{ $categories->title }}</h4>
                </div>
                <div class="card-body">
                    {!! $categories->content !!}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

@endsection
