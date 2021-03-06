<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeFormRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = Type::all();
        return view('types.list_types',compact('type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.add_type');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeFormRequest $t)
    {
        $insertion = Type::firstOrCreate([
            'reference_type' => strtoupper('REF-'.str_random(5)),
            'libelle_type'   => ucfirst($t->libelle_type),
        ]);

        if ($insertion) {
            Flashy::success('Vous avez ajouté une nouvelle catégorie');
            return back();
        } else {
            Flashy::error("Echec d'ajout");
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('types.edit_type',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = Type::findOrFail($id);
        $update = $type->update([
            'libelle_type' => ucfirst($request->libelle_type),
        ]);
        if ($update) {
           Flashy::success('Modification réussie');
           return redirect()->route('list_types');
        }else{
            Flashy::error("Echec de modification !");
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
