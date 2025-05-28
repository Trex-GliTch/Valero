<?php
include("conexion.php");
$conn = connection();

// Crear carpeta de imágenes si no existe
$img_dir = "img";
if (!file_exists($img_dir)) {
    mkdir($img_dir, 0777, true);
}

// AGREGAR ACEITE
if (isset($_POST['add'])) {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $tipo = $_POST['tipo'];
    $viscosidad = $_POST['viscosidad'];
    $img = "";

    // Manejar subida de imagen
    if ($_FILES['foto']['name'] != "") {
        $foto_name = uniqid() . "_" . basename($_FILES["foto"]["name"]);
        $target_file = $img_dir . $foto_name;
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $img = $foto_name;
        }
    }

    $sql = "INSERT INTO aceites (nombre, marca, precio, stock, tipo, viscosidad, foto) VALUES 
    ('$nombre', '$marca', '$precio', '$stock', '$tipo', '$viscosidad', '$img')";
    mysqli_query($conn, $sql);
    header("Location: productos.php");
    exit;
}

// BORRAR ACEITE
if (isset($_GET['del'])) {
    $id = intval($_GET['del']);
    // Borra la imagen asociada
    $res = mysqli_query($conn, "SELECT foto FROM aceites WHERE id=$id");
    if ($row = mysqli_fetch_assoc($res)) {
        if ($row['foto'] && file_exists($img_dir . $row['foto'])) {
            unlink($img_dir . $row['foto']);
        }
    }
    mysqli_query($conn, "DELETE FROM aceites WHERE id=$id");
    header("Location: productos.php");
    exit;
}

// EDITAR/ACTUALIZAR ACEITE
if (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $tipo = $_POST['tipo'];
    $viscosidad = $_POST['viscosidad'];

    $sql = "UPDATE aceites SET 
        nombre='$nombre', marca='$marca', precio='$precio', stock='$stock', tipo='$tipo', viscosidad='$viscosidad'";

    // Si hay imagen nueva, la sube y reemplaza
    if ($_FILES['foto']['name'] != "") {
        $foto_name = uniqid() . "_" . basename($_FILES["foto"]["name"]);
        $target_file = $img_dir . $foto_name;
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            // Borrar foto anterior
            $res = mysqli_query($conn, "SELECT foto FROM aceites WHERE id=$id");
            if ($row = mysqli_fetch_assoc($res)) {
                if ($row['foto'] && file_exists($img_dir . $row['foto'])) {
                    unlink($img_dir . $row['foto']);
                }
            }
            $sql .= ", foto='$foto_name'";
        }
    }
    $sql .= " WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: productos.php");
    exit;
}

// Obtener datos para editar si corresponde
$edit = false;
if (isset($_GET['edit'])) {
    $edit = true;
    $id_edit = intval($_GET['edit']);
    $res = mysqli_query($conn, "SELECT * FROM aceites WHERE id=$id_edit");
    $aceite_edit = mysqli_fetch_assoc($res);
}

// Listar aceites
$aceites = mysqli_query($conn, "SELECT * FROM aceites ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Aceites - Valero Automotive</title>
    <link rel="stylesheet" href="css/base.css">
    <style>
        form { margin-bottom: 2rem; background: #fff; padding: 1.5rem; border-radius: 8px; }
        input, select { margin-bottom: 1rem; padding: 0.5rem; width: 100%; }
        table { width: 100%; border-collapse: collapse; background: #fff;}
        th, td { padding: 0.8rem; border: 1px solid #ddd; text-align: center;}
        img { max-width: 80px; max-height: 80px; border-radius: 6px;}
        .actions a { margin: 0 0.5rem; }
        .actions { white-space: nowrap; }
    </style>
</head>
<body>
    <h2><?= $edit ? "Editar Aceite" : "Añadir Aceite" ?></h2>
    <form method="post" enctype="multipart/form-data">
        <?php if($edit): ?>
            <input type="hidden" name="id" value="<?= $aceite_edit['id'] ?>">
        <?php endif; ?>
        <input type="text" name="nombre" placeholder="Nombre" required value="<?= $edit ? htmlspecialchars($aceite_edit['nombre']) : '' ?>">
        <input type="text" name="marca" placeholder="Marca" required value="<?= $edit ? htmlspecialchars($aceite_edit['marca']) : '' ?>">
        <input type="number" name="precio" placeholder="Precio" min="0" required value="<?= $edit ? htmlspecialchars($aceite_edit['precio']) : '' ?>">
        <input type="number" name="stock" placeholder="Stock" min="0" required value="<?= $edit ? htmlspecialchars($aceite_edit['stock']) : '' ?>">
        <input type="text" name="tipo" placeholder="Tipo" required value="<?= $edit ? htmlspecialchars($aceite_edit['tipo']) : '' ?>">
        <input type="text" name="viscosidad" placeholder="Viscosidad" required value="<?= $edit ? htmlspecialchars($aceite_edit['viscosidad']) : '' ?>">
        <label for="foto"><?= $edit ? "Nueva foto (opcional)" : "Foto del producto" ?></label>
        <input type="file" name="foto" accept="image/*" <?= $edit ? "" : "required" ?>>
        <?php if($edit && $aceite_edit['foto']): ?>
            <br><img src="<?= $img_dir . $aceite_edit['foto'] ?>" alt="Foto actual">
        <?php endif; ?>
        <br>
        <button type="submit" name="<?= $edit ? 'update' : 'add' ?>">
            <?= $edit ? "Actualizar" : "Añadir" ?>
        </button>
        <?php if($edit): ?>
            <a href="aceitescrud.php">Cancelar</a>
        <?php endif; ?>
    </form>

    <h2>Lista de Aceites</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Tipo</th>
            <th>Viscosidad</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($aceites)): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td>
                <?php if($row['foto']): ?>
                    <img src="<?= $img_dir . $row['foto'] ?>" alt="Foto">
                <?php else: ?>
                    Sin foto
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= htmlspecialchars($row['marca']) ?></td>
            <td><?= htmlspecialchars($row['precio']) ?></td>
            <td><?= htmlspecialchars($row['stock']) ?></td>
            <td><?= htmlspecialchars($row['tipo']) ?></td>
            <td><?= htmlspecialchars($row['viscosidad']) ?></td>
            <td class="actions">
                <a href="aceitescrud.php?edit=<?= $row['id'] ?>">Editar</a>
                <a href="aceitescrud.php?del=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar este aceite?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>