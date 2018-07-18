@extends('springadmins::layouts.master')

@section('springadmins_css')
    <link rel="stylesheet" href="{{ asset('vendor/springadmins/plugins/iCheck/square/blue.css') }}">
@yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url(config('springadmins.dashboard_url', 'home')) }}"><b>Spring</b> CMS {!! config('springadmins.logo', 'Admin LTE') !!}</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">{{ trans('springadmins::springadmins.login_message') }}</p>
            <form action="{{ url(route('springadmins.login')) }}" method="post">
                {!! csrf_field() !!}

                <div class="form-group has-feedback {{ $errors->has('loginname') ? 'has-error' : '' }}">
                    <input type="text" name="loginname" class="form-control" value="{{ old('loginname') }}"
                           placeholder="{{ trans('springadmins::springadmins.login_name') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('loginname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('loginname') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="{{ trans('springadmins::springadmins.password') }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> {{ trans('springadmins::springadmins.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit"
                                class="btn btn-primary btn-block btn-flat">{{ trans('springadmins::springadmins.sign_in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="auth-links">
                <a href="{{ url(config('springadmins.password_reset_url', 'password/reset')) }}"
                   class="text-center"
                >{{ trans('springadmins::springadmins.i_forgot_my_password') }}</a>
                <br>
                @if (config('springadmins.register_url', 'register'))
                    <a href="{{ url(config('springadmins.register_url', 'register')) }}"
                       class="text-center"
                    >{{ trans('springadmins::springadmins.register_a_new_membership') }}</a>
                @endif
            </div>
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('springadmins_js')
    <script src="{{ asset('vendor/springadmins/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
@stop
