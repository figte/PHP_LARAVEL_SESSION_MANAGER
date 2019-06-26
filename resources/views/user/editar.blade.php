@extends('layouts.app')


@section('content')
<div class="container">
<div class="row justify-content-center">
        <h1 class="text-center"> Editar Registro</h1>
        <hr>

          <form method="POST" action="{{Route('user.update',$dato->id)}}">
                         {{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $dato->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $dato->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">

                                <select name="rol" id="rol" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required >
                                @foreach ($roles as $role)
                                    @if($rol->id==$role->id)
                                          <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                    @else
                                         <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endif
                                @endforeach

                                  
                                </select>    

                              
                                @if ($errors->has('rol'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rol') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contreseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                            <a href="{{ route('user.index') }}" class="btn btn-danger" >Atrás</a>
                                <button type="submit" class="btn btn-primary">
                                   Modificar
                                </button>
                            </div>
                        </div>
                    </form>
</div>
</div>
@endsection