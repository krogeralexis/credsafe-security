# Estructura del Proyecto - CredSafe

Este documento describe la **arquitectura y organización inicial del proyecto CredSafe**, estableciendo la base para el desarrollo del MVP y la documentación técnica.

---

## Arquitectura

Se decidió utilizar un enfoque **MVC (Modelo–Vista–Controlador) simplificado**, que permite:

- Separar la **lógica** de la **presentación** y del **control de flujos**.
- Mantener el proyecto organizado y escalable.
- Facilitar futuras mejoras sin romper funcionalidades existentes.

---

## Directorios principales

/public -Archivos accesibles desde el navegador (index.php, CSS, JS)
/app
/models - Clases que representan datos y acceso a la base de datos
/controllers - Controladores que procesan solicitudes del usuario
/views - Templates HTML para mostrar información al usuario
/config - Configuración de la base de datos y variables globales
/docs → Documentación: UML, casos de uso, decisiones de seguridad


---

## Archivos clave

- `index.php` → Punto de entrada del sistema, dirige solicitudes a los controladores correspondientes.  
- `README.md` → Descripción general del proyecto y guía de instalación.  
- `.gitignore` → Evita subir archivos sensibles como credenciales a GitHub.  

---

## Justificación de decisiones

- MVC simplificado: suficiente para un MVP educativo, sin necesidad de frameworks complejos.  
- Separación de carpetas: permite localizar rápidamente **lógica**, **presentación** y **documentación**.  
- Documentación en `/docs`: facilita la revisión de diseño, casos de uso y decisiones de seguridad.

---

## Notas adicionales

- Esta estructura puede evolucionar a medida que se incorporen nuevas funcionalidades o integrantes al proyecto.  
- Se prioriza la **claridad y mantenibilidad** por encima de optimizaciones avanzadas.
