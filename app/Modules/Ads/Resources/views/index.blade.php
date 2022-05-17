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
                        <table id="example" class="display table table-hover js-basic-example dataTable table-custom spacing5" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Advertiser</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody id="permissionTable">

                            @foreach ($ads as $index => $ad)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $ad->title }}</td>
                                <td>{{ $ad->content }}</td>
                                <td>{{ $ad->type }}</td>
                                <td>{{ $ad->category->title }}</td>
                                <td>
                                    @foreach ($ad->tags as $tag)
                                        <span class="badge badge-primary">{{ $tag->tag->title }}</span>
                                    @endforeach
                                </td>
                                <td>{{ $ad->user->name }}</td>
                                <td>
                                    <li class="dropdown language-menu" style="list-style: none">
                                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                            <i class="fa fa-bars"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item pt-2 pb-2" href="{{ route('show_ads',Crypt::encrypt($ad->id)) }}"><i class="fa fa-eye"></i>&nbsp;Show</a>
                                            <a class="dropdown-item pt-2 pb-2" href="{{ route('edit_ads',Crypt::encrypt($ad->id)) }}"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                                            <a class="dropdown-item pt-2 pb-2" id="deleteBtn" href="{{ route('destroy_ads',Crypt::encrypt($ad->id)) }}" onclick="return confirm('Are You Sure?')"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                                        </div>
                                    </li>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Tags</th>
                                <th>Advertiser</th>
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
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
    } );


</script>
@endsection
