@extends('layouts.app')

@section('content')


    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Blog</b>System</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>


            <form action="{{ url('/login') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') or "" }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') or "" }}">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        @if (Session::get('verified'))
                            <span class="help-block">
                            <strong class="text-danger">{{ Session::get('verified') }}</strong>
                        </span>
                        @endif
                            @if (Session::get('status'))
                                <span class="help-block">
                            <strong class="text-success">{{ Session::get('status') }}</strong>
                        </span>
                            @endif
                    </div>
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
            <a href="{{ url('/register') }}" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection


@section('additional_scripts')

    <script src="/js/icheck.min.js"></script>

    <script>
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    </script>


@endsection
