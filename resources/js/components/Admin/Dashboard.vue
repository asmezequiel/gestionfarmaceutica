<template>
    <div id="dashboard">

    	<div id="wrapper">

    		<panel-lateral @cambiar-vista = "cambiarVista"/>


    		<div id="contenido" class="d-flex w-100">
				<div id="content-wrapper" class="d-flex flex-column">


			      	<div id="content" style="height: 93vh;">
						<!-- Topbar -->
						<nav-bar/>
						<mensaje-alerta
									v-if 			= "mensajeInformacion.mostrar" 
									:mensaje 		= "mensajeInformacion.mensaje"
    								:tipo    		= "mensajeInformacion.tipo"
									@cerrar-mensaje = "cerrarMensaje"/>
    					<component 
    								:is="currentView" 
    								@mensaje-alerta = "mostrarMensaje"/>
					</div>
						

					<!--custom-footer/-->
		    	</div>
			</div>


    	</div>
    </div>
</template>

<script>


    import PanelLateral 	from './panel-lateral/PanelLateral';
    import UserNavBar 		from './components/nav-bar/NavBar';
    import CustomFooter 	from './components/footer/CustomFooter';
    import MensajeAlerta 	from './MensajeAlerta';


    import ListaMedicamentos 	from './vistas/ListaMedicamentos';
    import CrearMedicamento 	from './vistas/CrearMedicamento';

	export default{
		name: 'dashboard',
		components: { 	'mensaje-alerta': MensajeAlerta,
						'panel-lateral' : PanelLateral,
						'nav-bar'		: UserNavBar, 
						'custom-footer' : CustomFooter,
						'ListaMedicamentos' : ListaMedicamentos,
						'CrearMedicamento'	: CrearMedicamento,
		},
		data(){
			return {
				currentView  : false,
				mensajeInformacion: 
				{
        			mostrar : false,
    				mensaje : '',
    				tipo 	: '',
        		},
			}
		},
		methods: {
			cambiarVista: function( vista ){
				this.currentView = vista;
			},
			mostrarMensaje: function( mensaje , tipo ){
				this.mensajeInformacion.mensaje = mensaje;
				this.mensajeInformacion.tipo 	= tipo;
				this.mensajeInformacion.mostrar = true;
			},
			cerrarMensaje: function(){
				this.mensajeInformacion.mensaje = '';
				this.mensajeInformacion.tipo 	= '';
				this.mensajeInformacion.mostrar = false;
			},
		}
	}
</script>