<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;


class DBController extends Controller
{

    

    public function index(Request $request,$page=null)
    {  
        
        
        
        return redirect("/dashboard");

    }

    //view return to create something
    public function create()
    {
        $latestRecords=DB::table('address')->orderBy('id','desc')->take(5)->get();
        
        return view("AddForm",['latestRecords'=>$latestRecords]);
    }


    public function store(Request $request)
    {

        $request->validate([
            "name" => "required",
            "gender" => "required",
            "email" => "required|unique:address",
            "city" => "required"
        ]);

        DB::table('address')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'city' => $request->city,
            // primary key column is omitted
        ]);
        return  redirect()->route('records.index');
    }


    public function show($id)
    {
    }

    //view return to create something
    public function edit($id)
    {

        $user = DB::table("address")->where('id', '=', $id)->first();
        $latestRecords=DB::table('address')->orderBy('id','desc')->take(5)->get();
        
        return view("EditForm", ['user'=>$user,'latestRecords'=>$latestRecords]);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            "name" => "required",
            "email" => "required",
            "city" => "required",
            "gender" => "required"
        ]);
        DB::table("address")->where("id",  $id)->update([
            'name' => $request['name'],
            'gender' => $request['gender'],
            'email' => $request['email'],
            'city' => $request['city']
        ]);
        return  redirect()->route('records.index');
    }
    public function destroy($id)
    {

        DB::table('address')->where('id', '=', $id)->delete();
        return  redirect()->route('records.index');
    }
}
