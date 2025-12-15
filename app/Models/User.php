<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "name",
        "email",
        "password",
        "phone",
        "specialty",
        "affiliation",
        "role",
    ];

    protected $hidden = [
        "password",
        "remember_token",
    ];

    protected function casts(): array
    {
        return [
            "email_verified_at" => "datetime",
            "password" => "hashed",
        ];
    }


    // Modelo de Doctor
    public function appointments()
    {
        return $this->hasMany(Appointment::class, "doctor_id");
    }

    public function toJsonLd()
    {
        return [
            "@context" => "https://schema.org",
            "@type" => "Physician",
            "@id" => route("api.doctors.show", $this->id),
            "name" => $this->name,
            "email" => $this->email,
            "telephone" => $this->phone ?? "",
            "medicalSpecialty" => $this->specialty ?? "",
            "affiliation" => [
                "@type" => "Organization",
                "name" => $this->affiliation ?? "Hospital Semántico",
            ],
            "url" => route("api.doctors.show", $this->id),
        ];
    }
}
