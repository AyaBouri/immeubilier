<?php
namespace App\Http\Controllers;
use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Http\Request;
class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request){
        $query=Property::query();
        if($request->has('price')) {
            $query = Property::query();
            // Filtrer par prix si le paramètre est présent
            if ($request->has('price')) {
                $query = $query->where('price', '<=', $request->input('price'));
            }
            $properties = $query->paginate(16);
            return view('property.index', compact('properties'));
        }
        //$properties=Property::paginate(16);
        return view('property.index',[
            'properties'=>$query->paginate(16)
        ]);
    }
    public function show(string $slug,Property $property){
    }
}
