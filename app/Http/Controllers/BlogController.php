<?php

namespace App\Http\Controllers;

use App\Events\ContactRequestEvent;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertyRequest;
use App\Mail\PropertyContactMail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    public function index(SearchPropertyRequest $request) {
        $properties = Property::query();
        if($surface = $request->validated('surface')){
            $properties = $properties->where('surface', '>=', $surface);
        }
        if($piece = $request->validated('piece')){
            $properties = $properties->where('piece', '>=', $piece);
        }
        if($price = $request->validated('price')){
            $properties = $properties->where('price', '<=', $price);
        }
        if($title = $request->validated('title')){
            $properties = $properties->where('title', 'LIKE', "%{$title}%");
        }
        // dd($value);
        return view('index',[
            'properties' => $properties->paginate(25),
            'input' => $request->validated(),
        ]);
    }

    public function show(string $slug, Property $property) {
        $exceptSlug = $property->getSlug();
        if($exceptSlug != $slug){
            return redirect()->route('property.show',['slug' => $exceptSlug, 'property' => $property]);
        }
        return view('show', ['property' => $property]);
    }

    public function contact(Property $property, PropertyContactRequest $request){
        event(new ContactRequestEvent($property, $request->validated()));
        // Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'votre demande de contact a bien ete envoyer.');
    }
}
