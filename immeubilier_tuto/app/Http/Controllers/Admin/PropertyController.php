<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PropertyFormRequest;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Property;
use Illuminate\Http\Request;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.property.index',[
            'property'=>Property::orderBy('created_at','desc')->withTrashed()->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property=new Property();
        $property->fill([
           'surface'=>48,
            'rooms'=>3,
            'bedrooms'=>1,
            'floor'=>0,
            'city'=>'Casablanca',
            'postal_code'=>6000,
            'sold'=>false,
        ]);
        return view('admin.property.form',[
            'property'=>$property,
            'options'=>Option::pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( PropertyFormRequest $request)
    {
        $property=Property::create($request->validated());
        $property->options()->sync($request->validated('option'));
        return to_route('admin.property.index')->with('success','Le bien à été bien crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.property.form',[
            'property'=>$property,
            'options'=>Option::pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validate());
        $property->options()->sync($request->validated('option'));
        return to_route('admin.property.index')->with('success','Le bien a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        Picture::destroy($property->pictures()->pluck('id'));
        $property->restore();
        return to_route('admin.property.index')->with('success','Le bien a bien été supprimé');
    }
}
