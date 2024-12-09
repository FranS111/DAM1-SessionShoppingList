<?php
session_start();

//Aqui comprueba que existe el valor del get para nombre y entonces crea la session
if(isset($_GET["nombre"])){
    $nombre = $_GET["nombre"];
    echo ("<br>");
    
    if (!array_key_exists("nom_usuari", $_SESSION)) {
        if (isset($nombre)) {
            $_SESSION["nom_usuari"] = $nombre;
        } else {
            $_SESSION["nom_usuari"] = "anonim";
        }
    }
}

//Comprueba que existe nombre de session y lo imprime arriba
if(isset($_SESSION["nombre"])){
    echo "Hola " . $_SESSION["nom_usuari"];
}

//Comprobar el item añadido
if (isset($_POST['new_nombre']) && isset($_POST['new_precio']) && isset($_POST['new_cantidad'])) {
    $new_item = array(
        "nombre_item" => $_POST['new_nombre'],
        "precio_item" => $_POST['new_precio'],
        "cantidad_item" => $_POST['new_cantidad']
    );
    // Añadir el item a la lista
    $_SESSION['nombre'][$_POST['new_nombre']] = $new_item;
}

//Editar el item indicado
if (isset($_POST['edit_nombre']) && isset($_POST['edit_precio']) && isset($_POST['edit_cantidad'])) {
    $item_indice = $_POST['edit_nombre'];
    $_SESSION['nombre'][$item_indice]['nombre_item'] = $_POST['edit_nombre'];
    $_SESSION['nombre'][$item_indice]['precio_item'] = $_POST['edit_precio'];
    $_SESSION['nombre'][$item_indice]['cantidad_item'] = $_POST['edit_cantidad'];
}

// Comprobar si se ha pedido el delete
if (isset($_POST['nombre_borrar'])) {
    // Eliminar del array
    $delete_indice = $_POST['nombre_borrar'];
    unset($_SESSION['nombre'][$delete_indice]);
}

//Calculamos el coste total
$precio_total = 0;
if (isset($_SESSION['nombre'])) {
    foreach ($_SESSION['nombre'] as $item) {
    $precio_total += ($item['precio_item'] * $item['cantidad_item']);
    }
}
echo("<br><br>");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "Ejercicio01h.php" method = "GET">
    <p>Introduzca el nombre de la lista</p>
        <input type ="name" name = "nombre" placeholder="nombre lista"/>
        <input type = "submit" value = "Enviar Nombre Lista"/>
    </form>

    <form action = "Ejercicio01h.php" method = "POST">
    <p>Introduzca el nombre del item a añadir</p>

        <input type ="name" name = "new_nombre" placeholder="nombre"/>
        <input type ="number" name = "new_precio" placeholder="precio"/>
        <input type ="number" name = "new_cantidad" placeholder="cantidad"/>
        <input type = "submit" value = "Añadir Item"/>
    </form>

    <form action = "Ejercicio01h.php" method = "POST">
    <p>Introduzca el nombre del item a editar</p>
        <input type ="name" name = "edit_nombre" placeholder="nombre"/>
        <input type ="number" name = "edit_precio" placeholder="precio"/>
        <input type ="number" name = "edit_cantidad" placeholder="cantidad"/>
        <input type = "submit" value = "Editar Item"/>
    </form>
    
    <form action = "Ejercicio01h.php" method = "POST">
        <p>Introduzca el nombre del item a eliminar</p>
        <input type ="name" name = "nombre_borrar" placeholder="nombre"/>
        <input type = "submit" value = "Borrar Item"/>
    </form>

</body>
</html>


<?php       
//Imprimimos el precio total de la lista al final de la pagina
echo "Precio total: $precio_total €";
echo("<br><br>");   

//Este foreach es para imprimir la array de la lista para que sea mas visual
if(isset($_SESSION["nombre"])) {
    $lista_print = $_SESSION["nombre"];
    foreach ($lista_print as $item) {
        $nombre_item_pr = $item['nombre_item'];
        $precio_item_pr = $item['precio_item'];
        $cantidad_item_pr = $item['cantidad_item'];
        echo "<tr>";
        echo "<td>Nombre: $nombre_item_pr - </td>";
        echo "<td>Precio: $precio_item_pr - </td>";
        echo "<td>Cantidad: $cantidad_item_pr</td>";
        echo "</tr><br>";
    }
}
?>
