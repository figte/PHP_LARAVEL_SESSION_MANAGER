@extends('layouts.app')


@section('content')
<div class="container">
             <h1 class="text-center">Administracion de Usuarios</h1>

              <a href="{{ route('user.create') }}" class="btn btn-primary">Nuevo</a>  

            <hr>
            
           <script>
               //APLIACINDO PLUGIN A TABLA
               $(document).ready(function() {
                    $('#tregistros').DataTable();
                } );
           </script>
       
               <table id="tregistros" class="table table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                         @foreach($datos as $dato)
                            <tr>
                                <td>{{$dato->id}}</td>
                                <td>{{$dato->name}}</td>
                                <td>{{$dato->email}}</td>
                                        {{-- @foreach($users_rol as $user_rol)
                                                @if($user_rol->user_id==$dato->id)
                                                    @foreach($roles as $rol)
                                                        @if($user_rol->role_id==$rol->id)
                                                            <td>{{$rol->name}}</td>
                                                        @endif
                                                    @endforeach
                                                @endif
                                        @endforeach --}}
                                    <td>{{$dato->rol}}</td>
                                <td>
                                   
                                    <form action="{{Route('user.destroy',array($dato->id))}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a href="{{Route('user.edit',array($dato->id))}}" class="btn  btn-warning">Modificar</a>
                                        <button class="btn btn-danger" type="Submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                   
                   
              </table>   


 </div>


@endsection