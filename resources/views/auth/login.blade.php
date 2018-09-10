@extends('layouts.app')

@section('content')
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    {!! Form::open(array('route' => 'login')) !!}
                    <div class="form-group">
                        <label>Email</label>
                        {!!  Form::text('email', null, ['class' => 'form-control'])!!}
                        @if ($errors->has('email'))
                            <span class="text-danger">
		                    	<strong>{{ $errors->first('email') }}</strong>
		                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        {!!  Form::password('password',['class' => 'form-control'])!!}
                        @if ($errors->has('password'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    {!!  Form::submit('login',['class' => 'btn btn-success btn-flat m-b-30 m-t-30'])!!}
                    {!! Form::close() !!}
                </div>
                <div class="register-link m-t-15 text-center">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection

