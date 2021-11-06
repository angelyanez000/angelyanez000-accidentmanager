@extends('layouts.index')

@section('content')

    <div class="row">
            <div class="panel border bg-white">
                <div class="panel-heading">
                    <h3 class="pt-3 font-weight-bold"> &nbsp;&nbsp; Reporte Accidentes de Tr&aacute;nsito &nbsp;&nbsp;</h3>
                </div>
                <div class="panel-body p-3">
                    <form action="{{ route('login') }}" method="POST" name="form-login">
                    @csrf
                        <div class="form-group py-2">
                            <div class="input-field"> 
                                <input type="text" placeholder="Ingrese un Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                                &nbsp;&nbsp;&nbsp;
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group py-1 pb-2">
                            <div class="input-field"> 
                                <input type="password" placeholder="Ingrese la clave" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"> 
                                &nbsp;&nbsp;&nbsp;
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div  style="text-align:center"> <input type="checkbox" name="remember" id="remember"  style="display:none"> 
                            <label for="remember" class="text-muted" style="display:none">Remember me</label>&nbsp;&nbsp;&nbsp; 
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" id="forgot" class="font-weight-bold">Olvid&oacute; su clave?</a> 
                            @endif
                         </div>
                        <div class="btn btn-primary btn-block mt-3" onClick="document.forms['form-login'].submit();" >Acceder</div>
                       
                    </form>
                </div>
            </div>
    </div>


 
@endsection
