@extends('layout.head')
@section('sidebar')
    @parent
@endsection

@section('content')
<div class="container">
  <div class="row" style="padding-left:20%; padding-right:20%;">
    @if($approved)
    <strong>Datos de cliente.</strong>
		<ul>
			<li>
				Nombre/s y Apellido/s: <strong>{{$name}} {{$surname}}</strong>
			</li>
			<li>
				Monto a invertir: <strong>${{number_format($amount, 2, '.', '')}}</strong>
			</li>
			<li>
				Cantidad de días: <strong>{{$days}}</strong>
			</li>
			<li>
				Monto a recibir: <strong>${{number_format($finalAmount, 2, '.', '')}}</strong>
			</li>
		</ul>
		@if($toInvert)
		<h4 style="margin-top: 40px">Datos de los próximos 4 Períodos de inversión.</h4>
		<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Período</th>
			      <th scope="col">Monto Inicial</th>
			      <th scope="col">Monto Final</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>{{$amount}}</td>
			      <td>{{number_format($amountByPeriod[0], 2, '.', '')}}</td>
			    </tr>
			    <tr>
			      <th scope="row">2</th>
			      <td>{{number_format($amountByPeriod[0], 2, '.', '')}}</td>
			      <td>{{number_format($amountByPeriod[1], 2, '.', '')}}</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>{{number_format($amountByPeriod[1], 2, '.', '')}}</td>
			      <td>{{number_format($amountByPeriod[2], 2, '.', '')}}</td>
			    </tr>
			    <tr>
			      <th scope="row">4</th>
			      <td>{{number_format($amountByPeriod[2], 2, '.', '')}}</td>
			      <td>{{number_format($amountByPeriod[3], 2, '.', '')}}</td>
			    </tr>
			  </tbody>
			</table>
		@endif
	@else
	<div class="alert alert-danger">
			Uno o mas campos no cumplen con los requisitos esperados.
	</div>
	@endif
	<button onclick="history.go(-1);" type="submit" class="btn btn-primary">Volver</button>
	</div>
	</div>
@endsection
