<template>
	<div id="contenido" class="container-fluid w-100">
		<div id="content-wrapper" class="d-flex flex-column">


	      	<div id="content">
				<!-- Topbar -->
				<nav-bar/>
				<slot></slot>
			</div>
				

			<custom-footer/>
    	</div>
	</div>
</template>

<script>
	

    import NavBar 		from './nav-bar/NavBar';
    import Footer 		from './footer/CustomFooter';

	export default {
		name : 'contenido',
		components: { 	'nav-bar'		: NavBar, 
						'custom-footer' : Footer},
	}

</script>