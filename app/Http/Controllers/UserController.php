<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::where('admin', 'false')->get();

    	return view('user.index', compact('users'));
    }

  	public function show($id)
  	{

  		$user = User::findOrFail($id);

  		return view('user.show', compact('user'));

  	}

    public function create()
    {
      
      return view('user.create');
    }

    /*la validación es disparada antes de que se cree el user*/
    public function store(userRequest $request)
    {

      User::create($request->all());

      flash()->success('El user ha sido creado');

      return Redirect::back()->with('message','Operation Successful !');
    }

    public function edit($id)
    {
      $user = User::findOrFail($id);
      return view('user.edit', compact('user'));
    }

    public function update($id, userRequest $request)
    {
      $user = User::findOrFail($id);

      $user->update($request->all());
      return redirect('user');
    }

    public function destroy($id)
    {
      User::find($id)->delete();

      return Redirect::back()->with('message','Operation Successful !');
    }
}


