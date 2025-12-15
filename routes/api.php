<?php

use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rutas para Médicos (Physicians)
Route::get('/doctors', [MedicoController::class, 'apiIndex'])->name('api.doctors.index');
Route::get('/doctors/{id}', [MedicoController::class, 'apiShow'])->name('api.doctors.show');

// Rutas para Especialidades (Medical Specialties)
Route::get('/specialties', [SpecialtyController::class, 'apiIndex'])->name('api.specialties.index');
Route::get('/specialties/{id}', [SpecialtyController::class, 'apiShow'])->name('api.specialties.show');

// Rutas para Pacientes (Patients)
Route::get('/patients', [PatientController::class, 'apiIndex'])->name('api.patients.index');
Route::get('/patients/{id}', [PatientController::class, 'apiShow'])->name('api.patients.show');

// Rutas para Citas (Appointments)
Route::get('/appointments', [AppointmentController::class, 'apiIndex'])->name('api.appointments.index');
Route::get('/appointments/{id}', [AppointmentController::class, 'apiShow'])->name('api.appointments.show');

// Ruta antigua para compatibilidad
Route::get('/medicos', [MedicoController::class, 'apiIndex']);
Route::get('/medicos/{id}', [MedicoController::class, 'apiShow']);

