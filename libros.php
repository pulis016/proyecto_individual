<html>
<head>
    <title>Libros</title>
    <meta charset="utf-8">
</head>
<body>
<div  >
    <ul>
            <li><img src="img/libron.png" alt="perfil "></li>
            <li><a href="Biblioteca.html">Inicio</a></li>
            <li><a href="miperfil.html">Mi perfil</a></li>
            <li><a href="index_home.html">Cerrar sesion</a></li>
    </ul>
</div>
<h1>Libros</h1>
<div>
    <input type="search" name="barra_busqueda" placeholder="Buscar"><img src="img/lupa.png" class="icono">
    <div>
        <a href="agregar_libro.html">
            <img src="img/agregar.png">
        </a>
    </div>
</div>

<?php
$conexion = new mysqli("localhost", "root", "", "biblioteca");
if($conexion -> connect_error){
    die("no se ha podido establecer conexion con el servidor: " . $conexion -> connect_error);
}
$registro = mysqli_query($conexion, "SELECT lib_isbn, lib_titulo, lib_numeropaginas, lib_diasprestamo FROM tbl_libro")
or die("Hay problemas con la consulta: " . mysqli_error($conexion));
?>
<table border="1">
    <thead>
        <tr>
            <td>Codigo</td>
            <td>Titulo</td>
            <td>Numero de paginas</td>
            <td>Dias de prestamo</td>
            <td>Editar</td>
            <td>Eliminar</td>
        </tr>
    </thead>
<?php
while ($row = mysqli_fetch_array($registro)) {
    ?>
<tr>
    <td><?php echo $row['lib_isbn']?></td>
    <td><?php echo $row['lib_titulo']?></td>
    <td><?php echo $row['lib_numeropaginas']?></td>
    <td><?php echo $row['lib_diasprestamo']?></td>
    <td><a href="editar_libro.html"><img src="img/lapiz.png" class="icono"></a></td>
    <td><a href="borrar_libro.php"><img src="img/basura.png" class="icono"></a></td>
</tr>
<?php
}
?>
</table>
</body>
</html>