Informe de Infraestructura Backend - Evaluación 1

Diego Abaroa


1. Arquitectura de la Solución (Fase 2)
1.1 Diagrama de Componentes (IL 1.1.1)
La solución se basa en una arquitectura de microservicios orquestada mediante Docker Compose (Laravel Sail), siguiendo el flujo de datos:
Cliente Externo (Postman) ➡️ Servidor Web (Nginx) ➡️ Entorno de Ejecución (PHP 8.x) ➡️ Framework (Laravel 11) ➡️ Motor de Base de Datos (MySQL 8.0)

1.2 Descripción del Flujo de Peticiones (IL 1.1.2)
El ciclo de vida de una solicitud en este ecosistema se define mediante las siguientes etapas críticas:

Petición HTTP: El cliente emite un request (GET) hacia el host local.

Capa de Transporte: Docker mapea el puerto 80 del host hacia el contenedor de la aplicación.

Encaminamiento (Routing): El Kernel de Laravel intercepta la petición y la deriva al controlador de salud (Health Check).

Respuesta Estructurada: El sistema procesa la solicitud y retorna una carga útil en formato JSON con código de estado 200 OK.