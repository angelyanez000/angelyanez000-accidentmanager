@extends('layouts.app')


@section('content')
<script type="text/javascript">
        $(function() {
           $('#datetimepicker').datetimepicker();
        });
    </script>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Ingresar Nuevo Accidente</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Volver</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
     Hay varios problemas en la informaci&oacute;n ingresada.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif



{!! Form::open(array('route' => 'accidents.store','method'=>'POST','files'=>true)) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>T&iacute;tulo:</strong>
            {!! Form::text('title', null, array('placeholder' => 'T&iacute;tulo','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ubicaci&oacute;n:</strong>
            {!! Form::textarea('location', null, array('placeholder' => 'Ubicaci&oacute;n','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detalles del Accidente:</strong>
            {!! Form::textarea('accident_detail', null, array('placeholder' => 'Detalles del Accidente','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detalle Personas Accidentadas:</strong>
            {!! Form::textarea('detail_injured_people', null, array('placeholder' => 'Detalle Personas Accidentadas','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detalle de los Veh&iacute;culos Accidentados:</strong>
            {!! Form::textarea('car_detail', null, array('placeholder' => 'Detalle de los Veh&iacute;culos Accidentados','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
                <label for="event_date">Fecha Accidente:</label>
                <input type="text" class="form-control datetimepicker" name="event_date"/>
        </div>    
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            <input type="file" name="image" class="form-control" placeholder="image">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </div>
</div>
{!! Form::close() !!}



@endsection