<?php
namespace App\Http\Controllers;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request){
        $query=Property::query()->orderBy('created_at','desc');
        if($price=$request->validated('price')) {
            $query = $query->where('price', '<=', $price);
            /*$properties = $query->paginate(16);
            return view('property.index', compact('properties'));*/
        }
        if ($surface=$request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }
        if ($rooms=$request->validated('rooms')) {
            $query = $query->where('rooms', '>=',$rooms);
        }
        if ($title=$request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }
        //$properties=Property::paginate(16);
        return view('property.index',[
            'properties'=>$query->paginate(16),
            'input'=>$request->validated()
        ]);
    }
    public function show(string $slug,Property $property){
        $exptedSlug=$property.getSlug();
        if($slug!=$exptedSlug){
            return to_route('property.show',['slug'=>$exptedSlug,'properties'=>$property]);
        }
        return view('property.show',[
            'property'=>$property
        ]);
    }
    public function contact(PropertyContactRequest $request,Property $property){
        Mail::send(new PropertyContactMail($property,$request->validated()));
        return back()->with('success','Votre Demmande de contact a bien été envoyé');
    }
}
