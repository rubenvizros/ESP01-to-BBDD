<?php                                                                                                                                                                                                                                        // Obtener datos del formulario y assignamos NULL como valor por defecto si el campo esta vacio                                                                                                                                              $humedad = $_POST['humedad'] ?? null;                                                                                                                                                                                                        $temperatura = $_POST['temperatura'] ?? null;                                                                                                                                                                                                                                                                                                                                                                                                                                             // Se comprueba que no haya ningun valor en NULL                                                                                                                                                                                             if ($humedad !== null && $temperatura !== null) {                                                                                                                                                                                                // Crear conexión                                                                                                                                                                                                                            $conn = new mysqli("localhost", "ruben", "ruben1", "Arduino");                                                                                                                                                                                                                                                                                                                                                                                                                            // Verificar la conexión                                                                                                                                                                                                                     if ($conn->connect_error) {                                                                                                                                                                                                                      //Salimos y damos el error de conexion de la db                                                                                                                                                                                              die("Conexión fallida: " . $conn->connect_error);                                                                                                                                                                                        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         // Preparar y ejecutar la consulta SQL de inserción                                                                                                                                                                                          $sql = "INSERT INTO temp (HUMEDAD, TEMPERATURA) VALUES (?, ?)";                                                                                                                                                                              $stmt = $conn->prepare($sql);                                                                                                                                                                                                                                                                                                                                                                                                                                                             //Se remplaza los ?? por las variables de humedad y temperatura                                                                                                                                                                              $stmt->bind_param("ss", $humedad, $temperatura);                                                                                                                                                                                                                                                                                                                                                                                                                                          //Se ejecuta y se comprueba si la insercion a tenido exito.                                                                                                                                                                                  if ($stmt->execute()) {                                                                                                                                                                                                                          echo "Datos ingresados correctamente.";                                                                                                                                                                                                  } else {                                                                                                                                                                                                                                         echo "Error al ingresar datos: " . $conn->error;                                                                                                                                                                                         }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         // Cerrar la conexión y la declaración                                                                                                                                                                                                       $stmt->close();                                                                                                                                                                                                                              $conn->close();                                                                                                                                                                                                                          } else {                                                                                                                                                                                                                                         echo "El formulario venia sin datos.";                                                                                                                                                                                                   }                                                                                                                                                                                                                                            ?><?php
// Obtener datos del formulario y asignar NULL como valor por defecto si el campo está vacío
$humedad = $_POST['humedad'] ?? null;
$temperatura = $_POST['temperatura'] ?? null;

// Se comprueba que no haya ningún valor en NULL
if ($humedad !== null && $temperatura !== null) {
    // Crear conexión a la base de datos
    $conn = new mysqli("localhost", "ruben", "ruben", "Arduino");

    // Verificar la conexión
    if ($conn->connect_error) {
        // Salir y mostrar el error de conexión a la base de datos
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Preparar y ejecutar la consulta SQL de inserción
    $sql = "INSERT INTO temp (HUMEDAD, TEMPERATURA) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Reemplazar los ? por las variables de humedad y temperatura
    $stmt->bind_param("ss", $humedad, $temperatura);

    // Ejecutar y comprobar si la inserción tuvo éxito
    if ($stmt->execute()) {
        echo "Datos ingresados correctamente.";
    } else {
        echo "Error al ingresar datos: " . $conn->error;
    }

    // Cerrar la conexión y la declaración preparada
    $stmt->close();
    $conn->close();
} else {
    echo "El formulario venía sin datos.";
}
?>