<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Obtener todos los pacientes con JSON-LD
     */
    public function apiIndex()
    {
        $patients = Patient::all();

        $jsonLdData = [];
        foreach ($patients as $patient) {
            $jsonLdData[] = $patient->toJsonLd();
        }

        return response()->json([
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "itemListElement" => $jsonLdData
        ]);
    }

    /**
     * Obtener un paciente específico con JSON-LD
     */
    public function apiShow($id)
    {
        $patient = Patient::findOrFail($id);
        return response()->json($patient->toJsonLd());
    }
}
