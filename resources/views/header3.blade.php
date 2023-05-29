@extends('header2')
@section('estilos')
<link rel="stylesheet" href="{{asset('css/header3.css')}}">
@endsection
@section('header')

<br>
        <nav>
		<ul class="menu-horizontal">
			<li><a href="/loby"><img src="{{asset('dash/assets/inicioNav.png')}}" width="45"> Inicio</a></li>
			<li>
            <a href="/registro_usuario"><img src="{{asset('dash/assets/user2 2.png')}}" width="45">
            <span class="label">Usuarios</span></a>
				<ul class="menu-vertical">
					<li><a href="#">Lista de usuarios</a></li>
					<li><a href="/editar_usuario">Editar</a></li>
					<li><a href="/eliminar_usuario">Eliminar</a></li>
                    <li><a href="/perfil_usuario">Ver perfil</a></li>
				</ul>
			</li>
			<li>
            <a href="/reportes"><img src="{{asset('dash/assets/parqueoNav.png')}}" width="45">
            <span class="label">Reportes</span></a>
				<ul class="menu-vertical">
					<li><a href="/reporte_vehiculos">Reportes de entradas y salidas</a></li>
					<li><a href="#">Reporte mensual</a></li>
                    <li><a href="/ver_parqueo">Lista de parqueo</a></li>
                    <li><a href="/pagos_admi">Ver pagos</a></li>
                    <li><a href="/deudas_admi">Ver deudas</a></li>
				</ul>
			</li>
            <li>
            <a href="/alquilar_parqueo"> <img src="{{asset('dash/assets/alquiloNav.png')}}" width="45">
            <span class="label">Alquilar</span></a>
				<ul class="menu-vertical">
					<li><a href="/alquilar_parqueo">Alquilar</a></li>
					
				</ul>
			</li>
            <li>
            <a href="/registro_vehiculo"><img src="{{asset('dash/assets/registroNav.png')}}" width="45">
            <span class="label">Registrar</span></a>
				<ul class="menu-vertical">
					<li><a href="/marcar_ingreso">Entradas</a></li>
					<li><a href="/marcar_salida">Salidas</a></li>
                  
				</ul>
			</li>
            <li>
            <a href="/loby"><img src="{{asset('dash/assets/reclamoNav.png')}}" width="45">
            <span class="label">Reclamos</span></a>
				
			</li>

            <li>
            <a href="/loby"><img src="{{asset('dash/assets/salirNav.png')}}" width="45">
            <span class="label">Salir</span></a>
			</li>

		</ul>
	</nav>












@endsection
