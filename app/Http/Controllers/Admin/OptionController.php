<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionRequest;

class OptionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Option::class, 'option');
    }
    public function index() {
        return view('admin.option.index', [
            'properties' => Option::all(),
        ]);
    }

    public function create() {
        return view('admin.option.show',[
            'option'=> new Option()
        ]);
    }

    public function store(OptionRequest $request) {
        $option = Option::create($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'L\'option a bien ete enregistrer');
    }

    public function edit(Option $option) {
        return view('admin.option.show', [
            'option' => $option,
        ]);;
    }

    public function update(OptionRequest $request, Option $option) {
        $option->update($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'L\'option a bien ete modifier');
    }

    public function destroy(Option $option) {
        $option->delete();
        return redirect()->route('admin.option.index')->with('success', 'L\'option a bien ete supprimer');
    }
}
