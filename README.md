# CredSafe

CredSafe es un sistema web orientado a la **evaluación de seguridad de credenciales**, enfocado en la concientización sobre malas prácticas comunes y la aplicación de principios básicos de ciberseguridad.

El objetivo del proyecto es educativo: analizar configuraciones inseguras relacionadas con contraseñas y generar reportes claros que ayuden al usuario a comprender los riesgos y cómo mitigarlos.

---

## Contexto y motivación

El uso de contraseñas débiles y la reutilización de credenciales siguen siendo una de las principales causas de incidentes de seguridad.  
CredSafe nace como una herramienta simple para demostrar cómo pueden evaluarse estas prácticas desde un enfoque defensivo, sin realizar ataques reales ni pruebas intrusivas.

El proyecto prioriza el diseño del sistema, la seguridad en el manejo de datos y la documentación técnica.

---

## Alcance del proyecto

### Incluye
- Registro y autenticación segura de usuarios
- Evaluación de fortaleza de contraseñas
- Generación de reportes de seguridad
- Historial de reportes por usuario
- Persistencia de datos con modelo relacional

---

## Funcionalidades principales

- Autenticación de usuarios con almacenamiento seguro de credenciales
- Análisis de contraseñas basado en criterios de seguridad
- Clasificación del nivel de riesgo (bajo, medio, alto)
- Generación de reportes con detalles y recomendaciones
- Registro de eventos relevantes para seguridad (por ejemplo, intentos de login)

---

## Enfoque de seguridad

CredSafe fue diseñado priorizando buenas prácticas básicas de ciberseguridad, entre ellas:

- Almacenamiento de contraseñas utilizando hash
- Evitar el almacenamiento de información sensible innecesaria
- Prevención de vulnerabilidades comunes como inyección SQL
- Manejo controlado de errores para evitar exposición de información
- Gestión básica de sesiones

El sistema se centra en **concientización y prevención**, no en explotación.

---

## Diseño del sistema

Antes de la implementación se realizó un diseño previo del sistema, documentado mediante:

- Modelo Entidad–Relación (conceptual y lógico)
- Diagramas UML (casos de uso, clases y secuencia)
- Documento de decisiones de diseño y seguridad

Toda la documentación se encuentra en el directorio `/docs`.

---

## Modelo de datos

El modelo de datos está basado en un enfoque relacional simple:

- Un usuario puede generar múltiples reportes de seguridad
- Un reporte no puede existir sin un usuario asociado
- Los detalles de un reporte dependen directamente del reporte
- Los eventos de autenticación se registran como entidades independientes

Este diseño busca mantener integridad referencial y minimizar riesgos de seguridad.

---

## Documentación

La documentación del proyecto incluye:

- Modelo Entidad–Relación
- Diagramas UML
- Especificación de requisitos
- Justificación de decisiones de seguridad

Ver el directorio `/docs` para más información.

---

## Tecnologías utilizadas

- Backend: PHP
- Base de datos: MySQL
- Frontend: HTML, CSS, JavaScript
- Documentación: UML, diagramas ER

---

## Limitaciones y trabajo futuro

CredSafe es un proyecto de alcance reducido.  
Algunas posibles mejoras futuras incluyen:

- Ampliar los criterios de evaluación de seguridad
- Mejorar la visualización de reportes
- Implementar controles adicionales de seguridad
- Extender el sistema para trabajo colaborativo

---

## Estado del proyecto

Proyecto en desarrollo activo con alcance definido y enfoque educativo.
