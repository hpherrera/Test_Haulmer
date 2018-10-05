<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# API Test_Haulmer
## Ejecución
1.- Ejecutar ejecutar en la terminal $ docker build -t my-first-image . en la carpeta del proyecto.
2.- Ejecutar en la terminal $ docker run -p 8181:8181 my-first-image .
## Metodo de uso
Utilizar postman u otra herramienta para comprobar:
Ingresar http://localhost:8181/api/ENDPOINT

### Luego de que el servicio este corriendo puede utilizar las siguientes rutas de la tabla:

| ENDPOINT | HTTP METHOD  | USA JWT | PARAMETROS DE ENTRADA
| :------------: |:---------------:| :-----:|:-----:|
| /new | POST | NO |    name, email, password |
| /login | POST |   NO |   email, password|
| /me | GET |   Sí, COMO PARAMETRO DE AUTORIZACIÓN |  TOKEN |
| /me | PUT |  Sí, COMO PARAMETRO DE AUTORIZACIÓN |  TOKEN, name, email, password  |
| /me | DELETE|  Sí, COMO PARAMETRO DE AUTORIZACIÓN|   TOKEN |
