<template>
  <div class="col-12 pr-3 text-center align-items-center mt-3" id="mensaje-alerta">

    	<!-- MENSAJE CON CUENTA REGRESIVA PARA BORRARSE -->
    	<div>
    		<b-alert :show="dismissCountDown"
		            dismissible
		            :variant 	 		= "objectClass"
		            @dismissed 			= "dismissCountDown=0"
		            @dismiss-count-down = "countDownChanged"
		            @click 				= "closeMessage">

	      		<p v-html="mensaje">  </p>
				<p> Este mensaje se borrara en {{dismissCountDown}} segundos...</p>
				<p> <button type="button" :class="btnDetenerMensajeClass" v-on:click="detenerMensaje">Detener</button> </p>

	      		<b-progress	:variant 	= "objectClass"
			                :max 		= "dismissSecs"
			                :value 		= "dismissCountDown"
			                height 		= "4px">
	      		</b-progress>
	    	</b-alert>
    	</div>
		


    	<!-- MENSAJE FIJO  -->
    	<div @click="closeMessage">
    		<b-alert 	:variant 	= "objectClass"
						dismissible
						:show 		= "show_Static_Message"
						@dismissed 	= "show_Static_Message=false , closeMessage()"
						class 		= "d-flex justify-content-center">
				<p v-html="mensaje">  </p>
			</b-alert>
    	</div>
	
    </div>
</template>

<script>

  	export default {
	  	name : 'mensaje-alerta',
	    props: ['mensaje' , 'tipo'],
		data () {
			return {
				dismissSecs: 5,
				dismissCountDown: 0,
				show_Static_Message : false,
			}
		},
		mounted(){
			this.mostrarMensajeCuentaRegresiva();
		},
		watch:{
			mensaje: function( despues , antes ){
				this.mostrarMensajeCuentaRegresiva();
			},
		},
		methods: {
			countDownChanged(dismissCountDown) {
				this.dismissCountDown = dismissCountDown;
				if ( this.dismissCountDown == 0 ) {
					this.closeMessage();
				}
			},
			mostrarMensajeCuentaRegresiva() {
				this.dismissCountDown 	= 0;
				this.dismissCountDown 	= this.dismissSecs;
			},
			detenerMensaje(){
				this.dismissCountDown 		= 0;
				this.show_Static_Message 	= true;
			},
			closeMessage(){
				this.$emit('cerrar-mensaje');
			},
		},
		computed: {
			objectClass(){
				if ( this.tipo == 'error') {
					return "danger";
				} else if( this.tipo == 'exito' ){
					return "success";
				}
			},
			btnDetenerMensajeClass(){
				return this.tipo == 'error' ? 'btn btn-outline-danger' : 'btn btn-outline-success';
			}
		},
	  }

</script>