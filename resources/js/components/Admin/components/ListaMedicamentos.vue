<template>
	<div id="lista-medicamentos">
		<b-container fluid v-if = "listaPreparada">
		    <!-- User Interface controls -->
		    <b-row>
		    	<!-- OPCIONES DE LA TABLA -->
		    	<b-form-group label="Opciones esteticas de Tabla:">
		      		<b-form-checkbox v-model="striped" 	inline>	Rayas 		</b-form-checkbox>
			      	<b-form-checkbox v-model="bordered" inline>	Bordeado 	</b-form-checkbox>
			      	<b-form-checkbox v-model="small" 	inline>	Pequeño 	</b-form-checkbox>
			      	<b-form-checkbox v-model="dark" 	inline>	Oscuro 	 	</b-form-checkbox>
			      	<b-form-checkbox v-model="fixed" 	inline>	Fijo 		</b-form-checkbox>
	    		</b-form-group>
	    	</b-row>

		    <b-row>		
		    	<!-- FILTRO DE BUSQUEDA POR NOMBRE -->
		      	<b-col md="6" class="my-1">
			        <b-form-group label-cols-sm="3" label="Filtro:" class="mb-0">
		          		<b-input-group>
				            <b-form-input v-model="filter" placeholder="Buscar..."></b-form-input>
				            <b-input-group-append>
			              		<b-button :disabled="!filter" @click="filter = ''">
			              			Limpiar
			              		</b-button>
				            </b-input-group-append>
			          	</b-input-group>
			        </b-form-group>
		      	</b-col>

		      	<!-- MENU DE DATOS ORDENADOS "POR" -->
		      	<b-col md="6" class="my-1">
					<b-form-group label-cols-sm="3" label="Ordenado por:" class="mb-0">
				  		<b-input-group>
						    <b-form-select v-model="sortBy" :options="sortOptions">
					      		<option slot="first" :value="null">-- none --</option>
						    </b-form-select>
						    <b-form-select v-model="sortDesc" :disabled="!sortBy" slot="append">
					      		<option :value="false">Asc</option> <option :value="true">Desc</option>
						    </b-form-select>
					  	</b-input-group>
					</b-form-group>
				</b-col>

		      	<!-- DATOS POR PAGINA -->
		      	<b-col md="6" class="my-1">
			        <b-form-group label-cols-sm="3" label="Resultados por pagina:" class="mb-0">
			          	<b-form-select v-model="perPage" :options="pageOptions"></b-form-select>
			        	</b-form-group>
			      	</b-col>
				</b-row>


		    <!-- Main table element -->
				<b-table
			      	show-empty
			      	stacked 		= "md"


	      			:striped	= "striped"
		      		:bordered	= "bordered"
		      		:small		= "small"
		      		:dark		= "dark"
		      		:fixed		= "fixed"

			      	:items 		= "items"
			      	:fields 		= "fields"
			      	:current-page	= "currentPage"
			      	:per-page 		= "perPage"
			      	:filter 		= "filter"
			      	:sort-by.sync	= "sortBy"
			      	:sort-desc.sync	= "sortDesc"
			      	:sort-direction	= "sortDirection"
			      	@filtered		= "onFiltered">


				<!-- BOTON DE DETALLES DE ESTA FILA -->
				<template slot="actions" slot-scope="row">
					<b-button size="sm" @click="row.toggleDetails">
					  {{ row.detailsShowing ? 'Ocultar' : 'Mostrar' }} Detalles
					</b-button>
				</template>
				<!-- DESPLEGABLE CON DETALLES -->
				<template slot="row-details" slot-scope="row">
					<b-card>
						<ul class="text-dark">
							<li> Codigo: 			{{ row.item.codigo }} </li>
							<li> Nombre: 			{{ row.item.perfil.nombre }} </li>
							<li> Clasificacion: 	{{ row.item.perfil.clasificacion }} </li>
							<li> Descripcion: 		{{ row.item.descripcion }} </li>
							<li> Stock disponible: 	{{ row.item.stock.cant }} </li>
							<li> Lote: 				{{ row.item.stock.lote }} </li>
						</ul>
					</b-card>
				</template>
		    </b-table>

		    <b-row>
	      		<b-col md="6" class="my-1">
		        	<b-pagination
				          v-model		= "currentPage"
				          :total-rows	= "totalRows"
				          :per-page		= "perPage"
				          class 		= "my-0"/>
      			</b-col>
    		</b-row>
		</b-container>

	</div>
</template>

<script>
	
	export default{
		name: 'lista-medicamentos',
		components: {
		},
		data() {
      		return {
		        items: false,
		        fields: [
		        	{ key: 'codigo'			, label: 'Codigo' 	, sortable: true, sortDirection: 'desc' },
		        	{ key: 'perfil.nombre' 	, label: 'Nombre' 	, sortable: true, sortDirection: 'desc' },
		        	{ key: 'perfil.clasificacion' 		, label: 'Clasificacion' 		, sortable: true, sortDirection: 'desc' },
		        	{ key: 'descripcion' 	, label: 'Descripcion' 	, sortable: true, sortDirection: 'desc' },
          			{ key: 'actions', label: 'Actions' }
		        ],
		        currentPage 	: 1,
		        perPage 		: 5,
		        pageOptions 	: [5, 10, 15],
		        sortBy 			: 'stock.fecha_vencimiento',
		        sortDesc 		: false,
		        sortDirection 	: 'asc',
		        filter 			: null,
		        selected 	: [], // registros seleccionados por fila
		        medicamentos_seleccionados : [],
		        //Opciones de la tabla
		        striped		: true,
		        bordered 	: false,
		        small 		: false,
		        dark 		: true,
		        fixed 		: false,
	        }
      	},
		mounted(){
			axios.get('/administracion/medicamentos')
			.then( response=>{
				var r = response.data;
				this.items = r.lista_medicamentos;
			})
		},
    	computed: {
    		sortOptions() {
        		// Create an options list from our fields
        		return this.fields
          				.filter(f => f.sortable)
          				.map(f => {
            			return { text: f.label, value: f.key }
          			});
      		},
    		totalRows(){    			
    			return (this.items) ? this.items.length : 0;
    		},
    		listaPreparada(){
    			return (this.items) ? true : false;
    		},
	    },
	    methods: {
	      	onFiltered(filteredItems) {
		        // Trigger pagination to update the number of buttons/pages due to filtering
		        this.totalRows = filteredItems.length
		        this.currentPage = 1
	      	},
	    },

	}

</script>