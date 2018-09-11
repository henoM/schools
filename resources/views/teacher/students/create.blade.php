@extends('teacher.layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong> Student
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'teacher.student.store','class' => 'form-horizonta']) !!}
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('first_name', 'First Name',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('first_name', null, ['class' => 'form-control'])!!}
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
                        {!!  Form::text('last_name', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('last_name'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('last_name') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                    <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('email', 'Email',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('email', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('email'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('email') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('birth_day', 'Birth Day',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::date('birth_day', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('birth_day'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('birth_day') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">{!!  Form::label('passport', 'Passport Series',['class' => 'form-control-label'])!!}</div>
                    <div class="col-12 col-md-9">
                        {!!  Form::text('passport', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('passport'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('passport') }}</strong>
		                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-actions form-group"> {!!  Form::submit('Add', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
        </div>

@endsection