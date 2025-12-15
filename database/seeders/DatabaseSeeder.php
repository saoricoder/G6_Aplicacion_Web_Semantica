<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory(100)->create();

        User::factory(
            [
                'name' => 'Admin User',
                'email' => 'blrodriguez3@espe.edu.ec']      );
        
        
        //*        // Insertar especialidades
        DB::table("specialties")->insert([
            ["name" => "Cardiolog?a", "description" => "Especialidad del coraz?n y sistema vascular", "created_at" => now(), "updated_at" => now()],
            ["name" => "Dermatolog?a", "description" => "Especialidad de la piel", "created_at" => now(), "updated_at" => now()],
            ["name" => "Pediatr?a", "description" => "Especialidad para ni?os", "created_at" => now(), "updated_at" => now()],
            ["name" => "Neurolog?a", "description" => "Especialidad del sistema nervioso", "created_at" => now(), "updated_at" => now()],
            ["name" => "Oftalmolog?a", "description" => "Especialidad de los ojos", "created_at" => now(), "updated_at" => now()],
        ]);

        // Insertar pacientes
        DB::table("patients")->insert([
            ["name" => "Juan P?rez Garc?a", "email" => "juan@example.com", "phone" => "3001234567", "date_of_birth" => "1990-05-15", "gender" => "M", "blood_type" => "O+", "created_at" => now(), "updated_at" => now()],
            ["name" => "Mar?a L?pez Mart?nez", "email" => "maria@example.com", "phone" => "3002345678", "date_of_birth" => "1985-03-20", "gender" => "F", "blood_type" => "A+", "created_at" => now(), "updated_at" => now()],
            ["name" => "Carlos Rodriguez", "email" => "carlos@example.com", "phone" => "3003456789", "date_of_birth" => "1975-07-10", "gender" => "M", "blood_type" => "B+", "created_at" => now(), "updated_at" => now()],
        ]);

        // Insertar usuarios (m?dicos)
        DB::table("users")->insert([
            ["name" => "Dr. Antonio S?nchez", "email" => "antonio@hospital.com", "password" => bcrypt("password"), "phone" => "3005555555", "specialty" => "Cardiolog?a", "affiliation" => "Hospital Central", "role" => "MEDICO", "created_at" => now(), "updated_at" => now()],
            ["name" => "Dra. Sandra L?pez", "email" => "sandra@hospital.com", "password" => bcrypt("password"), "phone" => "3006666666", "specialty" => "Dermatolog?a", "affiliation" => "Cl?nica Dermatol?gica", "role" => "MEDICO", "created_at" => now(), "updated_at" => now()],
            ["name" => "Dr. Fernando Garc?a", "email" => "fernando@hospital.com", "password" => bcrypt("password"), "phone" => "3007777777", "specialty" => "Pediatr?a", "affiliation" => "Hospital Infantil", "role" => "MEDICO", "created_at" => now(), "updated_at" => now()],
        ]);

        // Insertar citas
        DB::table("appointments")->insert([
            ["patient_id" => 1, "doctor_id" => 1, "specialty_id" => 1, "appointment_date" => now()->addDays(5), "status" => "PENDING", "notes" => "Consulta de coraz?n", "created_at" => now(), "updated_at" => now()],
            ["patient_id" => 2, "doctor_id" => 2, "specialty_id" => 2, "appointment_date" => now()->addDays(3), "status" => "PENDING", "notes" => "Revisi?n dermatol?gica", "created_at" => now(), "updated_at" => now()],
            ["patient_id" => 3, "doctor_id" => 3, "specialty_id" => 3, "appointment_date" => now()->addDays(7), "status" => "PENDING", "notes" => "Chequeo pedi?trico", "created_at" => now(), "updated_at" => now()],
        ]);
        //*
    }
}