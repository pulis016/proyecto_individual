<?php
$conn = new mysqli("localhost", "root", "", "biblioteca");
if ($conn->connect_error){
    die ("Error no se puede conectar al servidor: " . $conn->connect_error);
}
$query = "INSERT INTO tbl_libro(lib_titulo, lib_numeropaginas ,lib_diasprestamo) VALUES('$_REQUEST[titulolib]', '$_REQUEST[numpag]', '$_REQUEST[diaspres]')";
$result = $conn -> query ($query);
if (!$result) die ("Falla al acceder a la base de datos");
echo "El libro ha sido registrado";
$conn -> close();  
?>
<p>
        <br>
        <a href="http://localhost/proyecto_individual/libros.php"><input type="button" Value="Volver a libros"></a>
</p>