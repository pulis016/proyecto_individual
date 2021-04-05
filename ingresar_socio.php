<html>
    <?php
    $name = $_POST['usuario'];
    $password = $_POST['contraseña'];
    $conn = new mysqli("localhost","root","","biblioteca");
    if ($conn -> connect_error){
        die ("no se ha podido establecer conexion con el servidor: " . $conn -> connect_error);
    }
    $registros = mysqli_query($conn, "SELECT * FROM tbl_socio WHERE soc_nombre = '$name' AND contraseña = '$password' ");
    if ($reg = mysqli_fetch_array($registros)){
        echo "Usuario: " . $name .  " Bienvenido al sistema de biblioteca" 
    ?>
    <p>
        <br>
        <a href="http://localhost/proyecto_individual/Biblioteca.html"><input type="button" Value="Continuar" ></a>
    </p>
    <?php
    }
    else {
        echo "<script> alert ('Informacion incorrecta') </script>";
        echo "Usuario Inexistente...";
        echo "Porfavor Vuelva a intentarlo";
    ?>
    <p>
        <br>
        <a href="http://localhost/proyecto_individual/ingresar_socio.html"><input type="button" Value="Volver a intentar"></a>
    </p>
    <?php
    }
    ?>
    
</html>