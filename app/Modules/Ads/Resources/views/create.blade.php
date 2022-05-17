@extends('backend.layouts.master')

@section('title',$title)

@section('stylesheet')
<link rel="stylesheet" href="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/select2/dist/css/select2.min.css">
<style>
    li.select2-selection__choice {
    color: black !important;
    font-weight: bold;
}
</style>
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
                <form action="{{ route('store_ads') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10" id="content" class="form-control" required></textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="tags">Tags</label>
                            <select class="form-control select2" multiple="" name="tags[]" id="tags" required>
                                <option value="">Select Tags</option>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="start_date">Start Date</label>
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="start_date">Type</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                  <input type="radio" name="type" value="Free" class="selectgroup-input" checked="">
                                  <span class="selectgroup-button">Free</span>
                                </label>
                                <label class="selectgroup-item">
                                  <input type="radio" name="type" value="Paid" class="selectgroup-input">
                                  <span class="selectgroup-button">Paid</span>
                                </label>
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
<script src="{{URL::asset('/')}}{{setPublic()}}dashboard/node_modules/select2/dist/js/select2.full.min.js"></script>
@endsection
