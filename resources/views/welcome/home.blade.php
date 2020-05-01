@extends('layout.head')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
<body>
	<div class="container">
  <div class="row">
    <div class="col text-center">
    	<h1>Bienvenido a la silumación de Plazo Fijo.</h1>
      <button style="margin-top: 60px" onclick= "document.location.href='loan'" class="btn btn-default">Ingresar</button>
    </div>
  </div>
</body>
@endsection