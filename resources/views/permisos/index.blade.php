@extends('layouts.app')


@section('content')
<div class="container">
       
             <h1 class="text-center">Administracion de Roles y Usuarios</h1>


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
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                         @foreach($datos as $dato)
                            <tr>
                                <td>{{$dato->id}}</td>
                                <td>{{$dato->name}}</td>
                                <td>
                                    <form action="{{Route('roles.destroy',array($dato->id))}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <a href="{{Route('roles.edit',array($dato->id))}} " class="btn  btn-warning">Modificar</a>
                                        <button class="btn btn-danger" type="Submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                   
                   
              </table>   


 </div>


@endsection