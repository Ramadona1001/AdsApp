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
                <form action="{{ route('update_ads',Crypt::encrypt($ads->id)) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title">Title</label>
                            <input type="text" value="{{ $ads->title }}" name="title" id="title" class="form-control" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="content">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10" id="content" class="form-control" required>{{ $ads->content }}</textarea>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control" required>
                                @foreach ($categories as $category)
                                    @if ($category->id == $ads->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endif
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
                                    @if (in_array($tag->id,$ad_tags))
                                    <option value="{{ $tag->id }}" selected>{{ $tag->title }}</option>
                                    @else
                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="start_date">Start Date</label>
                            <input type="datetime-local" value="{{ date('Y-m-d\TH:i:s',strtotime($ads->start_date)) }}" name="start_date" id="start_date" class="form-control" required>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="start_date">Type</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                  <input type="radio" name="type" value="Free" class="selectgroup-input" @if($ads->type == 'Free') checked="" @endif>
                                  <span class="selectgroup-button">Free</span>
                                </label>
                                <label class="selectgroup-item">
                                  <input type="radio" name="type" value="Paid" class="selectgroup-input" @if($ads->type == 'Paid') checked="" @endif>
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
