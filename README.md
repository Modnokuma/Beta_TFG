
# Beta_TFG

Este proyecto es una aplicación diseñada para gestionar entidades relacionadas con proyectos, parámetros, usuarios y unidades. Incluye funcionalidades de validación, operaciones CRUD (Crear, Leer, Actualizar, Eliminar) y pruebas automatizadas.

## Estructura del Proyecto

El proyecto está organizado en las siguientes carpetas y archivos principales.
### Carpetas y Archivos

- **`Base/`**: Contiene clases base para validaciones, mapeo de datos, controladores y servicios.
  - `Base_CONTROLLER.php`: Determina el controlador especifico basado en la variable ``variables["controlador"]``. Incluye el archivo de servicio correspondiente y si no existe utiliza ``Base_SERVICE.php``. Ejecuta las validaciones definidas en ``Base_Validations.php`` y si fallan envia el error detectado. Por ultimo instancia el servicio correspondiente y llama a la accion recibida.

  - `Base_Validations.php`: Combina las validaciones de datos y acciones para garantizar que todas las operaciones realizadas en las entidades cumplan con las restricciones definidas.
  - `Base_Action_Validations.php`: Validaciones relacionadas con acciones como añadir, editar o eliminar.
  - `Base_Data_Validations.php`: Validaciones de datos para los atributos de las entidades.

  - `Base_SERVICE.php`: Determina el modelo asociado a la entidad basándose en el controlador. Si no existe un modelo específico, utiliza el modelo ``Base_MODEL.php``. Inicia los valores de los atributos de la entidad. Proporciona metodos genéricos para realizar operaciones de base de datos y un metodo especifico para ejecutar una consulta personalizada. 

  - `Base_MODEL.php`: Extiende la clase ``Mapping`` y proporciona implementaciones específicas para las operaciones añadir, editar, eliminar, buscar y detalle en las entidades.
   - `Base_Mapping.php`: Proporciona la funcionalidad base para realizar operaciones de base de datos como **ADD, EDIT, DELETE** y **SEARCH**. Es una clase genérica que maneja la conexión a la base de datos y la ejecución de consultas SQL.

  - `MappingMysqli.php`: La clase MappingMysqli extiende la clase ``Base_Mapping`` y proporciona implementaciones específicas para realizar operaciones de base de datos utilizando **MySQLi**. Utiliza métodos como para generar dinámicamente las cláusulas where de las consultas SQL.
- **`app/`**: Contiene los controladores y las descripciones específicas para cada entidad (`parametro`, `proyecto`, `unidad`, `usuario`). En caso de que se necesitaran servicios o modelos especificos para cada entidad se añadirían dentro de esta carpeta.

- **`common/`**: Archivos de configuración y las credenciales para las bases de datos.

- **`Tests/`**: Incluye pruebas automatizadas para validar las funcionalidades del sistema.

- **`estructura.js`**: Define la estructura general de las entidades y sus reglas de validación.

- **`index.php`**: Punto de entrada principal para manejar las solicitudes HTTP.

- **`dani_tfg_bd.sql`**: Script SQL para la creación y configuración de la base de datos.

- **`test_bd.sql`**: Script SQL para la creación de la base de datos de pruebas.

- **`test.php`**: Archivo que ejecuta todas las validaciones del sistema para comprobar su correcto funcionamiento.

### Descripción de la estructura de las entidades
El archivo **`estructura.js`** define la estructura general de las entidades del sistema, incluyendo sus atributos y reglas de validación. Este archivo es esencial para garantizar la consistencia en la gestión de datos y la validación de las entidades.
#### Definición de los atributos
Cada entidad tiene una lista de atributos que define los campos que la componen. Los atributos incluyen configuraciones específicas que indican si:

- Es una clave primaria (pk).
- Es un valor autoincremental (autoincrement).
- Que tipo de valor guarda (type).
- Permite un valor nulos (not_null).
- Tiene valores predeterminados (default_value).

#### Reglas de validación
Cada atributo puede tener reglas de validación específicas para sus diferentes acciones (ADD, EDIT, SEARCH, DELETE) como:

- Tamaño mínimo y máximo (min_size, max_size).
- Formato utilizando expresiones regulares (exp_reg).
- Validaciones personalizadas (personalized).
- Validaciones específicas para archivos, indicando su tipo (file_type) y su tamaño máximo (max_size_file).

## Requisitos

- **Servidor Web**: Apache o similar.
- **Base de Datos**: MySQL/MariaDB.
- **PHP**: Versión 7.4 o superior.
- **Extensiones PHP**: MySQLi.

## Instalación

1. Clona este repositorio en tu servidor local:
   ```bash
   git clone https://github.com/tu_usuario/Beta_TFG.git
  
2. Configura la base de datos: 
- Importa el archivo ``dani_tfg_bd.sql`` en tu servidor MySQL.

3. Configura las credenciales de la base de datos en common/credentialsDB.php:
```php
<?php
define('host', 'localhost');
define('userbd', 'tu_usuario');
define('passuserbd', 'tu_contraseña');
define('bd', 'nombre_base_datos');
```

4. Asegúrate de que el servidor web tenga acceso a los archivos del proyecto.

5. Accede al proyecto desde tu navegador:
 ``http://localhost/Proyectos/Beta_TFG/index.php``

## Funcionalidades

- **CRUD**: Operaciones básicas para entidades como usuario, parametro, proyecto y unidad.
- **Validaciones**: Validaciones personalizadas para datos y acciones.
- **Pruebas Automatizadas**: Ejecución de pruebas para garantizar la integridad del proyecto.

## Ejecución de Pruebas
1. Configura la base de datos de pruebas en `common/credentialsDB.php`:
```php
<?php
define('bd_testing', 'nombre_base_datos_pruebas');
define('user_testing', 'usuario_pruebas');
define('pass_testing', 'contraseña_pruebas');
```
2. Ejecuta el archivo `test.php` desde el navegador o la linea de comandos.
