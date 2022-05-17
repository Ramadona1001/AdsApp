@extends('backend.layouts.master')

@section('title','Roles')

@section('stylesheet')

{{-- @include('backend.components.datatablecss') --}}

@endsection

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create New Role</h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('store_roles') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-edit"></i></span>
                            </div>
                            <input type="text" class="form-control" required placeholder="Role Name" id="role_name" aria-label="Role Name" name="name" aria-describedby="basic-addon1">
                            <div class="input-group-prepend">
                                <button type="submit" id="saveBtn" class="btn btn-outline-primary"><i class="fa fa-save"></i>&nbsp;Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>All Roles</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($roles as $role)
                            <div class="col-lg-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                      <h4>Role</h4>
                                      <div class="card-header-action">
                                        <div class="btn-group">
                                          <a data-toggle="tooltip" data-original-title="Edit" href="{{ route('edit_roles',Crypt::encrypt($role->id)) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                          <a data-toggle="tooltip" data-original-title="Permissions" href="{{ route('permissions_roles',Crypt::encrypt($role->id)) }}" class="btn btn-primary"><i class="fa fa-user-shield"></i></a>
                                          @if($role->name != 'Admin')
                                          <a data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Are You Sure?')" href="{{ route('delete_roles',Crypt::encrypt($role->id)) }}" class="btn btn-primary"><i class="fa fa-trash"></i></a>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                    <div class="card-body">
                                      <h4>{{ $role->name }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('javascript')

{{-- @include('backend.components.datatablejs') --}}

<script>
    $(document).ready(function() {
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    } );


</script>

@endsection
