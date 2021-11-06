@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Mostrar Datos Accidente</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('accidents.index') }}"> Volver</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>T&iacute;tulo:</strong>
            {{ $accident->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Ubicaci&oacute;n:</strong>
            {{ $accident->location }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detalles del Accidente:</strong>
            {{ $accident->accident_detail }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detalle Personas Accidentadas:</strong>
            {{ $accident->detail_injured_people }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detalle de los Veh&iacute;culos Accidentados:</strong>
            {{ $accident->car_detail }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Imagen Accidente:</strong>
            <img src="/image/{{ $accident->image }}" width="500px">
        </div>
    </div>

</div>
@endsection