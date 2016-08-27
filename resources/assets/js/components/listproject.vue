<script>
    export default{
    	props: ['projects'],

    	data (){
    		return{
    			list: [],
    			sortProperty:'name',
    			sortDirection:1,
    			editing:-1
    		}

    	},

    	methods:{
    		sort (ev, property){
    			ev.preventDefault()

    			this.sortProperty = property

    			if(this.sortDirection == 1){
    				this.sortDirection = -1
    			}else{
    				this.sortDirection = 1
    			}

    		},

    		clickdeleteproj: function(ev, idproject){

	            var vconfirm = confirm('Deseja realmente excluir o registro?')
	            	
	            if (vconfirm == true){

		            $.ajax({
		            	url: '/project/delete/'+idproject,
		            	type: 'get',
		            	dataType: 'json',
													            	
					})
		            .done(function(json) {
		            	if(json['success']){
		            		console.log($('tr #trlist'+idproject))
		            		$('#trlist'+idproject).remove();

		            	}else{
		            		alert(json['error'])
		            	}
		            })

	        	}


    		},

    		clickelements: function(ev, idproject){
    			ev.preventDefault()

    			if(this.editing == 1){ 
  
    				$.ajax({
    					url: '/project/edit',
    					type: 'post',
    					dataType: 'json',
    					data: {name: $('.inputthname'+idproject).prop('value'), description: $('.inputthdescription'+idproject).prop('value'), id: idproject},
    				})
    				.done(function(json) {

    					if (json['success']){
		    				$('.thname'+idproject).html($('.inputthname'+idproject).prop('value'))
		    				$('.thdescription'+idproject).html($('.inputthdescription'+idproject).prop('value'))
		    				$('#buttonid'+ idproject).attr('value', 'Editar');
		    				$('.buttonedit > [id!="buttonid'+idproject+'"]').prop('disabled', false)
		    				$('.buttonexcluir > [id^="buttondeleteid"]').prop('disabled', false)	
		    				$('.display_feedback').html('<div class="alert alert-success"><strong>' + json['success'] + '</strong></div>')
	    				}else{
	    					//caso de erro, volta ao estado normal, capturando os valores antigos...
		    				$('.thname'+idproject).html($('.inputthname'+idproject).attr('value'))
		    				$('.thdescription'+idproject).html($('.inputthdescription'+idproject).text())
		    				$('#buttonid'+ idproject).attr('value', 'Editar');
		    				$('.buttonedit > [id!="buttonid'+idproject+'"]').prop('disabled', false)
		    				$('.buttonexcluir > [id^="buttondeleteid"]').prop('disabled', false)	
                        	
                        	var vHtml = '<div class="alert alert-danger">';

	                        $(jQuery.parseJSON(JSON.stringify(json['error']))).each(function() {
	                            vHtml += '<ul><p><li class="fa fa-exclamation-triangle" aria-hidden="true"> </li>'+this+'</p></ul>' ;
	                        });

	                        vHtml += '</div>';

	                        $('.display_feedback').html(vHtml);

	    				}
    				})
    				.fail(function() {
    					//caso de erro, volta ao estado normal, capturando os valores antigos...
	    				$('.thname'+idproject).html($('.inputthname'+idproject).attr('value'))
	    				$('.thdescription'+idproject).html($('.inputthdescription'+idproject).text())
	    				$('#buttonid'+ idproject).attr('value', 'Editar');
	    				$('.buttonedit > [id!="buttonid'+idproject+'"]').prop('disabled', false)
	    				$('.buttonexcluir > [id^="buttondeleteid"]').prop('disabled', false)	
    				})

    				this.editing = -1
    			}else{
    				//Cria elementos para edição
    				$('.thname'+idproject).html('<input type="text" name="name" class="form-control inputthname'+idproject+'" value="'+$('.thname'+idproject).text()+'">')
    				$('.thdescription'+idproject).html('<textarea name="description" class="form-control inputthdescription'  + idproject + '" placeholder="Digite uma descrição aqui..." rows="3">'+$('.thdescription'+idproject).text()+'</textarea>') 

    				$('.buttonedit > [id!="buttonid'+idproject+'"]').prop('disabled', true)
    				$('.buttonexcluir > [id^="buttondeleteid"]').prop('disabled', true)
    				$('#buttonid'+ idproject).attr('value', 'Salvar');
    				this.editing = 1
    			}  

    		}

    	},

    	ready(){
    		this.list = JSON.parse(this.projects)
    	}
 
    }
</script>
<template>
	<div class="container">
	<div class="display_feedback"></div>
		<table class="table table-bordered table-striped table-hover">
			
			<thead>
				<tr>
					<th width="20%"><a href="#" @click="sort($event, 'name')">Nome</a></th>
					<th><a href="#" @click="sort($event, 'description')">Descricao</a></th>
					<th width="20%">Editar</th>
					<th width="7%">Excluir</th>
				</tr>
			</thead>

			<tbody class="postelements">
					
				<tr v-for="p in list | orderBy sortProperty sortDirection" id="trlist{{ p.id }}">

					<th class="thname{{ p.id }}">{{ p.name }}</th>
					<th class="thdescription{{ p.id }}">{{ p.description }}</th>
					<th class="buttonedit"><input type="button" id="buttonid{{ p.id }}" class="btn btn-lg btn-success btn-block" value="Editar" v-on:click="clickelements($event, p.id)"></th>
					<th class="buttonexcluir"><input type="button" id="buttondeleteid{{ p.id }}" class="btn btn-lg btn-danger btn-block" value="Excluir" v-on:click="clickdeleteproj($event, p.id)"></th>
					
				</tr>

			</tbody>

		</table>

	</div>
</template>
<style scoped=""></style>