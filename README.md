# 🏥 API REST - Web Semántica con Laravel

Servidor backend Laravel que proporciona una API REST con soporte JSON-LD y Web Semántica. Incluye modelos para Médicos, Pacientes, Especialidades y Citas médicas con datos estructurados siguiendo Schema.org.

**Versión:** 1.0.0  
**Framework:** Laravel 11  
**PHP:** 8.2+  
**Estado:** ✅ Listo para Desarrollo  
**Última Actualización:** 11 de diciembre de 2025

---

## 📋 Tabla de Contenidos

- [Características](#características)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Base de Datos](#base-de-datos)
- [Ejecución Local](#ejecución-local)
- [API Endpoints](#api-endpoints)
- [JSON-LD Semántico](#json-ld-semántico)
- [CORS Configuration](#cors-configuration)
- [Solución de Problemas](#solución-de-problemas)

---

## ✨ Características

✅ **API REST Completa** - Endpoints para recursos médicos  
✅ **JSON-LD & Web Semántica** - Datos estructurados con Schema.org  
✅ **Modelos Eloquent** - User, Patient, Specialty, Appointment  
✅ **Migrations** - Control de versión de base de datos  
✅ **Seeders** - Datos de prueba precargados  
✅ **CORS Habilitado** - Integración con frontend React  
✅ **Validación Robusta** - Reglas de validación por modelo  
✅ **Timestamps** - created_at y updated_at automáticos  

---

## 🔧 Requisitos

Antes de comenzar, asegúrate de tener instalados:

| Requisito | Versión Mínima | Verificar |
|-----------|-----------------|-----------|
| **PHP** | 8.2.0+ | `php --version` |
| **Composer** | 2.0.0+ | `composer --version` |
| **MySQL** | 5.7+ | `mysql --version` |
| **Git** | 2.0.0+ | `git --version` |

### Verificar instalación

```bash
php --version              # PHP 8.2 o superior
composer --version         # Composer 2.0 o superior
mysql --version            # MySQL 5.7 o superior
```

---

## 📦 Instalación

### 1. Clonar o descargar el proyecto

```bash
# Si tienes acceso a Git
git clone <repository-url>
cd pry_web_semantica/Backend

# O simplemente navega a la carpeta Backend
cd "c:\ARQUITECTURA SOFTWARE\pry_web_semantica\Backend"
```

### 2. Instalar dependencias de Composer

```bash
# Instalar todas las dependencias PHP
composer install

# O si tienes permisos restringidos
composer install --no-dev
```

### 3. Configurar archivo .env

Copiar el archivo de ejemplo:

```bash
# Copiar .env.example a .env
copy .env.example .env

# O en Linux/Mac
cp .env.example .env
```

### 4. Generar clave de aplicación

```bash
php artisan key:generate
```

---

## ⚙️ Configuración

### Variables de Entorno (.env)

Editar el archivo `.env` con tus configuraciones:

```env
# Aplicación
APP_NAME="Web Semántica API"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Base de Datos
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=web_semantica
DB_USERNAME=root
DB_PASSWORD=

# CORS (importante para React)
CORS_ALLOWED_ORIGINS=http://localhost:3000

# Caché
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync

# Mail (opcional)
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=
MAIL_PASSWORD=
```

### Configuración CORS

El archivo `config/cors.php` ya está configurado para permitir solicitudes desde React:

```php
'allowed_origins' => ['http://localhost:3000'],
'allowed_origins_patterns' => [],
'allowed_methods' => ['*'],
'allowed_headers' => ['*'],
```

Para producción, cambiar:
```php
'allowed_origins' => ['https://tudominio.com'],
```

---

## 🗄️ Base de Datos

### 1. Crear base de datos

```bash
# Opción 1: Con comando artisan (recomendado)
php artisan db:create

# Opción 2: Manualmente con MySQL
mysql -u root -p
> CREATE DATABASE web_semantica;
> exit;
```

### 2. Ejecutar migraciones

```bash
# Crear tablas en la base de datos
php artisan migrate

# Ver estado de migraciones
php artisan migrate:status

# Revertir migraciones (si es necesario)
php artisan migrate:rollback
```

### 3. Ejecutar seeders (datos de prueba)

```bash
# Llenar base de datos con datos iniciales
php artisan db:seed

# O ejecutar seeder específico
php artisan db:seed --class=DatabaseSeeder
```

### Estructura de Tablas Creadas

```
users              - Médicos
├── id
├── name
├── email
├── created_at
└── updated_at

patients           - Pacientes
├── id
├── name
├── email
├── date_of_birth
├── blood_type
├── created_at
└── updated_at

specialties        - Especialidades
├── id
├── name
├── description
├── created_at
└── updated_at

appointments       - Citas Médicas
├── id
├── doctor_id (FK)
├── patient_id (FK)
├── specialty_id (FK)
├── appointment_date
├── status
├── created_at
└── updated_at
```

---

## 🚀 Ejecución Local

### Iniciar el servidor Laravel

```bash
# Iniciar servidor de desarrollo
php artisan serve

# O especificar host y puerto
php artisan serve --host=0.0.0.0 --port=8000
```

**Servidor ejecutándose en:** http://localhost:8000

### Verificar que funciona

```bash
# En otra terminal, probar endpoints
curl http://localhost:8000/api/doctors

# O abrir en navegador
http://localhost:8000/api/doctors
```

### Otras formas de ejecutar

```bash
# Con Laravel Valet (Mac)
valet link
valet start

# Con Laravel Homestead (Windows/Mac/Linux)
vagrant up
vagrant ssh
php artisan serve

# Con Docker
docker-compose up -d
```

---

## 🔌 API Endpoints

### Base URL
```
http://localhost:8000/api
```

### Médicos (Users/Physicians)

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/doctors` | Listar todos los médicos |
| GET | `/doctors/{id}` | Obtener médico por ID |
| POST | `/doctors` | Crear nuevo médico |
| PUT | `/doctors/{id}` | Actualizar médico |
| DELETE | `/doctors/{id}` | Eliminar médico |

### Pacientes

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/patients` | Listar todos los pacientes |
| GET | `/patients/{id}` | Obtener paciente por ID |
| POST | `/patients` | Crear nuevo paciente |
| PUT | `/patients/{id}` | Actualizar paciente |
| DELETE | `/patients/{id}` | Eliminar paciente |

### Especialidades

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/specialties` | Listar todas las especialidades |
| GET | `/specialties/{id}` | Obtener especialidad por ID |
| POST | `/specialties` | Crear nueva especialidad |
| PUT | `/specialties/{id}` | Actualizar especialidad |
| DELETE | `/specialties/{id}` | Eliminar especialidad |

### Citas Médicas

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/appointments` | Listar todas las citas |
| GET | `/appointments/{id}` | Obtener cita por ID |
| POST | `/appointments` | Crear nueva cita |
| PUT | `/appointments/{id}` | Actualizar cita |
| DELETE | `/appointments/{id}` | Eliminar cita |

---

## 📋 JSON-LD Semántico

Todos los endpoints retornan datos estructurados siguiendo Schema.org:

```json
{
  "@context": "https://schema.org",
  "@type": "ItemList",
  "itemListElement": [
    {
      "@type": "Physician",
      "@id": "doctor-1",
      "name": "Dr. García",
      "email": "garcia@hospital.com"
    }
  ]
}
```

---

## 🛠️ Comandos Útiles de Artisan

```bash
# Información del servidor
php artisan serve

# Ver rutas de API
php artisan route:list --path=api

# Base de datos
php artisan migrate
php artisan migrate:rollback
php artisan db:seed

# Cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Ver logs
tail -f storage/logs/laravel.log
```

---

## 🐛 Solución de Problemas

### Error: Base de datos no existe

```bash
# Crear base de datos
mysql -u root -p
> CREATE DATABASE web_semantica;
```

### Error: CORS bloqueado desde React

```bash
# Verificar que Laravel está ejecutándose
php artisan serve

# Limpiar caché
php artisan config:clear

# Reiniciar servidor
```

### Error: Puerto 8000 en uso

```bash
# En Windows
netstat -ano | findstr :8000
taskkill /PID <PID> /F

# En Mac/Linux
lsof -ti:8000 | xargs kill -9
```

---

## ✅ Checklist Pre-Desarrollo

- [ ] Instalar PHP 8.2+
- [ ] Instalar Composer
- [ ] Instalar MySQL
- [ ] Ejecutar `composer install`
- [ ] Copiar `.env.example` a `.env`
- [ ] Generar clave: `php artisan key:generate`
- [ ] Crear base de datos
- [ ] Ejecutar: `php artisan migrate`
- [ ] Ejecutar: `php artisan db:seed`
- [ ] Iniciar: `php artisan serve`
- [ ] Probar: `curl http://localhost:8000/api/doctors`

---

**Última Actualización:** 11 de diciembre de 2025  
**Versión:** 1.0.0  
**Framework:** Laravel 11  
**Status:** ✅ Listo para Desarrollo Local

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
