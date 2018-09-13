@extends('teacher.layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong> Student
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'teacher.students.store','enctype'=>'multipart/form-data','class' => 'form-horizonta']) !!}
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('name', 'Excel',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::file('import_file', null, ['class' => 'form-control'])!!}<br>
                        @if ($errors->has('file'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('file') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions form-group"> {!!  Form::submit('Add', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
        </div>

@endsection