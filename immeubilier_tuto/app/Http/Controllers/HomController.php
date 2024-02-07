<?php
namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;
class  HomController extends Controller
{
    public function index(){
        //$properties=Property::with('pictures')->where('sold',false)->orderBy('created_at','desc')->limit(4)->get();
        $properties=Property::with('pictures')->avialble()->recent()->limit(4)->get();
        dd($properties->first()->created_at);
        return view('home',['properties'=>$properties]);
    }
}
