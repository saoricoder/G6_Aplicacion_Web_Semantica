<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Relación: Una especialidad tiene muchos médicos
     */
    public function doctors()
    {
        return $this->hasMany(User::class, 'specialty_id');
    }

    /**
     * Relación: Una especialidad tiene muchas citas
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Generar JSON-LD para Specialty (MedicalSpecialty)
     */
    public function toJsonLd()
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "MedicalSpecialty",
            "@id" => route('api.specialties.show', $this->id),
            "name" => $this->name,
            "description" => $this->description,
            "url" => route('api.specialties.show', $this->id),
        ];
    }
}
