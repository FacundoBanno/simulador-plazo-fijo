@extends('layout.head')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
  <div class="row" style="padding-left:20%; padding-right:20%;">
  <form action='/loan' method='POST'>
      @csrf

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Pepe">
</div>
<div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ej: Gonzalez">
</div>

<div class="form-group">
    <label for="monto">Monto a invertir</label>
    <input type="number" class="form-control" id="monto" name="monto" placeholder="$">
</div>
<div class="form-group">
    <label for="dias">Cantidad de días</label>
    <input type="number" class="form-control" id="dias" name="dias" placeholder="Ej: 4">
    <small>Controlar porcentaje en la tabla que se encuentra abajo.*</small>
</div>


  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="toInvert" name="toInvert">
    <label class="form-check-label" for="toInvert">Deseo invertir el capital</label>
  </div>
  <div style="text-align: right;">
    <button type="submit" class="btn btn-primary">Calcular</button>
  </div>

</form>
<h4 style="margin-top: 40px">Porcentaje de ganancia por cantidad de días.</h4>
  <table class="table">
        <thead>
          <tr>
            <th scope="col">Cantidad de días</th>
            <th scope="col">Porcentaje</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>30 - 60</td>
            <td>40%</td>
          </tr>
          <tr>
            <td>61 - 120</td>
            <td>45%</td>
          </tr>
          <tr>
            <td>121 - 360</td>
            <td>50%</td>
          </tr>
          <tr>
            <td>360 - </td>
            <td>65%</td>
          </tr>
        </tbody>
      </table>
  </div>
</div>
@endsection