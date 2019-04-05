<template>
	<div id="crear-medicamento">
		
		<b-card bg-variant="light">

			<b-tabs content-class="mt-3">
				<b-tab title="Creacion de nuevo medicamento" active>
						<div role="group" v-for = "campo in campos">

							<div class="row">
								<div class="col-3 text-right mb-3">
									<label :for = "'input-' + campo.nombre"> {{ campo.nombre }} </label>
								</div>	
								<div class="col-9">
									<b-form-input
								      	:id 	= " 'input-' + campo.nombre " 
								      	v-model	= "campo.model"
						      			:state 	= "campo.state" 
						      			:type 	= "campo.type" 

									    :aria-describedby	= " 'input-live-help ' + 'input-' + campo.nombre + '-feedback'"
									    :placeholder		= " campo.descripcion " />

								    <!-- This will only be shown if the preceding input has an invalid state -->
								    <b-form-invalid-feedback id=" 'input-' + campo.nombre + '-feedback' ">
							      		Enter at least 3 letters
								    </b-form-invalid-feedback>

								</div>
							</div>
					  	</div>
					  	<div class="row">
							<b-button variant="outline-primary">Button</b-button>
						</div>
				</b-tab>


				<b-tab title="Colocar Stock" disabled>
				</b-tab>
			</b-tabs>

		</b-card>
	</div>
</template>

<script>
	
	export default{
		name: 'crear-medicamento',
		data() {
      		return {
        		campos: [
        			{ model : '', nombre: 'Codigo'			, type: 'number', descripcion: 'Ingrese el codigo.', state: null	} ,
        			{ model : '', nombre: 'Nombre'			, type: 'text'  , descripcion: 'Ingrese el nombre.', state: null	} ,
        			{ model : '', nombre: 'Clasificacion'	, type: 'text'  , descripcion: 'Ingrese la clasificacion.', state: null	} ,
        			{ model : '', nombre: 'Descripcion'  	, type: 'text' 	, descripcion: 'Ingrese su descripcion.' , state: null	} ,
        			{ model : '', nombre: 'Cantidad por blister', type: 'number', descripcion: 'Ingrese la cantidad por blister.', state: null } ,
        		],
      		}
    	},
    	mounted(){

    	},
    	methods: {
    	},
    	computed: {
    	}
	}

</script>