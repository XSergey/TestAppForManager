@extends('layouts.auth')

@section('content')
<section id="auth_wrapper" class="auth-login">
    <div class="card">
        <div class="card-header" data-background-color="my-color" style="background-color: #5682a3;"><h4>Register</h4></div>
        <div class="card-content">
            {!! Form::open([ 'url' => route('register'), 'class' => 'form-horizontal' ]) !!}
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Firstname</label>
                        <input type="text" name="firstname" class="form-control">
                        @if ($errors->has('firstname'))
                        <span class="help-block" style="display:block;">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Lastname</label>
                        <input type="text" name="lastname" class="form-control">
                        @if ($errors->has('lastname'))
                        <span class="help-block" style="display:block;">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">E-mail</label>
                        <input type="text" name="email" class="form-control">
                        @if ($errors->has('email'))
                        <span class="help-block" style="display:block;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                        <span class="help-block" style="display:block;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block" style="display:block;">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>           
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-primary btn-block" type="submit" style="width:100%;">Register</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection