<h1>Aprendiendo Laravel con el curso de Coders Free</h1>

## Clase 1 a 3 
* Todo lo que el usuario va en la carpeta public. Esta carpeta sería el unico punto de acceso.

* Las rutas de acceso se guardan en /routes/web.php y podemos controlar desde que urls el usuario puede acceder a nuestro programa.

* Podemos enviar variables por las rutas, las que yo quiera.

* Las variables se leen de arriba hacia abajo, así que si una ruta que toma variables en la url se encuentra arriba de otra que no lo hace y tiene la misma sintaxis, la segunda será inaccesible para el usuario.

* El archivo web.php debe limitarse solo a recibir urls y no hacer controles en el mismo, los controles se hacen en otro archivo.

* Los controladores de las peticiones del HTTP del usuario se encuentran en /app/Http/Controllers/controller.php

* Tambien se puede crear desde la terminal con el comando php artisan make:controller <Nombre>

* En versiones anteriores, el archivo providers.php tenía un namespace que guardaba los controladores. (Investigar si lo piden en el trabajo).



## Clase 4 Devolver rutas en las peticiones del usuario
- Las vistas son guardadas en /resources/views/
- Para mandar las vistas utilizo el metodo view en el return.

### Blade ###
- Blade es un sistema de plantillas de laravel en el que se coloca la estructura con el contenido comun de todas las paginas.

- Dentro de la plantilla, en los lugares a reemplazar cosas:
	@yield('<name>')

- En los archivos que van a heredar de la plantilla, ponemos:
	@extends('<ubicacion>')
Dentro de los mismos, para reemplazar el contenido de los yield, debemos poner:
	@section('<name>')

Si hay variables:
	@section('<name>', <algo>)

Si quiero algo complejo:
	@section('<name>')
	\\
	@endsection()

## Clase 5 Conexion a bases de datos ## 
- La informacion de la base de datos se encuentra dentro del archivo 	config/database.php
Dentro del mismo esta especificado a que base de datos me voy a conectar. La mayoria de las credenciales estan en el archivo 	.env 	almacenado en forma de parametros 	nombre=valor
El mismo se ignorara al hacer el commit.

- Las migraciones se hacen mediante artisan.	php artisan migrate

- Para crear una migracion 	php artisan make:migration <NAME>

- Para revertir los cambios de una migración, escribo
	php artisan migrate:rollback

- Para hacer cambios en las tablas ya migradas, debo usar	php artisan make:migration add_<columna>_to_<tabla>_table.

- Para cambiar las propiedades de la columnas revisar la documentación, en la parte de migraciones



## Eloquent ORM ##
- Investigar sobre las convenciones de eloquent
- El modelo está con su primera letra en mayuscula en sigular y la tabla en minusculas en plural
- Se puede acceder a Eloquent mediante php artisan tinker

- Si el objeto creado desde tinker no tiene id, el metodo save() crea uno y lo guarda. Sino lo actualiza.

- php artisan migrate:reset elimina todas las tablas creadas anteriormente


## Clase 6 Seeders ## 
- Los seeders generan datos aleatorios para registros en las bases de datos cuando la migramos.

- Los seeders establecen datos por defecto para los registros migrados de la base de datos. Se utilizan usando 		php artisan db:seed

- Las factorys deben estar modularizados, cada tabla debe tener su propios seeder.


### Factorys ###
- Generan los datos de los seeders.

- En versiones anteriores a laravel 8, los factorys no eran una clase, se tenian que ejecutar de otra manera.



## Clase 7 Eloquent ##
- Eloquent es un ORM que nos permite interactuar con la base de datos sin escribir consultas SQL.

-Las consultas de eloquent funcionan como las consultas sql
	User::where('name','like','% jhon %')->get();




## Clase 8 Manejo de información ##
- Si el formulario envia datos a un url que tiene un nombre igual al de otro archivo, estos se diferenciaran mediante el metodo de acceso a la ruta, como get, post, put, etc.

- Cada vez que envio un dato por el método post, laravel exige que envie un token junto con el formulario, por razones de seguridad.

- Para obtener el contenido, el controlador encargado de procesar los datos del formulario debe tener un parametro del tipo Request.	controller(Request $req)

- Los datos del formulario son enviados en formato JSON y almacena un token y los datos de los inputs que tienen name

- Para validar los request hechos en un formulario, lo hago desde el controlador con el metodo validate, el mismo intercepta el flujo del programa para verificar que los datos ingresados son validos.


- El método old(<campo>) devuelve el ultimo valor del campo especificado como parametro, sirve para que los inputs recuerden el ultimo valor ingresado, así cuando se recargue la página, el valor siga escrito.

- Recordar el uso de @error(<campo>) ... @enderror


