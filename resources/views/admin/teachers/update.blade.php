@extends('admin.layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Teacher</strong> Elements
            </div>
            <div class="card-body card-block">

                {!! Form::model($teacher, ['route' => ['admin.teachers.edit', $teacher->id],'enctype'=>'multipart/form-data','class' => 'form-horizonta']) !!}
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('first_name', 'First Name',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('first_name',$teacher->first_name, ['class' => 'form-control'])!!}
                        @if ($errors->has('first_name'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('first_name') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('last_name', 'Last Name',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('last_name',$teacher->last_name, ['class' => 'form-control'])!!}
                        @if ($errors->has('last_name'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('last_name') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions form-group"> {!!  Form::submit('Update', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
        </div>
@endsection