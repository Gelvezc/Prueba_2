<?php
include 'conexion_mysql.php';
$sql = "SELECT * FROM usuarios ORDER BY nombres ASC";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Listado de Usuarios</h1>
        <a href="creacion_usuario.php" class="btn btn-primary mb-3">Crear nuevo usuario</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Fecha de Registro</th>
                    <th>Fecha de Modificación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nombres']; ?></td>
                            <td><?php echo $row['apellidos']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['fecha_registro']; ?></td>
                            <td><?php echo $row['fecha_modificacion']; ?></td>
                            <td>
                                <a href="edicion_usuario.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a>
                                <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('¿Esta seguro de que desea eliminar este usuario?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">No hay usuarios registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>
</html>
