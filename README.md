||Taller de renta de Peliculas||
-------------------------------
Realizado en UFRO 2017 para uso de laravel.

Representa una API simple de laravel, relax, todo piola.

Se pueden revisar para ver que se esta realizando, y un ejemplo de CRUD sencillo

PUNTOS A CONSIDERAR: 
-La migración de Users se creo usando php artisan:make auth. Pero se elimino el Unique de los correos por problemas del motor de la DB.
-Se añadio un CORS. Revisar para su uso como API 
-Se añadio la dependencia JWT. (No tengo idea que es. Es como un generador de Token. Probndo)

Contenido / paso a paso para crearse:

Definir Modelos:

utiliza php artisan make:model --{nombre}  para generar un modelo random