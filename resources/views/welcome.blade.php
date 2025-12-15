<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }} - Web Semántica</title>
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    </head>
    <body>
        <div class="container">
            <h1>🏥 Sistema de Gestión Médica</h1>
            <p class="subtitle">Plataforma con Web Semántica (JSON-LD)</p>

            <!-- Modelos -->
            <div class="models-grid">
                <!-- Médicos -->
                <div class="model-card">
                    <div class="model-icon">👨‍⚕️</div>
                    <div class="model-name">Médicos</div>
                    <a href="{{ route('api.doctors.index') }}">Ver Listado</a>
                </div>

                <!-- Pacientes -->
                <div class="model-card">
                    <div class="model-icon">🏥</div>
                    <div class="model-name">Pacientes</div>
                    <a href="{{ route('api.patients.index') }}">Ver Listado</a>
                </div>

                <!-- Especialidades -->
                <div class="model-card">
                    <div class="model-icon">📋</div>
                    <div class="model-name">Especialidades</div>
                    <a href="{{ route('api.specialties.index') }}">Ver Listado</a>
                </div>

                <!-- Citas -->
                <div class="model-card">
                    <div class="model-icon">📅</div>
                    <div class="model-name">Citas Médicas</div>
                    <a href="{{ route('api.appointments.index') }}">Ver Listado</a>
                </div>
            </div>

            <!-- Sección de API -->
            <div class="api-section">
                <h2>📡 Endpoints de API REST</h2>
                <ul class="api-endpoints">
                    <li><span class="method">GET</span> /api/doctors - Lista de médicos</li>
                    <li><span class="method">GET</span> /api/doctors/{id} - Médico específico</li>
                    <li><span class="method">GET</span> /api/patients - Lista de pacientes</li>
                    <li><span class="method">GET</span> /api/patients/{id} - Paciente específico</li>
                    <li><span class="method">GET</span> /api/specialties - Lista de especialidades</li>
                    <li><span class="method">GET</span> /api/specialties/{id} - Especialidad específica</li>
                    <li><span class="method">GET</span> /api/appointments - Lista de citas</li>
                    <li><span class="method">GET</span> /api/appointments/{id} - Cita específica</li>
                </ul>
            </div>
        </div>
    </body>
</html>
