# Documentación de Endpoints

**Base URL:**  
`http://localhost/Tp-Api/api/`

---

## 🔹 Marcas

### `GET /marcas`  
Devuelve todas las marcas registradas.  
- Se puede ordenar opcionalmente por alguno de los campos:  
  `?orderBy=nombreASC`, `?orderBy=nombreDESC`, `?orderBy=idASC`, `?orderBy=idDESC`

**Ejemplos:**  
`http://localhost/Tp-Api/api/marcas`  
`http://localhost/Tp-Api/api/marcas?orderBy=nombreASC`  
`http://localhost/Tp-Api/api/marcas?orderBy=idDESC`

---

### `GET /marcas/:id`  
Devuelve una marca específica según su ID.  

**Ejemplo:**  
`http://localhost/Tp-Api/api/marcas/6`

---

### `POST /marcas`  
Agrega una nueva marca.  

**Body (JSON):**
```json
{
  "nombre": "NIKE",
  "importador": "ARGENTINA IMPORTS",
  "pais_origen": "EEUU"
}
```

---

### `PUT /marcas/:id`  
Modifica los datos de una marca existente.  

**Ejemplo:**  
`http://localhost/Tp-Api/api/marcas/3`

**Body (JSON):**
```json
{
  "pais_origen": "BRASIL",
  "importador": "IMPORTADORA LATINA"
}
```

---

### `DELETE /marcas/:id`  
Elimina una marca por su ID.  

**Ejemplo:**  
`http://localhost/Tp-Api/api/marcas/8`

---

## 🔹 Productos

### `GET /productos`  
Devuelve todos los productos registrados.  
- Se puede ordenar opcionalmente por alguno de los campos permitidos:  
  `?orderBy=precioASC`, `?orderBy=precioDESC`, `?orderBy=modeloASC`, `?orderBy=modeloDESC`, `?orderBy=categoriaASC`, `?orderBy=categoriaDESC`, `?orderBy=idASC`, `?orderBy=idDESC`

**Ejemplos:**  
`http://localhost/Tp-Api/api/productos`  
`http://localhost/Tp-Api/api/productos?orderBy=precioASC`  
`http://localhost/Tp-Api/api/productos?orderBy=modeloDESC`

---

### `GET /productos/:id`  
Devuelve un producto específico según su ID.  

**Ejemplo:**  
`http://localhost/Tp-Api/api/productos/10`

---

### `GET /productos/marca/:nombre`  
Devuelve todos los productos que pertenecen a una marca específica.  

**Ejemplo:**  
`http://localhost/Tp-Api/api/productos/marca/NIKE`

---

### `POST /productos`  
Agrega un nuevo producto.  

**Body (JSON):**
```json
{
  "nombre_marca": "NIKE",
  "categoria": "Zapatillas",
  "modelo": "Air Max",
  "descripcion": "Zapatillas deportivas color blanco",
  "precio": 25000
}
```

---

### `PUT /productos/:id`  
Modifica los datos de un producto existente.  

**Ejemplo:**  
`http://localhost/Tp-Api/api/productos/12`

**Body (JSON):**
```json
{
  "categoria": "Zapatillas",
  "modelo": "Air Max PRO",
  "descripcion": "Zapatillas deportivas color rosa",
  "precio": 28000
}
```

---

### `DELETE /productos/:id`  
Elimina un producto por su ID.  

**Ejemplo:**  
`http://localhost/Tp-Api/api/productos/14`

---

✅ **Base de datos:** `bd_tiendaderopa`  
Tablas: `marcas`, `productos`, `usuario`
