<?php

namespace App\Http\Controllers;
use App\Models\Scale;
use App\Models\City;
use App\EthiopianCarbon;


use Illuminate\Http\Request;
use Illuminate\support\carbon;


class Citycontroller extends Controller
{
    
    public function index(){

        $scales = Scale::all();
        return view('admin.index',compact('scales'));
    }

    public function city(){

        $cities = City::all();
        return view('admin.city',compact('cities'));
    }


    public function addscale(Request $request){
    $data = $request->validate([
        'scale' => 'required',
        'rate' => 'required',
    ]);

    if($request->has('check')){
        $chacked = true;
    }else{
        $chacked=false;
    }


    $scale = Scale::create([
        'scale' => $request->scale,
        'rate' => $request->rate,
        'status' =>$chacked,
        'created_at' => carbon::now()
    ]);


    return redirect()->back()->with('success','new is scale added  succesusfully');
}

public function editscale($id){

    $scale = Scale::find($id);

    return view('admin.editescale',compact('scale'));

}

public function updatescale(Request $request){
    $data = $request->validate([
        'scale' => 'required',
        'rate' => 'required',
    ]);

    if($request->has('check')){
        $chacked = true;
    }else{
        $chacked=false;
    }

    $id = $request->id;


    $scale = Scale::where('id',$id)->update([
        'scale' => $request->scale,
        'rate' => $request->rate,
        'status' =>$chacked,
        'updated_at' => Carbon::now()
    ]);


    return redirect()->route('admin')->with('success','scale updated succesusfully');
}


  public function removescale($id){

        $cities = Scale::find($id)->delete();
        return redirect()->back();
    }




public function addcity(Request $request){
    $city = $request->validate([
        'city'=>'required',
        'level'=>'required',
    ]);

    if($request->has('check')){
        $chacked = true;
    }else{
        $chacked=false;
    }

    $data = City::insert([
        'city'=>$request->city,
        'level'=>$request->level,
        'desertalw'=>$chacked,
        'status'=>$chacked,
        'created_at'=>carbon::now()
    ]);

    return redirect()->back()->with('success','new city added succesusfully');

}

public function editcity($id){

    $city = City::find($id);

    return view('admin.editcity',compact('city'));

}

public function updatecity(Request $request){

    $city = $request->validate([
        'city'=>'required',
        'level'=>'required',
    ]);

    if($request->has('check')){
        $chacked = true;
    }else{
        $chacked=false;
    }

    $id = $request->id;

    $data = City::find($id)->update([
        'city'=>$request->city,
        'level'=>$request->level,
        'desertalw'=>$chacked,
        'status'=>true,
        'Updated_at'=>carbon::now()
    ]);

    return redirect()->route('citylist')->with('success','city updated succesusfully');
}

public function removecity($id){
    $city = City::find($id)->delete();
    return redirect()->back();
}
}
