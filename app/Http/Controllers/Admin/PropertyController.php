<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }

    public function index() {
        return view('admin.property.index', [
            'properties' => Property::paginate(20),
        ]);
    }

    public function create() {
        return view('admin.property.show',[
            'property'=> new Property(),
            'options' => Option::pluck('name', 'id'),
        ]);
    }

    public function store(PropertyRequest $request) {
        $data = $request->validated();
        $property = Property::create($data);
        $property->options()->sync($data['options']);
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien ete enregistrer');
    }

    public function edit(Property $property) {
        return view('admin.property.show', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);;
    }

    public function update(PropertyRequest $request, Property $property) {
        $data = $request->validated();
        $property->update($data);
        $property->options()->sync($data['options']);
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien ete modifier');
    }

    public function destroy(Property $property) {
        $property->delete();
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien ete supprimer');
    }
}
