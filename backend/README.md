# API Gestión de Clientes - Fintech Solutions

Servicio backend RESTful desarrollado para el Sprint 1 de la plataforma **Fintech Solutions S.A.**

## Integrantes

- Diego Abaroa
- Claudio Ramos

## Especificaciones Técnicas

| Componente | Detalle |
|---|---|
| Framework | Laravel 11 |
| Entorno | Docker (Nginx, PHP-FPM, MySQL) |
| Puerto de Servicio | 8080 |

---

## Configuración del Entorno

### 1. Inicialización de Contenedores

Desde el directorio `backend`, levantar los servicios en modo desacoplado:

```bash
docker compose up -d
```

### 2. Persistencia de Datos

Ejecutar las migraciones para inicializar la estructura de la base de datos MySQL y la tabla `clientes`:

```bash
docker compose exec app php artisan migrate
```

---

## Documentación de Endpoints

**Base URL:** `http://localhost:8080/api/v1`

| Acción | Método | Endpoint | Código de Estado |
|---|---|---|---|
| Listar clientes | `GET` | `/clientes` | `200 OK` |
| Crear cliente | `POST` | `/clientes` | `201 Created` |
| Detalle de cliente | `GET` | `/clientes/{id}` | `200 OK` / `404 Not Found` |

---

## Validaciones e Integridad

- **Campos obligatorios:** Todos los campos del esquema son requeridos: `rut`, `nombre`, `apellido`, `email`, `telefono`.
- **Restricciones de unicidad:** El sistema valida la duplicidad de `rut` y `email`.
- **Manejo de errores:** En caso de fallos de validación, la API retorna `422 Unprocessable Entity` con el detalle de los campos afectados.

---

## Pruebas de Integración

Se incluye el archivo `EVA2_ABAROA.postman_collection.json` en la raíz del proyecto. Este recurso contiene los casos de prueba para flujos exitosos y manejo de excepciones de validación.
