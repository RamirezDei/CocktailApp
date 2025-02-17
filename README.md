Seguir estos pasos para configurar y ejecutar el proyecto.

1. Clonar el repositorio

git clone https://github.com/tu-usuario/tu-repositorio.git](https://github.com/RamirezDei/CocktailApp.git
cd tu-repositorio

2. Instalar dependencias de PHP con Composer

composer install

3. Instalar dependencias de Node.js con NPM

npm install
npm run dev

4. Generar el archivo de entorno

cp .env.example .env

Configura el archivo .env con los datos correctos para tu base de datos y otras variables necesarias.

5. Generar la clave de la aplicación

php artisan key:generate

6. Ejecutar migraciones

php artisan migrate

Esto creará las tablas en la base de datos.

7. Construir los assets del frontend

npm run build

8. Iniciar el servidor de desarrollo

php artisan serve

La aplicación estará disponible en http://127.0.0.1:8000
