<?php

namespace App\Http\Controllers;

use App\Models\characters;
use Illuminate\Http\Request;

class character extends Controller
{

    public function modify(Request $request,$name){

        $new_charecter=characters::where('name',$name)->first();

        $new_charecter->name=$request->name;
        $new_charecter->type=$request->type;
        $new_charecter->city=$request->city;
        $new_charecter->save();
        return response()->json(['status' => 200, 'message' => 'charecter modifyed successfully']);

    }

    public function delete($name){

        $new_charecter=characters::where('name',$name)->first();


        if (!$new_charecter) {
            
            return response()->json(['status' => 404, 'message' => 'Character not found'], 404);
        }
        
        $new_charecter->delete();
        return response()->json(['status' => 200, 'message' => 'charecter deleted successfully']);

    }


    public function add(Request $request){

        $new_charecter=new characters();

        $new_charecter->name=$request->name;
        $new_charecter->type=$request->type;
        $new_charecter->city=$request->city;

        $new_charecter->save();
        return response()->json(['status' => 200, 'message' => 'charecter added successfully']);

    }


    public function retrive($name){

        $new_charecter= characters::where('name',$name)->first();


        if ($new_charecter){
            $data=[
                'status'=>200,
                'charecter'=>$new_charecter
            ];
        }else{
            $data=[
                'status'=>400,
                'message'=>'sagam ro7k'];
        }
        return response()->json($data,200);

    }
}
