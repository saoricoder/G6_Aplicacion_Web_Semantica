<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'specialty_id',
        'appointment_date',
        'status',
        'notes',
        'room_number',
    ];

    protected $casts = [
        'appointment_date' => 'datetime',
    ];

    /**
     * Relación: Una cita pertenece a un paciente
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    /**
     * Relación: Una cita pertenece a un médico
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    /**
     * Relación: Una cita pertenece a una especialidad
     */
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    /**
     * Generar JSON-LD para Appointment (MedicalBusiness)
     */
    public function toJsonLd()
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "MedicalBusiness",
            "@id" => route('api.appointments.show', $this->id),
            "name" => "Cita Médica #{$this->id}",
            "appointment" => [
                "@type" => "AppointmentRequest",
                "patient" => $this->patient?->toJsonLd(),
                "doctor" => [
                    "@type" => "Physician",
                    "@id" => route('api.doctors.show', $this->doctor_id),
                    "name" => $this->doctor->name,
                    "email" => $this->doctor->email,
                    "telephone" => $this->doctor->phone,
                    "medicalSpecialty" => $this->specialty->name,
                ],
                "appointmentStart" => $this->appointment_date->toDateTimeString(),
                "appointmentStatus" => match($this->status) {
                    'PENDING' => 'AppointmentRequested',
                    'CONFIRMED' => 'AppointmentBooked',
                    'COMPLETED' => 'AppointmentDone',
                    'CANCELLED' => 'AppointmentCancelled',
                    default => $this->status,
                },
                "medicalSpecialty" => $this->specialty->name,
                "description" => $this->notes,
            ],
            "url" => route('api.appointments.show', $this->id),
        ];
    }
}
