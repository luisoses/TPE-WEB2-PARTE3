# TPE-WEB2-PARTE3

# API REST – Vehículos (TPE Parte 3)
Esta API REST permite consultar, crear, modificar y eliminar información relacionada con vehículos y marcas.


# La API utiliza la misma base del TP anterior:

Tablas principales:
-marcas
-modelos
-usuarios (solo para manejo interno, no forma parte del TP3)

- Se incluye el script SQL dentro del repositorio.

# Endpoints Disponibles
#Listado de rutas (desde router.php)
GET     /cars
GET     /cars/:id
POST    /cars
PUT     /cars/:id
DELETE  /cars/:id

POST    /brands
PUT     /brands/:id

# 1. Obtener todos los vehículos
GET /cars
Retorna una lista completa de vehículos (tabla modelos).

- Ejemplo de respuesta (200):
[
  {
    "ID_Modelo": 27,

    "ID_Marca": 4,

    "Modelo": "Civic",

    "Motor": "i4",

    "Combustible": "Nafta",

    "Transmision": "Manual",

    "Tipo": "Coupe"
  }
]

# 2. Obtener un vehículo por ID
GET /cars/:id
Ejemplo:
GET /cars/26

- Respuesta exitosa (200):
{
  "ID_Modelo": 26,
  "ID_Marca": 11,
  "Modelo": "Corsa",
  "Motor": "i4",
  "Combustible": "Nafta",
  "Transmision": "Manual",
  "Tipo": "Sedan"
}

- Si no existe (404):
{ "error": "El vehículo no existe" }

# 3. Agregar un vehículo
POST /cars

- Body (JSON):
{
  "ID_Marca": 3,
  "Modelo": "Spazio",
  "Motor": "1.3",
  "Combustible": "Nafta",
  "Transmision": "Manual",
  "Tipo": "Hatchback"
}

- Respuesta (201):
{
  "message": "Vehículo creado correctamente",
  "ID_Modelo": 28
}

- Error por campos faltantes (400):
{ "error": "Faltan completar datos" }

# 4. Modificar un vehículo
PUT /cars/:id
Ejemplo:
PUT /cars/26

- Body JSON:
{
  "Modelo": "Corsa Classic",
  "Motor": "1.6",
  "Combustible": "Nafta",
  "Transmision": "Manual",
  "Tipo": "Sedan"
}

- Respuesta (200):
{ "message": "Vehículo actualizado" }

# 5. Eliminar un vehículo
DELETE /cars/:id
Ejemplo:
DELETE /cars/25


- Respuesta (200):

{ "message": "Vehículo eliminado" }


- Si no existe (404):

{ "error": "No existe el vehículo" }

# 6. Crear una marca
POST /brands

- Body JSON:

{
  "Marca": "Toyota"
}


- Respuesta (201):

{
  "message": "Marca creada",
  "ID_Marca": 14
}

# 7. Modificar una marca
PUT /brands/:id

- Body JSON:

{
  "Marca": "Subaru Updated"
}


- Respuesta (200):

{ "message": "Marca actualizada" }

# Códigos de error implementados
Código	Significado
200	OK
201	Creado
400	Error del cliente (datos faltantes o inválidos)
404	No encontrado
