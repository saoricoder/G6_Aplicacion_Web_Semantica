<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Obtener todas las citas con JSON-LD
     */
    public function apiIndex()
    {
        $appointments = Appointment::with(['patient', 'doctor', 'specialty'])->get();

        $jsonLdData = [];
        foreach ($appointments as $appointment) {
            $jsonLdData[] = $appointment->toJsonLd();
        }

        return response()->json([
            "@context" => "https://schema.org",
            "@type" => "ItemList",
            "itemListElement" => $jsonLdData
        ]);
    }

    /**
     * Obtener una cita específica con JSON-LD
     */
    public function apiShow($id)
    {
        $appointment = Appointment::with(['patient', 'doctor', 'specialty'])->findOrFail($id);
        return response()->json($appointment->toJsonLd());
    }
}
