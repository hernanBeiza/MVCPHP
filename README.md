# PHPMVC
## Bienvenidos
Les dejo aquí un ejemplo de estructura MVC. EN realidad es un acercamiento. **¡Ojalá les sirva!**

## Estructura de carpetas
### /
* Acá van los archivos "públicos". 
* Cada uno de los archivos se comporta como una pasarela. 
* Recibe los datos. Valida y se comunica con le controlador

### controllers
* Recibe los datos desde la pasarela pública. 
* Validamos una vez más
* Creamos un modelo

### model
* Es una clase simple con los parámeros que almacenaremos en la base de datos
* Contiene datos, métodos set y get
* Este objeto se va a pasar a un DAO

### dao
* Es quien se comunica finalmente con la base de datos
* Cada subclase heredará de DAO.php un objeto mysqli para poder interactuar con la base de datos
* Cada subclase heredará un método para conectar y desconectarse ¡Hay que revisar si funciona bien o no!