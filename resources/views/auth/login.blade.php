@extends('layouts.auth')

@section('content')
<section id="auth_wrapper" class="auth-login">
    <div class="card">
        <div class="card-content">
            {!! Form::open([ 'url' => route('login'), 'class' => 'form-horizontal' ]) !!}
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group label-floating is-empty">
                        <label class="control-label">E-mail</label>
                        <input type="text" name="email" class="form-control">
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong style="color:red;">{{ $errors->first('email') }}</strong>
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
                        <span class="help-block">
                            <strong style="color:red;">{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12">
                    <div class="form-group text-center m-t-20">
                        <button class="btn btn-primary btn-block" type="submit" style="width:100%;">Продолжить</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>
@endsection