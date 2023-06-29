<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Salary;
use App\Models\Scale;
use App\Models\City;
use App\Models\Histry;



use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function printpdf(Request $request)
    {
        $user  = Auth::guard('web')->user();

        
        $guzo = Scale::where('scale','guzo' )->first();
        $memeles = Scale::where('scale','memeles' )->first();

        
        

        $id = $user->id;

        $name = $user->name;
        $salary = Salary::where('user_id',$id)->first();
        
        $start_city = $request->start_city;
        $end_city = $request->end_city;
        $level = City::where('city',$end_city)->first();
        $city_level = $level->level;
        $desert = $level->desertalw;
        $wuloabel = Scale::where('scale',$city_level)->first();
        if($desert){
            $desertalw = Scale::where('scale','yeberehAbel')->first();
        }else{
            $desertalw = Scale::where('scale','noyeberehAbel')->first();
        }
        $guzo_adar = Scale::where('scale','guzo_adar')->first();
        $brake_fast = $request->brake_fast;
        $lanch = $request->lanch;
        $start_date = $request->start_date;
        $start_day = explode("/",$start_date);
        $end_date = $request->end_date;
        $date_diference = $request->date_diference;

        return view('printedpage',compact('name','salary','start_city','end_city','brake_fast','lanch','start_date','end_date','date_diference','guzo','start_day','memeles','wuloabel','desertalw','guzo_adar',));
        
    }

    public function createhistry(Request $request){
        $id = Auth::guard('web')->id();

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $formattedStartDate = explode("/",$start_date);
        $formattedEndDate = explode("/",$end_date); 
        
        $st_date = $formattedStartDate[1]."/".$formattedStartDate[0]."/".$formattedStartDate[2];
        $en_date = $formattedEndDate[1]."/".$formattedEndDate[0]."/".$formattedEndDate[2];

        $data = Histry::insert([
            'user_id'=>$id,
            'start_date'=>$st_date,
            'end_date'=>$en_date,
            'mission'=>'x'
        ]);

        return redirect()->route('homepage');
    }
}