- Los roles y permisos se manejan desde un handler de request, se crean con 	
	php artisan make:request StorePostRequest


## Clase 9 Asignación masiva ##

- Para poder agregar masivamente mediante la linea $curso = Curso::create($request->all());
Debo agregar una propiedad	protected $fillable = []; con los campos que deseemos guardar en cada objeto.

- Tambien podemos crear una variable con la propiedad 	protected $guarded = []; 	con las propiedades que deseemos que sean inaccesibles por el usuario. Con esta propiedad, eloquent guardaría todos los campos del registro, menos la propiedad puesta en el arreglo, para evitar inyecciones SQL u otros tipos de hacking.
Tambien podría poner el arreglo vacío, de igual manera nos permitiría guardar los datos en la base de datos y evitaríamos que el usuario agregue campos inexistentes.



## Clase 10 direccionamiento ##

- Si intento pasar desde un boton información al servidor, este se enviará con el metodo get, sin embargo si lo hago dentro de un form, puedo elegir por cual metodo se pasara la información.

- Siguiendo las convenciones de laravel, con el comando Route::resource();	Se puede generar automaticamente todas las rutas.

- Para cambiar la palabra de una url, buscar en la documentación en el articulo de controller, en la sección de 		# Localizing Resource URIs


- Para cambiar la palabra principal de la url en todas las rutas, debo agregar el metodo 	->names() A la ruta de los accesos.

- Para hacer que las url sean mas amigables, debo sobreescribir el metodo getRouteKeyName() en la clase del modelo que estemos utilizando, retornando dentro de está funcion el campo de la tabla que querramos que aparezca en el url.

- El método view se utiliza solo para mostrar contenido estatico.

## Clase 11 Utiles ##

- Laravel es apto para cualquier proveedor de servidores smtp.

- Laravel está configurado para conectarse con ciertos proveedores basados en APIs, mirar la documentación.

- Debo cambiar la configuración de los mails en el archivo .env antes de que funcione el enviar correos.



## Clase 12 Componentes ##
- Los componentes son porciones de codigo que se repiten a lo largo de una web.

- Un ejemplo de componente son lon cards que muestran porciones de codigo.

- Para llamar a la hoja de estilos de Tailwind, lo hacemos mediante el método asset('css/app.css')	el cual accede a la carpeta public, enviandolo como parametro la posición relativa respecto a dicha carpeta.

- Los componentes anonimos son aquellos que se crean sin tener una clase que sirve como modelo del mismo. No se crean atravez de artisan, sino que los creo yo mismo dentro de la carpeta de componentes en las vistas del proyecto. Los mismos no pueden tener metodos, solo propiedades mediante la directiva @props([])

- Los componentes de clase pueden tener métodos definidos en sus propias clases.

- Los componentes dinamicos sirven para poder elegir desde el codigo o de forma dinamica que componente se va a renderizar en pantalla.

- En la versión 7 para atras, debemos extender (Usar @yield y @content) el contenido de app.blade.php mediante el sistema de plantillas de blade. A partir de la versión 8, este archivo se llama como si fuera un componente, o sea, utiliza los slots.

- El atributo 	defer	sirve para ubicar la etiqueta al final del body.

- Dentro de un componente, el slot principal es todo aquello que esté entre las etiquetas	<x-...></x-...>		y no tenga nombre, lo que tenga nombre será un slot con nombre.

- Para cambiar los archivos de JetStream, debería publicarlos antes, buscar en la documentación Jetstream el comando necesario para hacerlo.


## Clase 13 Middleware ##

- Un Middleware es un filtro que se le aplica a las rutas, el cual muestra la página si se cumple una condición especificada en el mismo, en caso de que se cumpla la condición, nos envia a la página deseada, en caso contrario nos redirecciona a un sitio por defecto, en el caso de Jetstream, nos envía al login para que autentiquemos al usuario.

- En la documentación se dice que es un mecanismo para filtrar e inspeccionar peticiones HTTP.

- Una petición HTTP es toda aquella petición que se realiza mediante la url.

- Los Middlewares se encuentran en 	app\HTTP\Middleware

- Para poder usar middlewares primero hay que registrarlos en el kernel.

- Dentro de la clase del middleware, la función handle es la encargada de hacer el control que le asignaremos adentro.

- Si quisieramos controlar información de un usuario, y no hubiese un usuario logeado, nos daría error, para solucionarlo tendremos que



- Cuando guardamos imagenes en laravel, dichas imagenes se guardan en la carpeta 	storage\app

- Debemos hacer que las imagenes se guarden en la carpeta public, dentro de la url anterior, lo hacemos cambiando la direccion a travez de la configuración del archivo 	filesystems.php		cambiando el 'local' por 'public' dentro del parametro File_Driver.
 