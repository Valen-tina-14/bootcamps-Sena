<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCoursesRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            "success" => true,
            "data" => Course::all()
        ] , 200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        /*var_dump($request->all());
        echo"<hr />";
        var_dump($id);*/

        //crear el curso 
       
        $curso =new Course();
        $curso->title = $request->title;
        $curso->description=$request->description;
        $curso->weeks=$request->weeks;
        $curso->enroll_cost=$request->enroll_cost;
        $curso->minimum_skill=$request->minimum_skill;
        $curso->bootcamp_id = $id;
        $curso->save();

        //enviar response 
        return response()->json([
            "success" => true,
            "data" => $curso
        ] , 201 );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json([
            "success" => true,
            "data" => Course::all()
        ] , 200 );
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
        $curso = Course::find($id);
        //2. actualizarlo
        $curso->update(
            $request->all()
        );
        // 3. hacer el Response respectivo 
        return response()->json( ["success" => true ,
        "data" => $curso
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
         $course = Course::find($id);
         //2. Eliminar ese bootcamp
         $course->delete();
         //3. Response:
         return response()->json( ["success" => true ,
         "data" => $course ->id,
         ] , 200);
    }
}
