@extends('admin.layouts.app')
@section('content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <strong>Add</strong>Skill
            </div>
            <div class="card-body card-block">
                {!! Form::open(['route' => 'admin.skills.store','class' => 'form-horizonta']) !!}
                    <div class="row form-group">
                        <div class="col col-md-3">{!!  Form::label('skills', 'Skills Name',['class' => 'form-control-label'])!!}</div>
                        <div class="col-12 col-md-9">
                            {!!  Form::text('skills', null, ['class' => 'form-control'])!!}
                            @if ($errors->has('skills'))
                                <span class="text-danger">
		                        	<strong>{{ $errors->first('skills') }}</strong>
		                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-actions form-group"> {!!  Form::submit('Add', ['class' => 'btn btn-primary'])!!}</div>
                {!! Form::close() !!}
            </div>
@endsection