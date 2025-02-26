# Próxima Película de Marvel

Una aplicación web desarrollada en PHP que muestra información sobre la próxima película o serie del Universo Cinematográfico de Marvel en tiempo real, con una interfaz elegante creada con Bootstrap.

## 📝 Descripción

Este proyecto utiliza la API pública de [WhenIsTheNextMCUFilm](https://whenisthenextmcufilm.com/api) para mostrar:
- La próxima película/serie de Marvel
- Días restantes hasta su estreno
- Fecha de lanzamiento
- Información sobre la siguiente producción (si está disponible)

El diseño está inspirado en el [video tutorial de midulive](https://www.youtube.com/watch?v=BcGAPkjt_IE).

## 🛠️ Tecnologías utilizadas

- PHP 7.4+
- HTML5
- Bootstrap 5
- CSS3
- API REST

## 📋 Requisitos previos

Para ejecutar este proyecto localmente necesitas:

- PHP 7.4 o superior
- Servidor web local (Apache, Nginx) o el servidor integrado de PHP
- Conexión a Internet (para acceder a la API)

## 🚀 Instalación y ejecución local

1. Clona este repositorio:
   ```bash
   git clone https://github.com/tu-usuario/proxima-pelicula-marvel.git
   ```

2. Navega al directorio del proyecto:
   ```bash
   cd proxima-pelicula-marvel
   ```

3. Inicia el servidor PHP integrado:
   ```bash
   php -S localhost:8000
   ```

4. Abre tu navegador y visita:
   ```
   http://localhost:8000
   ```

## 📁 Estructura del proyecto

```
proxima-pelicula-marvel/
├── index.php           # Archivo principal (HTML, CSS y PHP)
└── README.md           # Documentación
```

## 🔍 Cómo funciona

El archivo `index.php` realiza las siguientes operaciones:

1. Conexión a la API de WhenIsTheNextMCUFilm
2. Obtención de datos en formato JSON
3. Cálculo de días restantes hasta el estreno
4. Formateo de fechas
5. Verificación de información sobre la siguiente película
6. Presentación de la información con un diseño atractivo usando Bootstrap

## 🔧 Funcionalidades

- **Diseño responsivo**: Implementado con Bootstrap 5
- **Manejo de errores**: Muestra datos de ejemplo si no se puede conectar a la API
- **Seguridad**: Implementa `htmlspecialchars()` para prevenir ataques XSS
- **Efectos visuales**: Animaciones sutiles al interactuar con elementos

## 🌐 API utilizada

Este proyecto consume la API de [WhenIsTheNextMCUFilm](https://whenisthenextmcufilm.com/api), que proporciona información actualizada sobre las películas y series del UCM.

La estructura de datos incluye:
- Información de la próxima película/serie
- Array `following` con producciones futuras
- Array `previous` con producciones ya estrenadas
