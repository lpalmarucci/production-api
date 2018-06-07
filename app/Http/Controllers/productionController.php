<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function allUsers(Request $request){
        $results = app('db')->connection('mysql2')->select("SELECT * FROM users");
        return response()->json(['data' => $results], 200);
    }
    public function getCode(Request $request,$ticket){
        $ticket_subject=str_replace("%20"," ",$ticket);
        $results = app('db')->connection('mysql')->select("SELECT ticket_hardware_code AS hardware_code FROM xoops_production_ticket WHERE ticket_subject='$ticket_subject'");
        //$results = app('db')->connection('mysql2')->select("SELECT * FROM utenti");
        if($results==[]){
            $json=$this->getJson("ERROR_SERIAL_COD_NOT_FOUND");
            $status=404;
        }
        else{
            $status=200;
            /*for ($i=0; $i < count($results) ; $i++) { 
               $json["utente $i"]=$results[$i];
            }*/
            $json=$results[0];
        }
        $content=$json;
        return response()->json($content,$status,$this->getHeaders(["GET","POST"]));
    }
    public function option(Request $request, $ticket){
        return response("",200,$this->getHeaders(["GET","POST"]));
    }
    private function getHeaders($method){
        $metodi=implode(" ",$method);
        $headers = [
            'Access-Control-Allow-Origin'      => '*',
            'Access-Control-Allow-Methods'     => $metodi,
            'Access-Control-Allow-Credentials' => 'true',
            //'Access-Control-Max-Age'           => '86400',
            'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With'
        ];
        return $headers;
    }

    public function getJson($errorName){
        $internalJson["code"]=(int)env($errorName);
        $internalJson["description"]=$errorName;
        $json["error"]=$internalJson;
        return $json;
    }
}
