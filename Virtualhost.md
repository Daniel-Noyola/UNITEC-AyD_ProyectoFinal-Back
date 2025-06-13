Para ejecutar un proyecto PHP en **WAMP** cuyo `index.php` está dentro de una subcarpeta `public/`, y deseas acceder a tu proyecto directamente desde `http://localhost/tu-proyecto` (sin escribir `/public`), tienes varias opciones. Aquí te muestro las más comunes y recomendadas:

### ✅ Opción 2: Configurar un Virtual Host apuntando a `/public`

Esto es la opción **profesional y correcta**, especialmente si estás trabajando con Laravel u otros frameworks que colocan su entrada en `public/`.

#### Pasos:

1. **Editar el archivo `httpd-vhosts.conf`**
   Ruta típica:

   ```
   C:\wamp64\bin\apache\apache2.x.x\conf\extra\httpd-vhosts.conf
   ```

2. **Agregar un nuevo Virtual Host**:

   ```apache
   <VirtualHost *:80>
       DocumentRoot "c:/wamp64/www/tu-proyecto"
       ServerName mi-proyecto.local
       <Directory "c:/wamp64/www/tu-proyecto">
           AllowOverride All
           Require all granted
       </Directory>
   </VirtualHost>
   ```

3. **Editar el archivo `hosts` de Windows** para registrar el nuevo dominio local:

   Abre con bloc de notas como administrador:

   ```
   C:\Windows\System32\drivers\etc\hosts
   ```

   Y añade esta línea al final:

   ```
   127.0.0.1   mi-proyecto.local
   ```

4. **Reinicia todos los servicios de WAMP**

5. Accede a tu proyecto desde:

   ```
   http://mi-proyecto.local
   ```