<?php
include 'conexion_mysql.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $con->query($sql);
    $usuario = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];

    $sql = "UPDATE usuarios SET nombres='$nombres', apellidos='$apellidos', telefono='$telefono' WHERE id=$id";

    if ($con->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Editar Usuario</h1>
        <form method="post" action="editar.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $usuario['nombres']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $usuario['apellidos']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $usuario['telefono']; ?>">
            </div>
            <button type="submit" class="btn btn-warning">Actualizar Usuario</button>
            <a href="index.php" class="btn btn-secondary">Volver</a>
        </form>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
