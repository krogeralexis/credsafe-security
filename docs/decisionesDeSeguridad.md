# Decisiones de Seguridad - CredSafe

## 1. Almacenamiento de contraseñas
- Contraseña nunca se guarda en texto plano.
- Se utiliza hash para proteger datos del usuario.
- Justificación: evita que en caso de fuga, las contraseñas sean visibles.

## 2. Gestión de sesiones
- Requiere login para funciones críticas.
- Expiración de sesión tras 30 minutos de inactividad.
- Justificación: previene acceso no autorizado en dispositivos compartidos.

## 3. Validación de datos
- Sanitización de inputs para prevenir inyección SQL.
- Justificación: protege la integridad de la base de datos.

...
