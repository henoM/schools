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
    @if(session('update'))
        <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
            <span class="badge badge-pill badge-primary">Success</span>
            You successfully{{session('update')}}
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
    @if($errors->first())
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
           {{$errors->first()}}
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
                            <strong class="card-title">All Teachers</strong>
                        </div>
                        <div class="form-inline">
                            <div class="col-md-4">
                                <a href="{{route('admin.teachers.create')}}" class="btn btn-primary">Add Teacher</a>

                            </div>
                            <div class="col-md-4">
                                {!! Form::select('skills_id', [0 =>'none' ,$skills] ,null,['class' => 'form-control-sm form-control','id' => 'skills'])!!}

                            </div>
                            <div class="col-md-4">
                                <a href="{{route('admin.teachers.download')}}" class="btn btn-primary">Download</a>
                            </div>

                        </div>

                        <div class="card-body">
                            <table id="teachers" class="table table-striped table-bordered">
                                <thead>

                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->first_name }}</td>
                                        <td>{{ $teacher->last_name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>
                                            @if($teacher->is_active == 1)
                                                <span class="badge badge-pill badge-warning">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.teachers.view', $teacher->id)}}" class="btn btn-primary btn-xs">View</a>
                                            <a href="{{route('admin.teachers.update', $teacher->id)}}" class="btn btn-success btn-xs">Update</a>
                                            <a href="{{route('admin.teachers.delete',$teacher->id)}}" class="btn btn-danger btn-xs" >Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $teachers->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $("#skills").on('change',function(){
            var skillsId = $(this).val();

            $.ajax({
                type:'post',
                url:'/admin/teacher/filter',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    skillsId: skillsId
                },
                success:function(data){
                    $('#teachers').empty();
                    $('#teachers').html(data.html);
                }
            });
        });
    </script>
@endpush