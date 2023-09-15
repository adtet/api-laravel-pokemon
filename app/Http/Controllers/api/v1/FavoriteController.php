<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Favorite;
use App\Jobs\ExportToExcel;


class FavoriteController extends Controller
{
    //
    public function index(Request $request){
        
        $favorite = Favorite::latest()->get();
        return response([
            'success' => true,
            'message' => 'Favorite List',
            'data' => $favorite
        ], 200);
    }

    Public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'url'   => 'required',
        ],
            [
                'name.required' => 'name is required !',
                'url.required' => 'url is required',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Completed the request',
                'data'    => $validator->errors()
            ],401);

        }

        $favorite = Favorite::create([
           'name' => $request->input('name'),
           'url' => $request->input('url') 
        ]);

        if(!$favorite){
            return response()->json([
                    'success' => false,
                    'message' => 'Fail Create Favorite',
                ], 401);
        }

        return response()->json([
                    'success' => true,
                    'message' => 'Success Create Favorite',
        ], 200);
        
        
    }

    public function ability(Request $request){
        $favorite = Favorite::latest()->get();
        $data = array();
        if($favorite){
            foreach($favorite as $data_row){
                $response = Http::get($data_row->url);
                
                if($response->successful()){
                //  var_dump($response->json()['abilities']);
                 $result = [
                   'name'=>$data_row->name,
                    'abilities'=>$response->json()['abilities']
                 ];
                }
             $data[] = $result;   
            }
            
        }

        return response([
            'success' => true,
            'message' => 'Ability Favorite List',
            'data' => $data
        ], 200);
    }

    public function excel(){
        dispatch(new ExportToExcel());

        return "Proses eksport telah dimulai.";
    }
}