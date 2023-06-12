
<br>
        <nav style="    font-size: 24px;
        font-family: 'Inter',sans-serif">
		<ul class="menu-horizontal">
			<li><a href="/lobby"><img src="{{asset('dash/assets/inicioNav.png')}}" width="45"> Inicio</a></li>
            @can('crear-rol')     <li>
                <a href="/registro_usuario"><img src="{{asset('dash/assets/roles.png')}}" width="45" height="45">
                <span class="label">Rol</span></a>
                    <ul class="menu-vertical">
                       <li><a href="/crear-rol">Crear rol</a></li>    
                    </ul>
                </li> @endcan
                
         @if(Gate::any(['editar-usuario','borrar-usuario']))  <li>
                     
            <a href="#"><img src="{{asset('dash/assets/user2 2.png')}}" width="45">
            <span class="label">Usuarios</span></a>
				<ul class="menu-vertical">
         
          @can	('editar-usuario')
                    <li><a href="/editar-usuario">Editar</a></li>@endcan
          @can	('borrar-usuario')
                    <li><a href="/borrar-usuario">Eliminar</a></li>@endcan
                  <!-- <li><a href="/perfil-usuario">Ver perfil</a></li>--> 
				</ul>
			</li>@endif
          
            @if(Gate::any(['ver-usuario','ver-parqueo','ver-vehiculos','ver-deuda','ver-pagos','editar-deuda','ver-caja']))  <li>
            <a href="/ver-reportes"><img src="{{asset('dash/assets/report.png')}}" width="45">
            <span class="label">Reportes</span></a>
				<ul class="menu-vertical">
                    @can	('ver-deuda')
                    <li><a href="/ver-deuda">Ver Deudas </a></li>@endcan
                    @can	('ver-pagos')
                    <li><a href="/ver-pagos">Ver Pagos</a></li>@endcan
                    @can	('ver-usuario')
                    <li><a href="/ver-usuario">Ver Usuarios</a></li>@endcan
                    @can	('ver-parqueo')
                    <li><a href="/ver-parqueo">Ver Parqueos</a></li>@endcan
                    @can	('ver-vehiculos')
                    <li><a href="/ver-vehiculo">Ver Vehiculos</a></li>@endcan
                    @can	('ver-caja')
                    <li><a href="/ver-ingresos">Reporte de Ingresos</a></li>@endcan
                    @can	('ver-salidas')
                    <li><a href="/ver-entradas-salidas">Reporte de Entradas y Salidas</a></li>@endcan
                    @can	('editar-deuda')
                    <li><a href="/editar-deuda">Cobrar</a></li>@endcan
                </ul>
			</li>@endif
           
            @if(Gate::any(['crear-usuario','crear-parqueo','crear-alquiler','crear-vehiculo']))  <li>
            <a href="/ver-registros"><img src="{{asset('dash/assets/registroNav.png')}}" width="45">
            <span class="label">Registro</span></a>
				<ul class="menu-vertical">
                    @can	('crear-usuario')
                    <li><a href="/crear-usuario">Registrar Usuario</a></li>@endcan
                    @can	('crear-parqueo')
                    <li><a href="/crear-parqueo">Registrar Parqueo</a></li>@endcan
                    @can	('crear-alquiler')
                    <li><a href="/crear-alquiler">Registrar Alquiler</a></li>@endcan
                    @can	('crear-vehiculos')
                    <li><a href="/crear-vehiculo">Registrar Vehiculo</a></li>@endcan
                   
				</ul>
			</li>@endif
           
           @can('ver-vehiculos') <li>
            <a href="#"><img src="{{asset('dash/assets/reclamoNav.png')}}" width="45">
            <span class="label">Reclamos</span></a>
				
			</li>@endcan

            @if(Gate::any(['editar-parqueo','borrar-parqueo']))  <li>  
                <a href="#"><img src="{{asset('dash/assets/parqueoNav.png')}}" width="45">
                <span class="label">Parqueos</span></a>
                    <ul class="menu-vertical">
 
                        @can	('editar-parqueo')
                        <li><a href="/editar-parqueo">Editar</a></li>@endcan
                        @can	('borrar-parqueo')
                        <li><a href="/borrar-parqueo">Eliminar</a></li>@endcan
                    </ul>
            </li> @endif

            @if(Gate::any(['editar-vehiculos','borrar-vehiculos']))  <li> 
                            <a href="#"><img src="{{asset('dash/assets/carroo.png')}}"height="45"width="45">
                            <span class="label">Vehiculos</span></a>
                                <ul class="menu-vertical">
                                    @can	('editar-vehiculos')
                                    <li><a href="/editar-vehiculo">Editar</a></li>@endcan
                                    @can	('borrar-vehiculos')
                                    <li><a href="/borrar-vehiculo">Eliminar</a></li>@endcan 
                                </ul>
                            </li> @endif
            @if(Gate::any(['crear-entradas','crear-salidas']))  <li>
                            <a href="#"><img src="{{asset('dash/assets/eys.png')}}" width="45" height="45">
                            <span class="label">E/S </span></a>
                     
                                <ul class="menu-vertical">
                                @can	('crear-entradas')
                                <li><a href="/registrar-entrada">Marcar Entrada</a></li>@endcan 
                                @can	('crear-salidas')
                                <li><a href="/registrar-salida">Marcar Salida</a></li>@endcan 
                                </ul>
                            </li> @endif 
             @can('enviar-mensajes')   <li>
                            <a href="/enviar-mensaje"><img src="{{asset('dash/assets/mensaje.png')}}" width="45" height="45">
                            <span class="label">Mensajes </span></a>
                                <ul class="menu-vertical">
                               
                                </ul>
                            </li> @endcan                
                            
                            
          
            <li>
                <a href="/ver-perfil"><img src="{{asset('dash/assets/user2 2.png')}}" width="45">
                <span class="label">Perfil</span></a>
                </li> 
                
            <li>
                <a id="link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="salir">
                        <img src="{{asset('/dash/assets/salirNav.png')}}" alt="" class="" width="45">
                        <span  class="label">Salir</span>
                    </div>
                </a>
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
			</li>

		</ul>
	</nav>












