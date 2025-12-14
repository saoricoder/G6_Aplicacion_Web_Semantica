<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Obtener todas las especialidades con JSON-LD
     */
    public function apiIndex()
    {
        $specialties = Specialty::all();

        $jsonLdData = [];
        foreach ($specialties as $specialty) {
            $jsonLdData[] = $specialty->toJsonLd();
        }

        return response()->json([
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "itemListElement" => $jsonLdData
        ]);
    }

    /**
     * Obtener una especialidad específica con JSON-LD
     */
    public function apiShow($id)
    {
        $specialty = Specialty::findOrFail($id);
        return response()->json($specialty->toJsonLd());
    }
}
