@extends('layouts.primary')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        @include('partials.alert')
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Please Sign In</h3>
            </div>
            <div class="panel-body">
                {{ Form::open(array('route' => 'home','method' => 'post', 'id'=>'loginform', 'role' => 'form')) }}
                    <fieldset>
                        <div class="form-group {{ ($errors->has('email')) ? 'has-error':''}}">
                            <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                        </div>
                        <div class="form-group ">
                            <input class="form-control" placeholder="Password" name="password" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Remember Me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                    </fieldset>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop
