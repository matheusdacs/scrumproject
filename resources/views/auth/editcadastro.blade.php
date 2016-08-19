    <script>
        $(document).ready(function() {

            $( "#btnsalvar" ).click(function() {
                $.ajax({
                  url: "/editarcadastro",
                  type: 'post',
                  data: $(':input').serialize(),
                  dataType: 'json'

                })
                  .done(function( json ) {
                    if(json['error']){

                        var vHtml = '<div class="alert alert-danger">';

                        $(jQuery.parseJSON(JSON.stringify(json['error']))).each(function() {
                            vHtml += '<ul><p><li class="fa fa-exclamation-triangle" aria-hidden="true"> </li>'+this+'</p></ul>' ;
                        });

                        vHtml += '</div>';

                        $('.display_feedback').html(vHtml);

                    }else{

                        $('.display_feedback').html('<div class="alert alert-success"><strong>' + json['success'] + '</strong></div>')
                    }
                  });

            });


        });
    </script>

<div class="container-fluid" style="min-width:450px;">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Editar meu cadastro</h3>
            </div>
              <div class="panel-body">
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

                    <div class="display_feedback"></div>
    
                    <input type="button" class="btn btn-lg btn-success btn-block" id="btnsalvar" value="Salvar">
              </div>
          </div>
        </div>
</div>



