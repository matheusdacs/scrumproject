<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="/css/styles.css">
        <script src="https://use.fontawesome.com/56303a30c7.js"></script>
    </head>
  <body>
    <div class="container" style="margin-top:50px;">
        <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Projeto Scrum</h3>
            </div>
              <div class="panel-body">
                <form  method="POST" action="/entrar">
                    {!! csrf_field() !!}
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="seuemail@exemplo.com.br">
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
                    </div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <p><li class="fa fa-exclamation-triangle" aria-hidden="true"> {{ $error }}</li></p>
                                @endforeach
                            </ul>
                        </div>
                    @endif 

                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
                    <div style="text-align:center; margin-top:5px;">
                      Novo por aqui? <a href="/registrar">Registre-se</a>
                    </div> 
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
