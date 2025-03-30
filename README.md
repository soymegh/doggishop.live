Aquí tienes el paso a paso específico para levantar el proyecto **`doggishop.live`** desde el repositorio en GitHub:

---

### **Pasos para configurar el proyecto `doggishop.live`**

#### 1. **Clonar el repositorio**
```bash
git clone https://github.com/soymegh/doggishop.live.git
cd doggishop.live
```

#### 2. **Instalar dependencias con Composer**
```bash
composer install
```

#### 3. **Configurar el entorno**
- Copiar el archivo `.env.example` a `.env`:
  ```bash
  cp .env.example .env
  ```
- Generar la clave de la aplicación:
  ```bash
  php artisan key:generate
  ```
- Editar el archivo `.env` y configurar las variables de tu entorno, especialmente:
  ```ini
  DB_DATABASE=nombre_de_tu_bd
  DB_USERNAME=tu_usuario
  DB_PASSWORD=tu_contraseña
  ```

---

### **Opciones para la Base de Datos**

#### **Opción A: Usar migraciones (recomendado para desarrollo)**
```bash
php artisan migrate:fresh --seed
```
> Esto creará las tablas y llenará datos de prueba si hay seeders.

#### **Opción B: Restaurar desde backup (si existe)**
1. **Crear la base de datos manualmente** (ej. `doggishop` en MySQL/PostgreSQL).  
2. **Restaurar desde el backup** (si hay un archivo `.sql` o `.dump` en `/backupbd`):
   - **MySQL**:
     ```bash
     mysql -u root -p doggishop < backupbd/doggishop_backup.sql
     ```
   - **PostgreSQL**:
     ```bash
     psql -U postgres -d doggishop -f backupbd/doggishop_backup.sql
     ```

---

#### 4. **Configurar el storage (para imágenes y archivos)**
```bash
php artisan storage:link
```

#### 5. **Instalar dependencias frontend (si usa Node.js/Vite)**
```bash
npm install
npm run dev
```

#### 6. **Levantar el servidor local**
```bash
php artisan serve
```
> Accede en: [http://localhost:8000](http://localhost:8000).

---

### **Comandos útiles en caso de errores**
- Limpiar caché:
  ```bash
  php artisan cache:clear
  php artisan view:clear
  php artisan config:clear
  ```
- Reinstalar autoload (si hay problemas con clases):
  ```bash
  composer dump-autoload
  ```

---

### **Notas adicionales**
- Si el proyecto usa **algún servicio externo** (como Mailgun, AWS S3, etc.), configura las credenciales en `.env`.
- Si hay errores en migraciones, verifica que la versión de PHP y Laravel sean compatibles.

¿Necesitas ayuda con algún paso en particular? 😊