### Evaluar Contraseña
**Actor principal:** Usuario  
**Descripción:** Permite al usuario ingresar una contraseña y recibir una evaluación de su seguridad.  
**Precondición:** El usuario debe haber iniciado sesión.  
**Flujo principal:**
1. Usuario accede al formulario de evaluación.  
2. Ingresa la contraseña a evaluar.  
3. Sistema calcula nivel de riesgo y genera un puntaje de seguridad.  
4. Sistema automáticamente genera un reporte de seguridad con los resultados y recomendaciones básicas.  
5. Sistema muestra el resultado al usuario.
**Flujos alternativos:**
- Si el usuario ingresa un valor vacío, el sistema muestra un mensaje de error.

### Ver Historial de Reportes
**Actor principal:** Usuario  
**Descripción:** Permite al usuario consultar reportes que ya fueron generados previamente.  
**Precondición:** El usuario debe haber iniciado sesión.  
**Flujo principal:**
1. Usuario accede a la seccion de historial.  
2. Sistema recupera todos los reportes asociados al usuario desde la Base De Datos.  
3. Sistema muestra una lista con los reportes de manera legible con fecha, nivel de riesgo y recomendaciones.  
4. Usuario puede seleccionar un reporte específico para ver detalles.
**Flujos alternativos:**
- Si el usuario no tiene reportes previos , el sistema muestra un mensaje indicando historial vacio.
- Error en la carga de datos , el sistema muestra error o reintentar.

### Registrarse
**Actor principal:** Usuario  
**Descripción:** Permite a un usuario crear una cuenta en el sistema proporcionando correo electrónico y contraseña. Garantiza que solo usuarios con cuentas válidas puedan usar funciones protegidas.  
**Precondición:** El usuario no debe estar registrado previamente con el mismo correo.  
**Flujo principal:**
1. Usuario accede al formulario de registro.
2. Ingresa correo y contraseña.
3. Sistema valida que el correo no exista en la base de datos y que la contraseña cumpla criterios los de seguridad.
4. Sistema almacena los datos de manera segura y confirma la creación de la cuenta.
5. Usuario puede iniciar sesión con las nuevas credenciales.
**Flujos alternativos:**
- Correo ya registrado → sistema muestra mensaje de error.
- Contraseña no cumple requisitos → sistema muestra advertencia y no permite registrar.

---

### Login
**Actor principal:** Usuario  
**Descripción:** Permite al usuario autenticarse en el sistema usando correo y contraseña. Solo usuarios registrados pueden iniciar sesión.  
**Precondición:** El usuario ya se registró previamente y tiene credenciales válidas.  
**Flujo principal:**
1. Usuario ingresa correo y contraseña en el formulario de login.
2. Sistema valida las credenciales de manera segura.
3. Si son correctas, el sistema inicia la sesión y redirige al usuario a la página principal / panel de usuario.
**Flujos alternativos:**
- Credenciales incorrectas → sistema muestra mensaje de error y permite reintento.
- Usuario olvidó contraseña → sistema ofrece opción de recuperación (si aplica).

---

### Logout
**Actor principal:** Usuario  
**Descripción:** Permite al usuario finalizar su sesión activa en el sistema, asegurando que otros no puedan acceder a su cuenta desde el mismo dispositivo.  
**Precondición:** El usuario debe haber iniciado sesión previamente.  
**Flujo principal:**
1. Usuario selecciona la opción “Cerrar sesión” en el menú del sistema.
2. Sistema termina la sesión del usuario y limpia datos de autenticación temporales.
3. Sistema redirige al usuario a la página de login o página pública.
**Flujos alternativos:**
- Si la sesión ya expiró, el sistema simplemente redirige al login sin error visible.
