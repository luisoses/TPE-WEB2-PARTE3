Integrantes: LUIS OSES, MAXIMO CALAMANTE.

EXPLICACION ENDPOINTS:


GET: /api/cars
Lista todos los autos existentes con sus respectivas marcas

GET: /api/cars?orderBy=Modelo&direction=DESC
Lista por Modelo en descendente: {
                                "ID_Modelo": 23,
                                "Marca": "Ford",
                                "Modelo": "F100",
                                "Motor": "i6",
                                "Combustible": "Gasoil",
                                "Transmision": "Manual",
                                "Tipo": "Camioneta"
                              },
                              {
                                "ID_Modelo": 28,
                                "Marca": "Fiat",
                                "Modelo": "Duna",
                                "Motor": "i4",
                                "Combustible": "Gasoil",
                                "Transmision": "Manual",
                                "Tipo": "Sedan"
                              },
                              {
                                "ID_Modelo": 24,
                                "Marca": "Fiat",
                                "Modelo": "600",
                                "Motor": "i4",
                                "Combustible": "Nafta",
                                "Transmision": "Manual",
                                "Tipo": "Sedan"
                              }

GET: /api/cars?orderBy=Marca&direction=ASC
Lista por Marca en ascendente : {
                                "ID_Modelo": 28,
                                "Marca": "Fiat",
                                "Modelo": "Duna",
                                "Motor": "i4",
                                "Combustible": "Gasoil",
                                "Transmision": "Manual",
                                "Tipo": "Sedan"
                              },
                              {
                                "ID_Modelo": 24,
                                "Marca": "Fiat",
                                "Modelo": "600",
                                "Motor": "i4",
                                "Combustible": "Nafta",
                                "Transmision": "Manual",
                                "Tipo": "Sedan"
                              },
                              {
                                "ID_Modelo": 23,
                                "Marca": "Ford",
                                "Modelo": "F100",
                                "Motor": "i6",
                                "Combustible": "Gasoil",
                                "Transmision": "Manual",
                                "Tipo": "Camioneta"
                              }



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

