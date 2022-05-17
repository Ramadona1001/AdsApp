@extends('backend.layouts.master')

@section('title',$title)

@section('stylesheet')

@endsection

@section('content')

@include('backend.components.errors')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>{{ $title }}</h2>
            </div>
            <div class="card-body">
                <hr>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Name</label>
                            <div class="input-group mb-3">
                                <input type="text" id="name" readonly value="{{ $user->name }}" required class="form-control" placeholder="Name" aria-label="Name" name="name" aria-describedby="basic-addon1">
                            </div>

                            <label for="email">Email Address</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" readonly value="{{ $user->email }}" required id="email" class="form-control email" placeholder="Ex: example@example.com">
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="multiselect2">Roles</label><br>
                                    @foreach (getUserRole($user->id) as $item)
                                    <span class="badge badge-primary" style="font-weight: bold;font-size:13px;padding:10px;">{{ $item }}</span>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

@endsection
