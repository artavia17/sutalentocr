<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\register_visits;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegisterVisitController extends Controller
{

    function index(){

        $current_date = Carbon::now();
        $month = $current_date->format('m');
        $year = $current_date->format('Y');

        if(DB::table('register_visits')->where('month', $month)->where('year', $year)->exists()){

            $current_visit = register_visits::where('month', $month)
                                            ->where('year', $year)
                                            ->first();
            $id_current_visit = $current_visit->id;
            $current_visit_data = $current_visit->visit;
            $add_new_vist = $current_visit_data + 1;

            register_visits::where('month', $month)
                                ->where('year', $year)
                                ->update(['visit' => $add_new_vist]);

            
            return response()->json([

                'data'=>[
                    'code' => 422,
                    'visits' => 'Visits Updated',
                ]

            ])->setStatusCode(200);                  

        };

        register_visits::create([
            'visit' => 1,
            'month' => $month,
            'year' => $year,
        ]);

        return response()->json([

            'data'=>[
                'code' => 200,
                'visits' => 'New visit of month',
            ]

        ])->setStatusCode(200);  

    

    }


    function consults(){

        $visits_consults = register_visits::all();

        

        return response()->json([

            'data' => [

                "items" => $visits_consults->map(function($items){

                    return [
                        "visit" => $items->visit,
                        "month" => $items->month,
                        "year" => $items->year,
                    ];
                    
                })

            ]

        ])->setStatusCode(200);

    }

}
