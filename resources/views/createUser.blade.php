<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Form Validation Example - NiceSnippets.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white">Cadastro de Usuário</h3>
                    </div>
                    <div class="card-body">
                        
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
                   
                        <form method="POST" action="{{ url('user/store') }}">
                  
                            {{ csrf_field() }}
                  
                            <div class="form-group">
                                <label>Nome:</label>
                                <input type="text" name="nome" class="form-control" placeholder="Nome">
                                @if ($errors->has('nome'))
                                    <span class="text-danger">{{ $errors->first('nome') }}</span>
                                @endif
                            </div>
                   
                            <div class="form-group">
                                <label>Senha:</label>
                                <input type="password" name="senha" class="form-control" placeholder="Senha">
                                @if ($errors->has('senha'))
                                    <span class="text-danger">{{ $errors->first('senha') }}</span>
                                @endif
                            </div>
                    
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Ano:</label>
                                <input type="year" name="ano" class="form-control" placeholder="Ano">
                                @if ($errors->has('ano'))
                                    <span class="text-danger">{{ $errors->first('ano') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Data:</label>
                                <input type="date" name="data" class="form-control" placeholder="Data">
                                @if ($errors->has('data'))
                                    <span class="text-danger">{{ $errors->first('data') }}</span>
                                @endif
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>