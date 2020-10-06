<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createUser');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                'nome' => 'bail|required|alpha|between:5,12',
                'senha' => 'required|min:5|numeric|different:12345',
                'email' => 'required|string|regex:/^.+@.+$/i|unique:users|',
                'ano' => 'max:5|nullable|starts_with:2|ends_with:0,1,2,3,4,5',
                'data' => 'date|before:tomorrow|after:01/01/1990'
            ], [
                'nome.required' => 'Nome necessário.',
                'senha.required' => 'Senha necessária.'
            ]);
  
        $validatedData['senha'] = bcrypt($validatedData['senha']);
        $user = User::create($validatedData);
      
        return back()->with('success', 'Usuário cadastrado com sucesso.');
    }
}