<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class connectDB extends Controller
{
    function connectDB(){
        try {
            $dbname=DB::connection()->getDatabaseName();
            return $dbname;
        } catch (\Exception $e) {
            return "Cannot connect to database";
        }
       
    }
}
