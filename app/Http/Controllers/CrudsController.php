<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator;

use App\Cruds;

class CrudsController extends Controller
{
    //
	public function index()
	{
	  return response(Cruds::all()->jsonSerialize(), Response::HTTP_OK);
	}

	public function create(Generator $faker)
	{
	  $crud = new Cruds();
	  $crud->name = $faker->lexify('????????');
	  $crud->color = $faker->boolean ? 'red' : 'green';
	  $crud->save();

	  return response($crud->jsonSerialize(), Response::HTTP_CREATED);
	}
	
	public function update(Request $request, $id)
	{
	  $crud = Cruds::findOrFail($id);
	  $crud->color = $request->color;
	  $crud->save();

	  return response(null, Response::HTTP_OK);
	}
	
	public function destroy($id)
	{
	  Cruds::destroy($id);

	  return response(null, Response::HTTP_OK);
	}
	
	
}
