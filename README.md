Mini Sistema de Ventas en Laravel
Objetivo
Desarrollar un sistema básico de gestión de ventas con Laravel que permita administrar productos, registrar ventas y generar reportes.

Funcionalidades a Implementar
1. Base de Datos
Tabla productos: Almacena información de los productos disponibles

id (identificador único)

nombre (nombre del producto)

precio (precio unitario)

stock (cantidad disponible)

Tabla ventas: Registra las transacciones de ventas

id (identificador único)

producto_id (relación con el producto vendido)

cantidad (cantidad vendida)

fecha (fecha de la venta)

2. CRUD de Productos
Operaciones completas de Create, Read, Update y Delete para la gestión de productos:

Listar todos los productos

Crear nuevos productos

Editar productos existentes

Eliminar productos

Ver detalles individuales

3. Sistema de Ventas
Registro de ventas con validación de stock disponible

Descuento automático del stock al realizar una venta

Validación para evitar ventas con cantidad superior al stock disponible

4. API de Reportes
Endpoint: GET /api/reporte-ventas

Respuesta en formato JSON con:

Nombre del producto

Cantidad total vendida

Ingresos generados (cantidad × precio)

Tecnologías Utilizadas

Laravel 10+

PHP 8.1+

MySQL/MariaDB

Eloquent ORM

API RESTful

Entregables
Migraciones de base de datos funcionando

Modelos con relaciones definidas

Controladores CRUD para productos

Sistema de registro de ventas

API endpoint para reportes

Validaciones y manejo de errores

Relaciones entre modelos Producto y Venta

Consideraciones Adicionales
Las ventas deben validar que exista suficiente stock

El stock se actualiza automáticamente al registrar una venta

El reporte de ventas debe agrupar por producto y calcular totales

Se incluirán mensajes de respuesta apropiados para el usuario
