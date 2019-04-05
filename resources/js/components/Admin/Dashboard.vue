<template>
    <div id="dashboard">

    	<div id="wrapper">

    		<panel-lateral @cambiar-vista = "cambiarVista"/>

    		<contenido>
    			<component :is="currentView"/>
    		</contenido>



    	</div>
    </div>
</template>

<script>


    import PanelLateral from './panel-lateral/PanelLateral';
    import Contenido 	from './contenido/Contenido';

    import ListaMedicamentos 	from './components/ListaMedicamentos';
    import CrearMedicamento 	from './components/CrearMedicamento';

	export default{
		name: 'dashboard',
		components: { 	'panel-lateral' : PanelLateral,
						'contenido'		: Contenido,
						'ListaMedicamentos' : ListaMedicamentos,
						'CrearMedicamento'	: CrearMedicamento,
		},
		data(){
			return {
				currentView : false,
			}
		},
		methods: {
			cambiarVista: function( vista ){
				this.currentView = vista;
				//this.currentView = vista;
			},
		}
	}
</script>