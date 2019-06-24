<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;


class RolController extends Controller
{

    public function __construct()
    {
        $this->middleware(array('auth','permisoRol:admin'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datos=Role::all();
        return View('roles.index',['datos'=>$datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('roles.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        // $registro = new Role();
        // $registro->name = $request->input('name');
        // $registro->description = $request->input('descripcion');
        // $registro->save();
        // return redirect('roles');

        $this->validate($request,[ 'name'=>'required', 'description'=>'required']);
        Role::create($request->all());
        return redirect()->route('roles.index')->with('success','Registro creado satisfactoriamente');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dato=Role::find($id);
        return view('roles.editar',['dato'=>$dato]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $this->validate($request,[ 'name'=>'required', 'description'=>'required']);
        Role::find($id)->update($request->all());
        return redirect()->route('roles.index')->with('success','Registro actualizado satisfactoriamente');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->route('roles.index')->with('success','Registro eliminado satisfactoriamente');

    }
}
