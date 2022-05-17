@extends('backend.layouts.master')

@section('title','Edit User Data')

@section('stylesheet')

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
                <form action="{{ route('update_users',$user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="name">Name</label>
                            <div class="input-group mb-3">
                                <input type="text" id="name" value="{{ $user->name }}" required class="form-control" placeholder="Name" aria-label="Name" name="name" aria-describedby="basic-addon1">
                            </div>

                            <label for="email">Email Address</label>
                            <div class="input-group mb-3">
                                <input type="email" name="email" value="{{ $user->email }}" required id="email" class="form-control email" placeholder="Ex: example@example.com">
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="password">Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password"  name="password" id="password" class="form-control email" placeholder="Password">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="confirmpass">Confirm Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password"  name="password_confirmation" id="confirmpass" class="form-control email" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="multiselect2">Select Role</label>
                                    <div class="multiselect_div">
                                        <select id="multiselect2" required name="roles[]" class="multiselect multiselect-custom" multiple="multiple" style="width:100%">
                                            @foreach ($roles as $role)
                                                @if (in_array($role->name,getUserRole($user->id)))
                                                    <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                                @else
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
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


@endsection
