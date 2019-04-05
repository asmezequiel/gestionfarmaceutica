<template>
		<li class="nav-item" id="panel_item_button">
	        <a 	class 			= "nav-link collapsed" 
        		href 			= "#" 
    			data-toggle		= "collapse" 
				:data-target 	= "'#collapse' + titulo" 
				aria-expanded 	= "true" 
				:aria-controls 	= "'#collapse' + titulo">
	          	
	          	<i class="fas fa-fw fa-cog"></i>
	         	<span> {{ titulo }} </span>
	        </a>
	        <div 	:id	 			= "'collapse' + titulo" 
	        		class 			= "collapse" 
	        		aria-labelledby	= "headingTwo" 
	        		data-parent		= "#accordionSidebar">
          		
          		<div class="bg-white py-2 collapse-inner rounded">
		            <h6 class="collapse-header">Opciones:</h6>
		            
		            <a 	class 	= "collapse-item btn d-flex justify-content-start" 
		            	v-for 	= "item in items"
	            		@click 	= "cambiarVista(item.accion)">
		            	{{ item.nombre }}
		            </a>
          		</div>
	        </div>
  		</li>
</template>

<script>
	
	export default{
		name : 'panel_item_button',
		props: [ 'titulo' , 'items' ],
		data(){
			return{}
		},
		mounted(){
		},
		methods: {
			cambiarVista: function( accion ){
				this.$emit('cambiar-vista' , accion)
			}
		},
	}

</script>