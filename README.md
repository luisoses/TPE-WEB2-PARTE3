Integrantes: LUIS OSES, MAXIMO CALAMANTE.

EXPLICACION ENDPOINTS:


GET: /api/cars
Lista todos los autos existentes con sus respectivas marcas

GET: /api/cars/:id 
Obtiene un auto especifico por su id

POST: /api/cars
Agrega un auto con su respectiva marca
Ejemplo: 
Solicitud en JSON  {
                  "ID_Marca" : "2",
                  "Motor" : "i4",
                  "Combustible" : "Nafta",
                  "Modelo" : "Marea",
                  "Transmision" : "Manual",
                  "Tipo" : "Sedan"
                }

PUT: /api/cars/:id 
Modifica un auto existente
Ejemplo: /api/cars/24 
  {
  "ID_Marca" : "2",
  "Motor" : "i6",
  "Combustible" : "Nafta",
  "Modelo" : "F150",
  "Transmision" : "Manual",
  "Tipo" : "Pick-Up"
  }

DELETE: /api/cars/:id  
Borra un auto existente
Ejemplo: /api/cars/24

