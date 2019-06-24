@extends('layouts.app')


@section('content')
<div class="container">
<div class="row justify-content-center">
        <h1 class="text-center"> Editar Registro</h1>
        <hr>


        <form method="POST" action="{{Route('roles.update',$dato->id)}}">
                        {{ csrf_field() }}
							<input name="_method" type="hidden" value="PATCH">

                       
                        <div class="form-group row">
                            <label for="name" class="col-md-offset-2 col-md-2 col-form-label text-md-right">Rol</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $dato->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-offset-2 col-md-2 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                               
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" required autofocus>{{$dato->description}}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
              
                         <div class="form-group row mb-0">
                            <div class="col-md-offset-8 col-md-3 ">
                                <a href="{{ route('roles.index') }}" class="btn btn-danger" >Atrás</a>
                                <button type="submit" class="btn btn-primary">
                                   Modificar
                                </button>

                            </div>
                        </div>
                       

         </form>
</div>
</div>
@endsection