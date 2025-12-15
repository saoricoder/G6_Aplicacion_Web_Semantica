<div align="center">
    
## UNIVERSIDAD DE LAS FUERZAS ARMADAS ESPE  

</div>

<p align="center">
  <a href="https://www.espe.edu.ec" target="_blank">
    <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/Logo_ESPE.png" width="200" alt="Logo ESPE">
  </a>
</p>

## Proyecto:
- Resolución de Ejercicios - Arquitectura de Software
   
– Aplicación de Web Semántica (JSON-LD) en una API REST con Laravel.


## Arquitectura de Software - Grupo 6 
## Integrantes:

- Victor Villamarín
- Betty Rodríguez

## 📚 Repositorios

- **Backend (Laravel):** [G6_Aplicacion_Web_Semantica](https://github.com/saoricoder/G6_Aplicacion_Web_Semantica.git)
- **Frontend (React):** [G6_Web_Semantica_React](https://github.com/saoricoder/G6_Web_Semantica_React.git)


# 🏥 API REST - Web Semántica con Laravel

Servidor backend Laravel que proporciona una API REST con soporte JSON-LD y Web Semántica. Incluye modelos para Médicos, Pacientes, Especialidades y Citas médicas con datos estructurados siguiendo Schema.org.

**Versión:** 1.0.0  
**Framework:** Laravel 11  
**PHP:** 8.2+  
**Estado:** ✅ Listo para Producción  
**Última Actualización:** 15 de diciembre de 2025

---

## 📖 GUÍA RÁPIDA - Levantar el Proyecto Localmente

### **Requisitos Previos**

Verifica que tengas instalado:
- PHP 8.2+
- MySQL 5.7+
- Composer 2.0+
- Node.js 16+ (para frontend)

### **Pasos de Instalación**

#### **0️⃣ Clonar Repositorios desde GitHub**

```powershell
# Crear carpeta para el proyecto
mkdir pry_web_semantica
cd pry_web_semantica

# Clonar Backend (Laravel)
git clone https://github.com/saoricoder/G6_Aplicacion_Web_Semantica.git Backend

# Clonar Frontend (React) en otra carpeta
git clone https://github.com/saoricoder/G6_Web_Semantica_React.git frontend
```

---

#### **1️⃣ Backend - Laravel**

```powershell
# Ir a la carpeta Backend
cd G6_Aplicacion_Web_Semantica

# Instalar dependencias
composer install

# Copiar archivo de configuración
Copy-Item .env.example -Destination .env

# Generar clave de aplicación
php artisan key:generate

# Crear base de datos en MySQL
# Ejecuta en MySQL Workbench o terminal:
# CREATE DATABASE web_semantica CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# Ejecutar migraciones y seeders
php artisan migrate:fresh --seed

# Iniciar servidor
php artisan serve
```

**Resultado esperado:** `Local: http://127.0.0.1:8000` ✅

---

#### **2️⃣ Frontend - React**

En otra terminal:

```powershell
# Ir a la carpeta frontend
cd ../frontend

# Instalar dependencias
npm install

# Iniciar servidor de desarrollo
npm start
```

**Resultado esperado:** Se abre automáticamente en `http://localhost:3000` ✅

---

### **Verificación de que Todo Funciona**

#### Prueba Backend (API)

```powershell
# Prueba un endpoint
Invoke-WebRequest -Uri "http://127.0.0.1:8000/api/doctors" `
  -Headers @{"Accept"="application/json"} `
  -UseBasicParsing | Select-Object StatusCode
```

✅ Debe retornar `StatusCode : 200`

#### Prueba Frontend

- Abre `http://localhost:3000` en tu navegador
- Haz clic en los botones (👨‍⚕️ Médicos, 🏥 Pacientes, etc.)
- Verifica que los datos se carguen correctamente
- Revisa que aparezca el JSON-LD extraído

---

## 🔗 URLs Principales

| Recurso | URL | Descripción |
|---------|-----|-------------|
| **Frontend React** | `http://localhost:3000` | Aplicación web |
| **Backend Laravel** | `http://127.0.0.1:8000` | Servidor API |
| **Panel Inicio** | `http://127.0.0.1:8000` | Página de inicio |
| **API - Médicos** | `http://127.0.0.1:8000/api/doctors` | GET lista de médicos |
| **API - Pacientes** | `http://127.0.0.1:8000/api/patients` | GET lista de pacientes |
| **API - Especialidades** | `http://127.0.0.1:8000/api/specialties` | GET lista de especialidades |
| **API - Citas** | `http://127.0.0.1:8000/api/appointments` | GET lista de citas |

---
