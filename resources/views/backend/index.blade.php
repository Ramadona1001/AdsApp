@extends('backend.layouts.master')

@section('title','Home')

@section('stylesheet')
@endsection

@section('content')
<div class="row clearfix">
    {!! statisticsWidget($components) !!}
</div>
@endsection

@section('javascript')

@endsection
