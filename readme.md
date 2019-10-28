# App Service


Servicio de cotización 




Realizado con lumen 6.x para más detalles ir a la documentación oficial.
https://lumen.laravel.com/docs/6.x




## Indice
-   [Requisitos](#requisitos)
-   [Instalación](#instalación)
-   [Scripts](#scripts)
-   [Arquitectura](#arquitectura)
    -   [Estructura de carpetas](#estructura-de-carpetas)


## Requisitos
-   Docker


## Instalación


- Crear Imagen:
```
docker build . -t lumen-app
```
- Crear y levantar el contenedor:
```
docker run -d -p 80:80  -v $(pwd)/app:/usr/src/app --name lumen-app-1 lumen-app
```
- Instalar dependencias de composer:
```
docker exec -it lumen-app-1 composer install
```


*Listo!, el servicio está funcionando en tu `localhost`* 


## Scripts


- Formatear código:
```
docker exec -it lumen-app-1 composer lint-fix
```


- Probar formateo de código sin formatearlo (útil para CLI):
```
docker exec -it lumen-app-1 composer lint
```


## Arquitectura


La arquitectura utilizada está basada en los fundamentos de "clean arquitecture", apoyándose directamente en el patrón de puertos y adaptadores.


Algunas ventajas y razones de la cual se eligió la siguiente arquitectura son:

- Independencia del framework.

- Independencia de la base de datos.

- Más tolerantes al cambio.

- Calidad de software: Ya que aplicamos las buenas practicas y principios SOLID.

- Reutilización: La utilización de comandos nos provee reutilizarlos en cualquier caso.

- Mantenibilidad: Es más fácil localizar lo que está fallando.

- Testeabilidad: La separación por capas nos brinda un sistema fácilmente testeable de forma unitaria, permitiendo mockear las dependencias.


### Estructura de carpetas
```
+-- readme.md // <--- Your are here
+-- dockerfile
+-- app
|   ..lumens-default-folders
|   +-- src
|       +-- application
|       +-- infrastructure
|       +-- domain
```
Dentro del directorio `/app` tendremos todos los ficheros de nuestro proyecto, se respeta la estructura de carpeta que trae por defecto `lumen 6.x`, sin embargo agregaremos un directorio `src` donde tendremos nuestra lógica de negocio.

- **`src/application`** : Están todas las acciones que puede hacer nuestra aplicación, Commands y Handlers.

- **`src/infrastructure`** : En este directorio de infraestructura van todas las conexiones de nuestra aplicacion al framework, paquete o cualquier servicio de terceros.

- **`src/domain`** : El directorio dominio es el núcleo del sistema y establece como deben comunicarse las demás capas (application, infrastructure) con ella. Es la única que no tiene acoplamientos de las otras capas.
