<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Cesudesk - Login</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('jquery/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    </head>
    <body>
        <script type="text/javascript" src="{{ asset('jquery/external/jquery/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('jquery/jquery-ui.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <div class="container">
            <div class="row" style="margin-top:20px">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center">Cesudesk - Service Desk</h3>
                            </div>
                            <div class="panel-body">
                                <h2 class="text-center text-info"></h2>
                                <img src="{{ asset('img/cesudesk_blue.jpg') }}" alt="logotipo" class="container-fluid img-responsive"/>
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <label for="login">Login</label>
                                    <input type="text" name="login" id="login" class="form-control input-lg" placeholder="Usuário">
                                </div>
                                <div class="form-group">
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Senha">
                                </div>
                                @if(Session::has('status'))
                                <div id="alert" class="altert {!! Session::get('alert-class') !!}">
                                    <a class="close" data-target="#alert" data-dismiss="alert">*</a>
                                    {!!Session::get('status')!!}
                                </div>
                                @endif
                                <span class="button-checkbox">
                                    <button type="button" class="btn" data-color="info">Memorizar</button>
                                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                                    <a href="" class="btn btn-link pull-right">Esqueceu sua senha?</a>
                                </span>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Entrar">
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <a href="" class="btn btn-lg btn-primary btn-block">Solicitar Cadastro</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script>
            $(document).ready(function(){
            setTimeout("$('#alert').fadeOut()", 4000);
            });
            </script>
        </body>
    </html>
