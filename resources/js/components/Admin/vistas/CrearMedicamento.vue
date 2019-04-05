<template>
	<div id="crear-medicamento">
		
		<b-card bg-variant="light">

			<b-tabs content-class="mt-3">
				<b-tab 	title 		= "Creacion de nuevo medicamento" 
						:disabled 	= "desactivarTabFrmMedicamento">
					
					<div v-if = "!mostrarFrmNuevoMedicamento">
				  		<b-button 	variant	= "outline-primary" 
				  					class	= "mb-5 mt-3"
				  					@click 	= "crearOtroMedicamento">
			  				Crear otro medicamento
			  			</b-button> 
			  			<br>
				  		<b-button 	variant	= "outline-primary"
				  					@click 	= "colocarStock">
				  			Colocarle stock al creado recientemente
				  		</b-button>
					</div>

					<div v-if = "mostrarFrmNuevoMedicamento">
						<div role="group" 
									v-for = "campo in campos" 
									v-if = "mostrarFrmNuevoMedicamento">

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


						<div class="row mt-3">
					  		<div class="col-6 text-right">
					  			<b-button>Cancelar</b-button>
					  		</div>
					  		<div class="col-6">
					  			<b-button 	:variant 	= "habilitarBtnAceptar"
					  						@click 		= "crearMedicamento">
					  				Aceptar
					  			</b-button>
					  		</div>						
						</div>				  	
					</div>
				</b-tab>


				<b-tab 	title 		= "Colocar Stock" 
						:disabled 	= "!desactivarTabFrmMedicamento">

					<div bg-variant="light" class="row">
						<div class="col-3 border border-danger">
							asdasdsd
						</div>

						<div class="col-9 border border-warning container-fluid d-flex justify-content-center">
							<b-form-group
										label-cols-sm	= "3"
										label 			= "Street:"
										label-align-sm	= "right"
										label-for 		= "nested-street">
							<b-form-input id="nested-street"></b-form-input>
							</b-form-group>

							<b-form-group
							label-cols-sm="3"
							label="City:"
							label-align-sm="right"
							label-for="nested-city"
							>
							<b-form-input id="nested-city"></b-form-input>
							</b-form-group>

							<b-form-group
							label-cols-sm="3"
							label="State:"
							label-align-sm="right"
							label-for="nested-state"
							>
							<b-form-input id="nested-state"></b-form-input>
							</b-form-group>

							<b-form-group
							label-cols-sm="3"
							label="Country:"
							label-align-sm="right"
							label-for="nested-country"
							>
							<b-form-input id="nested-country"></b-form-input>
							</b-form-group>

							<b-form-group
							label-cols-sm="3"
							label="Ship via:"
							label-align-sm="right" class="mb-0"
							>
							<b-form-radio-group
							class="pt-2"
							:options="['Air', 'Courier', 'Mail']"
							></b-form-radio-group>
							</b-form-group>
							</b-form-group>
						</div>


					</div>
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
      			mostrarFrmNuevoMedicamento	: true,
      			desactivarTabFrmMedicamento : true,
        		campos: [
        			//codigo
        			{ 	key 	: 'codigo' , 
        				model  	: '', 
    					nombre 	: 'Codigo' , 
    					type 	: 'number', 
    					descripcion : 'Ingrese el codigo.', 
    					state 	: null	} ,
					//nombre
        			{ 	key 	: 'nombre',
        				model 	: '', 
        				nombre: 'Nombre', 
        				type: 'text'  , 
        				descripcion: 'Ingrese el nombre.',
        				state: null	} ,
    				//clasificacion
        			{	key 	: 'clasificacion',
        				model 	: '', 
        				nombre 	: 'Clasificacion', 
        				type 	: 'text'  , 
        				descripcion : 'Ingrese la clasificacion.', 
        				state 	: null } ,
    				//descripcion
        			{ 	key 	: 'descripcion', 	
        				model 	: '', 
        				nombre 	: 'Descripcion', 
        				type 	: 'text'  ,
        				descripcion : 'Ingrese su descripcion.' ,
        				state 	: null	} ,
    				//cant por blister
        			{   key 	: 'cant_blister',
        				model  	: '', 
        				nombre 	: 'Cantidad por blister', 
        				type 	: 'number', 
        				descripcion : 'Ingrese la cantidad por blister.', 
        				state: null } ,
        		],
        		response: false,
      		}
    	},
    	mounted(){

    	},
    	methods: {
    		crearMedicamento: function(){
    			if ( this.habilitarBtnAceptar == 'danger' ) { return; }

    			var nuevoMedicamento = new Object();
				$(this.campos).each( function( index , campo ){
					nuevoMedicamento[ campo.key ] = campo.model;
				})

    			axios.post( '/administracion/medicamentos/' , nuevoMedicamento ).then( response => {
    				var r = response.data;
    				var tipo_mensaje = '';
    				
    				if (r.success) {
    					tipo_mensaje 	= 'exito';	
    					this.response 	= r;
    					this.mostrarFrmNuevoMedicamento = false;
    				} else {
    					tipo_mensaje = 'error';
    				}

    				this.$emit('mensaje-alerta' , r.mensaje , tipo_mensaje );
    			});
    		},
    		crearOtroMedicamento: function(){
    			$(this.campos).each(function(index,campo){
    				campo.model = '';
    			});
    			this.response 	= false;
    			this.mostrarFrmNuevoMedicamento = true;
    		},
    		colocarStock: function(){
    			this.desactivarTabFrmMedicamento = true;
    		},
    	},
    	computed: {
    		habilitarBtnAceptar(){
    			var habilitar = true;
    			$(this.campos).each(function(index,campo){
    				if (campo.model.length < 1) {
    					habilitar = false;
    					return false;
    				}
    			});
    			return (habilitar) ? 'outline-primary' : 'danger';
    		}
    	}
	}

</script>