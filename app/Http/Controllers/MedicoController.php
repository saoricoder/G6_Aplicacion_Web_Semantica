<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicos = User::where('role', 'MEDICO')->get();
        return view('medicos.index', compact('medicos'));
    }

    /**
     * API: Display a listing of medicos with JSON-LD
     */
    public function apiIndex()
    {
        $medicos = User::where('role', 'MEDICO')->get();

        $jsonLdData = [];
        foreach ($medicos as $medico) {
            $jsonLdData[] = $medico->toJsonLd();
        }

        return response()->json([
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "itemListElement" => $jsonLdData
        ]);
    }

    /**
     * API: Display a specific medico with JSON-LD
     */
    public function apiShow($id)
    {
        $medico = User::where('role', 'MEDICO')->findOrFail($id);
        return response()->json($medico->toJsonLd());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($UserId)
    {
        return $medicos = User::findOrFail($UserId);

        $jsonId=[
            "@context"=> "https://schema.org",
            "@type"=> "Physician",
            "name"=> $medicos->name,
            "email"=> $medicos->email,
            "telephone"=> $medicos->phone,
            "medicalSpecialty"=> $medicos->specialty,
            "affiliation"=> $medicos->affiliation,
            "nameAffiliation"=> $medicos->name_afiliation,

        ];

        $data = [
            'jsonId' => $jsonId,
            'medicos' => $medicos,
        ];
        return view('medicos.show', compact('medicos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
