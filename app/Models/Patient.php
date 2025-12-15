<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'blood_type',
        'medical_history',
        'insurance_provider',
        'insurance_policy',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    /**
     * Relación: Un paciente tiene muchas citas
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Generar JSON-LD para Paciente (Patient)
     */
    public function toJsonLd()
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "Patient",
            "@id" => route('api.patients.show', $this->id),
            "name" => $this->name,
            "email" => $this->email,
            "telephone" => $this->phone,
            "birthDate" => $this->date_of_birth?->toDateString(),
            "gender" => $this->gender,
            "bloodType" => $this->blood_type,
            "medicalHistory" => $this->medical_history,
            "healthInsurancePlan" => [
                "@type" => "HealthInsurancePlan",
                "name" => $this->insurance_provider,
                "policyNumber" => $this->insurance_policy,
            ],
        ];
    }
}
