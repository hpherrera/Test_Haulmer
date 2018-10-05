<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# API Test_Haulmer
## Ejecución

Run y build imagen de docker

		$ docker build -t my-first-image .
		$ docker run -p 8181:8181 my-first-image
    
## Metodo de uso
Utilizar postman u otra herramienta para comprobar:

Ingresar localhost:8181/api/{ENDPOINT}

Los ENDPOINT se describen en la siguiente tabla.

### Luego de que el servicio este corriendo puede utilizar las siguientes rutas de la tabla:

| ENDPOINT | HTTP METHOD  | USA JWT | PARAMETROS DE ENTRADA
| :------------: |:---------------:| :-----:|:-----:|
| /new | POST | NO |    name, email, password |
| /login | POST |   NO |   email, password|
| /me | GET |   Sí, COMO PARAMETRO DE AUTORIZACIÓN |  TOKEN |
| /me | PUT |  Sí, COMO PARAMETRO DE AUTORIZACIÓN |  TOKEN, name, email, password  |
| /me | DELETE|  Sí, COMO PARAMETRO DE AUTORIZACIÓN|   TOKEN |
