<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $property = Property::limit(4)->available()->get();
        return view('home', ['properties' => $property]);
    }
}
