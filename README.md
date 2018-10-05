<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# API Test_Haulmer
## Ejecución
## Metodo de uso
### Luego de que el servicio este corriendo puede utilizar las siguientes rutas de la tabla:

| ENDPOINT | HTTP METHOD  | USA JWT | PARAMETROS DE ENTRADA
| :------------: |:---------------:| :-----:|:-----:|
| /new | POST | NO |    name, email, password |
| /login | POST |   NO |   email, password|
| /me | GET |   Sí, COMO PARAMETRO DE AUTORIZACIÓN |  TOKEN |
| /me | PUT |  Sí, COMO PARAMETRO DE AUTORIZACIÓN |  TOKEN, name, email, password  |
| /me | DELETE|  Sí, COMO PARAMETRO DE AUTORIZACIÓN|   TOKEN |
