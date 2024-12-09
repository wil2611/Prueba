# Wellezy - Sistema de Reservas de Vuelos

Este proyecto es una plataforma de reservas de vuelos que permite a los usuarios buscar aeropuertos, buscar vuelos y hacer reservas, utilizando un backend en **Laravel** y un frontend desarrollado con **React**. La aplicación también interactúa con APIs externas para obtener información sobre vuelos y aeropuertos.

## Estructura del Proyecto

### Backend (API)

El backend está construido en **Laravel** y proporciona una API para interactuar con el frontend. Permite gestionar aeropuertos, vuelos y reservas.

#### **app/**

- **`Http/Controllers/Api/`**:
  - **`FlightController.php`**: Controlador que maneja las peticiones relacionadas con vuelos, como la búsqueda de vuelos o la creación de reservas.
  - **`AirportController.php`**: Controlador que gestiona las peticiones de aeropuertos, como la búsqueda de aeropuertos por código de ciudad.

- **`Http/Requests/`**: Contiene las clases de validación para las solicitudes HTTP, asegurando que los datos enviados sean correctos antes de ser procesados.

- **`Models/`**:
  - **`Flight.php`**: Modelo que representa un vuelo en la base de datos, con las propiedades como la ciudad de salida, llegada, horario y precio.
  - **`Itinerary.php`**: Modelo que representa un itinerario de vuelo dentro de una reserva.
  - **`Reserve.php`**: Modelo que representa una reserva de vuelo, incluyendo los detalles de los vuelos, itinerarios y pasajeros asociados.

- **`Services/`**:
  - **`ApiService.php`**: Servicio que interactúa con las APIs externas (por ejemplo, para obtener información sobre vuelos y aeropuertos). Este servicio maneja la lógica de negocio relacionada con la comunicación API.

- **`Providers/`**:
  - **`RouteServiceProvider.php`**: Proveedor de rutas que configura y define las rutas de la aplicación.

#### **config/**

- **`cors.php`**: Archivo de configuración de CORS (Cross-Origin Resource Sharing), que permite que el frontend (que puede estar en un dominio diferente) haga solicitudes al backend.
- **`database.php`**: Configuración de la base de datos, que incluye parámetros como el tipo de base de datos (MySQL), credenciales y otros ajustes de la conexión.

#### **database/**

- **`migrations/`**:
  - **`2023_08_01_create_flights_table.php`**: Migración para crear la tabla de vuelos en la base de datos.
  - **`2023_08_01_create_itineraries_table.php`**: Migración para crear la tabla de itinerarios en la base de datos.

#### **.env**

- **`variables de entorno`**: Este archivo contiene las configuraciones sensibles como las claves de las APIs externas, credenciales de la base de datos y otros valores que no deben ser compartidos públicamente. Se utiliza para configurar el entorno de desarrollo, pruebas y producción.

### Frontend (React)

El frontend está desarrollado con **React**, y proporciona una interfaz de usuario amigable para interactuar con la API de backend. Los usuarios pueden buscar vuelos y crear reservas a través de un formulario de búsqueda y una tabla de resultados.

#### Estructura del Frontend:

##### **components/**

Contiene los **componentes reutilizables** de la aplicación, que se pueden usar en varias páginas o secciones:

- **`FlightsTable.jsx`**: Componente que muestra una tabla con los vuelos disponibles después de realizar una búsqueda.
- **`Home.jsx`**: Página principal de la aplicación que incluye información introductoria y enlaces a las secciones clave.
- **`Navbar.jsx`**: Barra de navegación que permite a los usuarios navegar entre las diferentes páginas del sitio.
- **`PassengerForm.jsx`**: Formulario donde los usuarios ingresan la información de los pasajeros para completar una reserva.
- **`ReservationSuccess.jsx`**: Página que se muestra cuando una reserva ha sido completada exitosamente.
- **`SearchForm.jsx`**: Formulario de búsqueda de vuelos donde los usuarios pueden seleccionar ciudades, fechas y el número de pasajeros.
- **`SearchIata.jsx`**: Componente utilizado para buscar vuelos por código IATA de los aeropuertos.

##### **services/**

Contiene los **servicios** que gestionan las interacciones con la API y organizan la lógica de negocio:

- **`api.js`**: Archivo que maneja las peticiones HTTP al backend y otras APIs. Aquí se gestionan todas las llamadas a los servicios de vuelos y aeropuertos.
  
  Dentro de esta carpeta, también se encuentra la carpeta **controllers/**, que contiene los controladores encargados de la lógica de las peticiones API:

- **`flightService.js`**: Controlador que contiene la lógica para interactuar con la API de vuelos, incluyendo la búsqueda de vuelos y la creación de reservas.
- **`iataService.js`**: Controlador que gestiona las peticiones relacionadas con los códigos IATA de aeropuertos, permitiendo realizar búsquedas por estos códigos.

##### Archivos adicionales:

- **`App.js`**: Componente principal que organiza la estructura global de la aplicación y gestiona las rutas hacia las diferentes páginas.
- **`index.js`**: El punto de entrada de la aplicación, donde se renderiza el componente `App` y se conecta a la raíz del DOM.


#### Tecnologías Utilizadas:
- **Backend:** Laravel
- **Frontend:** React
- **Base de datos:** MySQL
- **API externa:** APIs para obtener información de vuelos y aeropuertos

## Instalación

### Requisitos
- **PHP >= 8.0**
- **Composer**
- **Node.js >= 14.x**
- **NPM o Yarn**

### Instalación del Backend (Laravel)

1. Clonar el repositorio:

    ```bash
    git clone https://github.com/tuusuario/wellezy-backend.git
    cd wellezy-backend
    ```

2. Instalar las dependencias:

    ```bash
    composer install
    ```

3. Configurar las variables de entorno en el archivo `.env`:

    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=usuario_de_tu_base_de_datos
    DB_PASSWORD=contraseña_de_tu_base_de_datos
    ```

4. Ejecutar las migraciones para crear las tablas necesarias:

    ```bash
    php artisan migrate
    ```

5. Iniciar el servidor de Laravel:

    ```bash
    php artisan serve
    ```

El backend estará disponible en `http://localhost:8000`.

### Instalación del Frontend (React)

1. Clonar el repositorio:

    ```bash
    git clone https://github.com/tuusuario/wellezy-frontend.git
    cd wellezy-frontend
    ```

2. Instalar las dependencias:

    ```bash
    npm install
    # o
    yarn install
    ```

3. Iniciar el servidor de desarrollo:

    ```bash
    npm start
    # o
    yarn start
    ```

El frontend estará disponible en `http://localhost:3000`.


