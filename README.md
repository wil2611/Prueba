# Wellezy - Sistema de Reservas de Vuelos

Este proyecto es una plataforma de reservas de vuelos que permite a los usuarios buscar aeropuertos, buscar vuelos y hacer reservas, utilizando un backend en **Laravel** y un frontend desarrollado con **React**. La aplicación también interactúa con APIs externas para obtener información sobre vuelos y aeropuertos.

## Estructura del Proyecto

### Backend (API)

El backend está construido en **Laravel** y proporciona una API para interactuar con el frontend. Permite gestionar aeropuertos, vuelos y reservas.

#### Características del Backend:
- **Aeropuertos:** Obtiene información de los aeropuertos según el código de la ciudad.
- **Vuelos:** Realiza búsquedas de vuelos según parámetros como ciudades, número de pasajeros y clase de vuelo.
- **Reservas:** Permite la creación de reservas de vuelos con los detalles de los pasajeros e itinerarios.

#### Endpoints:
- **GET /api/airports:** Obtiene los aeropuertos por código de ciudad.
- **POST /api/flights:** Busca vuelos según los parámetros especificados.
- **POST /api/reservations:** Crea una nueva reserva de vuelo.

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

## Uso

- Visita la página principal para obtener información sobre el sistema y acceder a la búsqueda de vuelos.
- En la página de búsqueda de vuelos, selecciona tus ciudades de salida y llegada, número de pasajeros y otros parámetros, y presiona el botón para obtener los resultados.
- Una vez que encuentres el vuelo adecuado, puedes realizar una reserva proporcionando los detalles de los pasajeros.

## Contribución

1. Haz un fork del repositorio.
2. Crea una rama para tu funcionalidad (`git checkout -b feature/nueva-funcionalidad`).
3. Haz commit de tus cambios (`git commit -am 'Añadir nueva funcionalidad'`).
4. Empuja los cambios a tu rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un pull request.

## Licencia

Este proyecto está bajo la Licencia MIT - consulta el archivo [LICENSE](LICENSE) para más detalles.

---

Este README cubre tanto el backend como el frontend de tu proyecto. Si necesitas realizar algún cambio o agregar más detalles, no dudes en decirme. ¡Buena suerte con tu proyecto!
