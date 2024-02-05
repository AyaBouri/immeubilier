<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFormRequest;
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
            'property'=>Property::orderBy('created_at','desc')->paginate(25)
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
            'property'=>$property
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property=Property::create($request->validated());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
