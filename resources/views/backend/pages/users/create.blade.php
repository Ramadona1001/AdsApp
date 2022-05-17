@extends('backend.layouts.master')

@section('title','Create New User')

@section('stylesheet')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

<style>
    .dropify-wrapper{
        height: 90%;
    }
</style>
@endsection

@section('content')

@include('backend.components.errors')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('store_users') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="email">Email Address</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" required id="email" class="form-control email" placeholder="Ex: example@example.com">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="password">Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" required name="password" id="password" class="form-control email" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="confirmpass">Confirm Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" required name="password_confirmation" id="confirmpass" class="form-control email" placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label for="roles">Select Role</label>
                                    <select name="roles" id="roles" class="form-control" required>
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
</script>
@endsection
