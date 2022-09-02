@extends('admin.admin')

@section('title', 'Inicio')

@section('content')


<div class="row justify-content-between mb-5">
	
	<a id="visitas" class="w-100" href="#grafico">
		<div>
			<p class="m-0 text-white text-bold">VISITAS MENSUALES</p>
			<h1 class="text-white">Conozca que tan visitado es su sitio web</h1>
		</div>
	</a>
	<div>
		<div class="d-flex">
			<hr>
			<h3 class="text-center py-4 mt-5 text-bold" id="grafico">VISITAS MENSUALES</h3>
			<hr>
		</div>
		<canvas id="myChart"></canvas>
	</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{asset('js/graficos/visitas.js')}}"></script>


@endsection