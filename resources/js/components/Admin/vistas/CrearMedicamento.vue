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

					<div bg-variant="light" class="row" v-if="desactivarTabFrmMedicamento">
						<div class="col-3 border-right border-grey d-flex justify-content-end">
							<p> CODIGO: {{ medicamento_creado.codigo }} </p>								
							<p> NOMBRE: {{ medicamento_creado.perfil.nombre }} </p>
							<p> CLASIFICACION: {{ medicamento_creado.perfil.clasificacion }} </p>
							<p> DESCRIPCION: {{ medicamento_creado.descripcion }} </p>
							<p> CANTIDAD POR BLISTER: {{ medicamento_creado.cant_blister }} </p>
						</div>

						<div class="col-9">
							<b-form-group
										label-cols-sm	= "3"
										label 			= "Cantidad de Stock"
										label-align-sm	= "right"
										label-for 		= "need-stock">
							<b-form-input id="nested-stock" type="number" v-model = "campos_stock.stock"/>
							</b-form-group>

							<b-form-group
										label-cols-sm 	= "3"
										label 			= "Lote"
										label-align-sm 	= "right"
										label-for 		= "nested-lote"							>
							<b-form-input id="nested-lote"  v-model = "campos_stock.lote"/>
							</b-form-group>

							<b-form-group
										label-cols-sm 	= "3"
										label 			= "Fecha de vencimiento"
										label-align-sm 	= "right"
										label-for 		= "nested-fecha">
							<b-form-input id="nested-fecha" type="date" v-model = "campos_stock.fecha_vencimiento"/>
							</b-form-group>

							<b-form-group
										label-cols-sm 	= "3"
										label 			= "Empresa"
										label-align-sm 	= "right"
										label-for 		= "nested-empresa">
								<b-form-radio-group
													id 			= "nested-empresa"
													:options 	= "opciones_empresa"
													v-model 	= "empresa_seleccionada"
													buttons
													button-variant 	= "outline-primary"
													size 			= "lg"
													name 			= "radio-btn-outline"/>
							</b-form-group>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6 text-right">
				  			<b-button>Cancelar</b-button>
				  		</div>
				  		<div class="col-6">
				  			<b-button 	:variant 	= "habilitarColocarStock"
				  						@click 		= "crearStock">
				  				Aceptar
				  			</b-button>
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
      			desactivarTabFrmMedicamento : false,
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
        		opciones_empresa: [ //a la que le pertenece el stok
		          	{ text: 'REMEDIAR'	, value: 1 },
	          		{ text: 'CAMINAL'		, value: 2 },
		        ],
		        empresa_seleccionada: '',
        		campos_stock: { stock: '' , lote: '' , fecha_vencimiento: '' , empresa: '' },
        		medicamento_creado: false,
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
    				console.log(r)
    				if (r.success) {
    					tipo_mensaje 	= 'exito';	
    					this.medicamento_creado 	= r.medicamento;
    					this.mostrarFrmNuevoMedicamento = false;
    				} else {
    					tipo_mensaje = 'error';
    				}

    				this.$emit('mensaje-alerta' , r.mensaje , tipo_mensaje );
    			});
    		},
    		crearStock: function(){
    			if (this.habilitarColocarStock == 'danger') { return; }
    			var stock = new Object();
    			stock['medicamento'] 	= this.medicamento_creado;
    			stock['stock']			= this.campos_stock.stock;
    			stock['lote']			= this.campos_stock.lote;
    			stock['f_vencimiento']	= '2020-12-05';
    			stock['empresa'] 		= this.empresa_seleccionada;

    			axios.post('/administracion/stock/' , stock ).then(response=>{

    				var r = response.data;
    				console.log(r)
    				var tipo_mensaje = '';
    				if (r.success) {
    					tipo_mensaje 	= 'exito';	
    					this.desactivarTabFrmMedicamento 	= false;
    					this.mostrarFrmNuevoMedicamento 	= true;
    				} else {
    					tipo_mensaje = 'error';
    				}

    				this.$emit('mensaje-alerta' , r.mensaje , tipo_mensaje );
    			}).catch(error=>{
    				console.log('error')
    				console.log(error.response.data)
    			});
    		},
    		crearOtroMedicamento: function(){
    			$(this.campos).each(function(index,campo){
    				campo.model = '';
    			});
    			this.medicamento_creado 	= false;
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
    		},
    		habilitarColocarStock(){
    			var c 			= this.campos_stock;
				var habilitar = c.stock.length <1 || c.lote.length <1 || c.fecha_vencimiento.length <1 ? false : true;

    			return (habilitar) ? 'outline-primary' : 'danger';
    		}
    	}
	}

</script>