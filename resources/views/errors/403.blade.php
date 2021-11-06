@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> 403 - User does not have the right permissions. </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="javascript:history.back();"> Back</a>
        </div>
    </div>
</div>

@endsection