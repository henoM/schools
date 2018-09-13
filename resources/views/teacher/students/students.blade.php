@extends('teacher.layouts.app')
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
                            <strong class="card-title">My Students</strong>
                        </div>
                        <div class="form-inline">

                            <a href="{{route('teacher.student.create')}}" class="btn btn-primary">Add Student</a>
                            <a href="{{route('teacher.students.create')}}" class="btn btn-primary">Add Students</a>
                        </div>

                        <div class="card-body">
                            <table id="teachers" class="table table-striped table-bordered">
                                <thead>

                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Passport</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>

                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->users->first_name }}</td>
                                        <td>{{ $student->users->last_name }}</td>
                                            <td>{{ $student->passport }}</td>
                                            <td>{{ $student->birth_day }}</td>
                                        <td>
                                            @if($student->users->is_active == 1)
                                                <span class="badge badge-pill badge-warning">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">Inactive</span>
                                            @endif

                                        </td>

                                        <td>
                                            {{--<a href="{{route('teacher.student.edit', $student->users->id)}}" class="btn btn-primary btn-xs">View</a>--}}
                                            <a href="{{route('teacher.student.update', $student->users->id)}}" class="btn btn-success btn-xs">Update</a>
                                            {{--<a href="{{route('admin.teachers.delete',$student->id)}}" class="btn btn-danger btn-xs" >Delete</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{ $students->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
{{--@push('scripts')--}}
    {{--<script>--}}
        {{--$("#skills").on('change',function(){--}}
            {{--var skillsId = $(this).val();--}}

            {{--$.ajax({--}}
                {{--type:'post',--}}
                {{--url:'/admin/teacher/filter',--}}
                {{--headers: {--}}
                    {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                {{--},--}}
                {{--data:{--}}
                    {{--skillsId: skillsId--}}
                {{--},--}}
                {{--success:function(data){--}}
                    {{--$('#teachers').empty();--}}
                    {{--$('#teachers').html(data.html);--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endpush--}}