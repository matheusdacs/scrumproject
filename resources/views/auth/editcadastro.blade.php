

<div class="container-fluid" style="min-width:450px;">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Editar meu cadastro</h3>
            </div>
              <div class="panel-body">
                <form method="POST" action="/editarcadastro">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label>Nome</label> 
                        <input type="text" class="form-control" name="name" placeholder="Digite seu nome completo" value="{{$userdados['name']}}">
                    </div>

                    <div class="form-group">
                        <label>E-mail</label> 
                        <input type="email" class="form-control" placeholder="seuemail@exemplo.com.br" name="email" value="{{$userdados['email']}}">
                    </div>

                    <div class="form-group">
                        <label>Senha atual</label> 
                        <input type="password" class="form-control" placeholder="Digite sua senha atual" name="password">
                    </div>

                    <div class="form-group">
                        <label>Nova Senha</label> 
                        <input type="password" class="form-control" placeholder="Nova senha" name="passwordnew">
                    </div>

                     <div class="form-group">
                        <label>Nova Senha</label> 
                        <input type="password" class="form-control" placeholder="Confirme sua nova senha" name="passwordnew_confirmation">
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
                 
                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Salvar">

                </form>
              </div>
          </div>
        </div>
</div>

