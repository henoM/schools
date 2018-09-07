@extends('admin.layouts.app')
@section('content')
    @if(session('create'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
            You successfully add  {{session('create')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('delete'))
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
            You successfully {{session('delete')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('update'))
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
            You successfully{{session('update')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Teachers</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">My Family</strong>
                        </div>
                        <div class="form-inline">
                            <a href="{{route('admin.teachers.create')}}" class="btn btn-primary">Add Teacher</a>
                        </div>


                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>

                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Active</th>
                                    <th scope="col">Actions</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->name }}</td>

                                        {{--<td>--}}
                                            {{--<a href="{{route('family.people.view',$teacher->id)}}" class="btn btn-success btn-xs">View</a>--}}
                                            {{--<a href="{{route('family.people.update', $teacher->id)}}" class="btn btn-primary btn-xs">Update</a>--}}
                                            {{--<a href="{{route('family.people.delete', $teacher->id)}}" class="btn btn-danger btn-xs">Delete</a>--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection