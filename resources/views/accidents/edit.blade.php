@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Editar Accidente</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('accidents.index') }}"> Volver</a>
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


{!! Form::model($accident, ['method' => 'PATCH','route' => ['accidents.update', $accident->id],'files'=>true]) !!}
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>T&iacute;tulo:</strong>
            {!! Form::text('title', null, array('placeholder' => 'T&iacute;tulo','class' => 'form-control',  'readonly' => 'true')) !!}
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
                {!! Form::text('event_date', null, array('placeholder' => 'Fecha Accidente:','class' => 'form-control datetimepicker')) !!}
        </div>    
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Imagen Accidente:</strong>
            {!! Form::file('image', null, array('placeholder' => 'Imagen Accidente:','class' => 'form-control')) !!}
            
            <img src="/image/{{ $accident->image }}" width="300px">
        </div>
    </div>
    
                    

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>
{!! Form::close() !!}


@endsection