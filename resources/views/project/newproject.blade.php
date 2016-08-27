    <script>
        $(document).ready(function() {

            $( "#btnsalvar" ).click(function() {
                $.ajax({
                  url: "/project/new",
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
                <h3 class="panel-title">Novo projeto</h3>
            </div>
              <div class="panel-body">
                   
                    <div class="form-group">
                        <label>Nome do projeto</label> 
                        <input type="text" class="form-control" name="name" placeholder="Digite o nome do projeto" value="">
                    </div>

                    <div class="form-group">
                        <label>Descricao do projeto</label> 
                        <textarea class="form-control" name="description" placeholder="Digite uma descrição aqui..." rows="5"></textarea>
                    </div>                 

                    <div class="display_feedback"></div>
    
                    <input type="button" class="btn btn-lg btn-success btn-block" id="btnsalvar" value="Criar projeto!">
              </div>
          </div>
        </div>
</div>