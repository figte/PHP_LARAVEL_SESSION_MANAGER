@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                @if(Auth::user()->hasRole('admin'))
                    <div>Acceso como administrador</div>
                @endif
                @if(Auth::user()->hasRole('user'))
                    <div>Acceso como User</div>
                @endif
                @if(Auth::user()->hasRole('invitado'))
                    <div>Acceso como Invitado</div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
