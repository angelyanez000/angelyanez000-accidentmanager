@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Listado de Accidentes por Usuario</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('accidents.create') }}"> Ingresar un nuevo Accidente</a>
        </div>
    </div>
</div>
<br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>T&iacute;tulo</th>
   <th>Fecha ingreso</th>
   <th width="380px">Acci&oacute;n</th>
 </tr>
 @foreach ($accidents as $key => $accident)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $accident->title }}</td>
    <td>{{ $accident->event_date }}</td>
    <td>
       <a class="btn btn-info" href="{{ route('accidents.show',$accident->id) }}">Mostrar</a>
       <a class="btn btn-primary" href="{{ route('accidents.edit',$accident->id) }}">Editar</a>
        {!! Form::open(['method' => 'DELETE','route' => ['accidents.destroy', $accident->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </td>
  </tr>
 @endforeach
</table>


{!! $accidents->render() !!}

@endsection