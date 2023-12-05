php
<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "tienda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprueba la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Función para crear un nuevo producto
function createProduct($name, $price, $description) {
    global $conn;
    
    $sql = "INSERT INTO productos (nombre, precio, descripcion) VALUES ('$name', '$price', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto creado con éxito.";
    } else {
        echo "Error al crear el producto: " . $conn->error;
    }
}

// Función para leer todos los productos
function readProducts() {
    global $conn;
    
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . ", Nombre: " . $row["nombre"] . ", Precio: $" . $row["precio"] . ", Descripción: " . $row["descripcion"] . "<br>";
        }
    } else {
        echo "No hay productos registrados.";
    }
}

// Función para actualizar un producto
function updateProduct($id, $name, $price, $description) {
    global $conn;
    
    $sql = "UPDATE productos SET nombre='$name', precio='$price', descripcion='$description' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto actualizado con éxito.";
    } else {
        echo "Error al actualizar el producto: " . $conn->error;
    }
}

// Función para eliminar un producto
function deleteProduct($id) {
    global $conn;
    
    $sql = "DELETE FROM productos WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado con éxito.";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
}