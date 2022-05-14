@extends('layouts.app')

@section('content')
<div class="container">

    
    {{-- scheda conferma login effettuato --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    {{ __('You are logged in!') }}
                    {{-- ottengo i dati sul mio utente --}}
                    {{ Auth::user()->name }}
                    {{ Auth::user()->email }}
                    {{ Auth::id() }}
                </div>
            </div>
        </div>
    </div>
    <span 
        id="userInfo" 
        style="display: none" 
        myId="{{ Auth::user()->id }}"
        myUserName="{{ Auth::user()->email }}"
        ></span>

    {{-- dentro appVue viene randerizzato il componente primario di vue a paritire da App.vue ma il div con id appVue non viene portato --}}
    <div id="appVue" myid="{{ Auth::user()->id }}"></div>
    {{-- tutto quello che sta fuori posso gestirlo con laravel --}}
</div>
@endsection
