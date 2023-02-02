<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $this->authorize('viewAny', User::class);
        $userList = User::all();
        return view('user.index', ['userList' => $userList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            
            "nombre" => "required",
            
            "email" => "required"
        ], [
            
            "nombre.required" => "El nombre es obvligatorio",
            
            "email.required" => "El email es obvligatorio"

        ]);
        $usuario = new User;
        $usuario->name=$request->input('name');
        $usuario->email=$request->input('email');
        $usuario->password=Hash::make([$request->input('password')]);
        $usuario->save();
       

       // 'password' => Hash::make($data['password']),
       // User::create($request->all());
        //return redirect("users.index")->with("exito","usere creado correctamente");
        return redirect()->route('users.index')->with('exito', 'usere creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            "name" => "required",
            "email" => "required",
            "password" => "required",
         
        ], [
            "name.required" => "El dni es obvligatorio",
            "email.required" => "El nombre es obvligatorio",
            "password.required" => "El password es obvligatorio",
           

        ]);

        $user = User::find($id);
       
        $user->name = $request->input("name");
        
        $user->email = $request->input("email");
        $user->password=Hash::make($request['password']);

        $user->save();
        return redirect()->route('users.index')->with("exito", "Modificado exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with("exito", "Eliminado exitosamente");
    }
}
