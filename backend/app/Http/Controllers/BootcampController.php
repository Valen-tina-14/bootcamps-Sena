<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bootcamp;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBootcampRequest;
use App\Http\Resources\BootcampResource;
use App\Http\Resources\BootcampCollection;


class BootcampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo "Aqui se va  a mostrar todos los bootcamp";
        return response()->json(new BootcampCollection(Bootcamp::all()) 
                                 , 200 ); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBootcampRequest $request)
    {
        //registrar el bootcamp a partir 
        // del payload
        $b = Bootcamp::create(
            $request->all()
        );
        return response ( ["success"  => true, 
                            "data" => $b ] , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json( ["seccess" => true ,
                                 "data" => new BootcampResource(Bootcamp::find($id))
                                 ] , 200);
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
        //1. seleccionar el bootcamp por id 
        $bootcamp = Bootcamp::find($id);
        //2. actualizarlo
        $bootcamp->update(
            $request->all()
        );
        // 3. hacer el Response respectivo 
        return response()->json( ["success" => true ,
        "data" => new BootcampResource($bootcamp)
        ] , 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //1. Seleccionas el bootcamp 
        $bootcamp = Bootcamp::find($id);
        //2. Eliminar ese bootcamp
        $bootcamp->delete();
        //3. Response:
        return response()->json( ["seccess" => true ,
        "message" => "Bootcamp eliminado",
        "data" => $bootcamp
        ] , 200);
    }
}
