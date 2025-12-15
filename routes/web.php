<?php

use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// =====================================================
// RUTAS DE LA API - Web Semántica
// =====================================================

// Rutas para Médicos (Physicians)
Route::get('/api/doctors', [MedicoController::class, 'apiIndex'])->name('api.doctors.index');
Route::get('/api/doctors/{id}', [MedicoController::class, 'apiShow'])->name('api.doctors.show');

// Rutas para Especialidades (Medical Specialties)
Route::get('/api/specialties', [SpecialtyController::class, 'apiIndex'])->name('api.specialties.index');
Route::get('/api/specialties/{id}', [SpecialtyController::class, 'apiShow'])->name('api.specialties.show');

// Rutas para Pacientes (Patients)
Route::get('/api/patients', [PatientController::class, 'apiIndex'])->name('api.patients.index');
Route::get('/api/patients/{id}', [PatientController::class, 'apiShow'])->name('api.patients.show');

// Rutas para Citas (Appointments)
Route::get('/api/appointments', [AppointmentController::class, 'apiIndex'])->name('api.appointments.index');
Route::get('/api/appointments/{id}', [AppointmentController::class, 'apiShow'])->name('api.appointments.show');

// Ruta antigua para compatibilidad
Route::get('/api/medicos', [MedicoController::class, 'apiIndex'])->name('api.doctors.index');
Route::get('/api/medicos/{id}', [MedicoController::class, 'apiShow'])->name('api.doctors.show');

// =====================================================
// RUTAS WEB TRADICIONALES
// =====================================================

Route::resource('medicos', MedicoController::class);
