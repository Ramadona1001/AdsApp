@extends('backend.layouts.master')

@section('title',$title)

@section('stylesheet')

@include('backend.components.datatablecss')

@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ $title }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                        <table id="example" class="display table js-basic-example dataTable table-custom spacing5" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Roles</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody id="permissionTable">
                            @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                @foreach (getUserRole($user->id) as $item)
                                <span class="badge badge-primary" style="font-weight: bold;">{{ $item }}</span>
                                @endforeach
                                </td>
                                <td>
                                    <li class="dropdown language-menu" style="list-style: none">
                                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item pt-2 pb-2" href="{{ route('show_users',$user->id) }}"><i class="fa fa-eye"></i> Show</a>
                                            <a class="dropdown-item pt-2 pb-2" href="{{ route('edit_users',$user->id) }}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="dropdown-item pt-2 pb-2" id="deleteBtn" href="{{ route('destroy_users',$user->id) }}" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i> Delete</a>
                                        </div>
                                    </li>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Roles</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

@include('backend.components.datatablejs')

<script>
$(document).ready(function() {
        var lang = '';
        if ('{{ \Lang::getLocale() }}' == 'ar') {
            lang = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Arabic.json";
        }else{
            lang = "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/English.json";
        }
        $('#example').DataTable( {
            language: {
                "url": lang,
                searchPlaceholder: "Search Keywords"
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    });

</script>
@endsection
