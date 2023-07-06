<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class showPaginatedRecordsController extends Controller
{
    function show(Request $request,$page=null){
        $search_query=$request->search ?? "";
        $pagenated=DB::table('address')->paginate(10);
        if($page<0)
            return redirect("dashboard");
        if($page>$pagenated->lastPage())
            return redirect("dashboard");
        if(!$search_query==""){
               $records=DB::table('address')->where('name','ILIKE',"%$search_query%")->paginate(10,['*'],'page',$page);  
        }
        else{
               $records = DB::table('address')->paginate(10,['*'],'page',$page);
 
        }
        // getting the latest records
        $latestRecords=DB::table('address')->orderBy('id','desc')->take(5)->get();
       
        return view("welcome",['records'=>$records,'latestRecords'=>$latestRecords]);
    }
}