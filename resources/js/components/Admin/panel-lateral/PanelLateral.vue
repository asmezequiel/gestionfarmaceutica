<template>
	<div id="panel-lateral">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar" style="height: 100%;">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Inicio Panel</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Interface
      </div>

      <btn-opcion-vista v-for = "(boton , key) in botonesPanel"
                        :titulo = "boton.titulo"
                        :items  = "boton.items"
                        :key    = "key"
                        @cambiar-vista = "showView"/>


      <hr class="sidebar-divider">>
      <div class="sidebar-heading">
        Addons
      </div>

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <div class="text-center d-none d-md-inline"> 
        <button class="rounded-circle border-0" id="sidebarToggle" @click="ocultarPanel"></button> <!--hide panel admin button-->
      </div>

    </ul>
    <!-- End of Sidebar -->
</div>
</template>

<script>
	
  import btnViewButton from './components/BotonOpcionVista';

	export default{
		name: 'panel-lateral',
    components: {
        'btn-opcion-vista' : btnViewButton,
   },
data(){
      return {
        botonesPanel: [
          { 'titulo' : 'Medicamentos' , 'items' : [{  'nombre' : 'Crear'            , 'accion' :  'CrearMedicamento' },
                                                  {   'nombre' : 'Mostrar lista'    , 'accion' : 'ListaMedicamentos'}],
          },
          { 'titulo' : 'Movimientos'  , 'items' : [{  'nombre' : 'Entrega a cliente', 'accion' : 'EntregaCliente'  },
                                                  {   'nombre' : 'Nueva alta'       , 'accion' : 'NuevaAlta'},
                                                  {   'nombre' : 'Mostrar lista'    , 'accion' : 'ListaMovimientos'}]
          }, 
          { 'titulo' : 'Usuarios'     , 'items' : [{  'nombre' : 'Nuevo usuario'    , 'accion' : 'nuevo_usuario'  },
                                                  {   'nombre' : 'Mostrar lista'    , 'accion' : 'mostrar_usuarios'}]
          }, 
          { 'titulo' : 'Medicos'      , 'items' : [{  'nombre' : 'Nuevo medico'     , 'accion' : 'nuevo_medico'  },
                                                  {   'nombre' : 'Mostrar lista'    , 'accion' : 'mostrar_medicos'}]
          }, 
          { 'titulo' : 'Clientes'     , 'items' : [{  'nombre' : 'Nuevo cliente'    , 'accion' : 'nuevo_cliente'  },
                                                  {   'nombre' : 'Mostrar lista'    , 'accion' : 'mostrar_clientes'}]
          }                
        ],
      }
    },
    methods: {
      showView: function( vista ){
        this.$emit('cambiar-vista' , vista);
      },
      ocultarPanel: function(){
          $("body").toggleClass("sidebar-toggled");
          $(".sidebar").toggleClass("toggled");
          if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
          };
      }
    },
	}

</script>