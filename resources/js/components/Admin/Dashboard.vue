<template>
    <div id="dashboard">

    	<div id="wrapper">

    		<panel-lateral/>

    		<contenido>
    			asdasd
    		</contenido>

    	</div>
    </div>
</template>

<script>
    //init <!--component :is="currentView" :rutas="rutas" :usuario="usuario"/ -->
    //@login-success      = "volverInicioCuentaUsuarioLogueado"


    import PanelLateral from './panel-lateral/PanelLateral';
    import Contenido 	from './contenido/Contenido';

	export default{
		name: 'dashboard',
		components: { 	'panel-lateral' : PanelLateral,
						'contenido'		: Contenido,
		},
	}
</script>