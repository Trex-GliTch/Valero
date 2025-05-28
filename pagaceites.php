<?php
include("conexion.php");
$conn = connection();

$img_dir = "C:\xampp\htdocs\ValeroAutomotive\img";
$aceites = mysqli_query($conn, "SELECT * FROM aceites ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aceites - Valero Automotive</title>
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/categorias.css">
    <style>
        main {
            padding: 2rem;
        }
        .aceite-lista {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
        }
        .aceite-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px #0001;
            padding: 1.5rem;
            text-align: center;
        }
        .aceite-card img {
            max-width: 120px;
            max-height: 120px;
            margin-bottom: 1rem;
            border-radius: 8px;
            object-fit: contain;
            background: #f6f6f6;
        }
        .aceite-card h3 {
            margin: 0.5rem 0;
            font-size: 1.2rem;
            color: #2c3e50;
        }
        .aceite-card p {
            margin: 0.2rem 0;
            color: #555;
        }
    </style>
</head>
<body>
    <header>
        <!-- Incluye aquí tu header o navbar si lo tienes en un archivo aparte -->
        <a href="productos.php" class="cta-button" > Productos</a>

    </header>
    <main>
        <h2>Aceites disponibles</h2>
        <div class="aceite-lista">
            <?php while($row = mysqli_fetch_assoc($aceites)): ?>
            <div class="aceite-card">
                <?php if($row['foto']): ?>
                    <img src="<?= $img_dir . htmlspecialchars($row['foto']) ?>" alt="Foto de <?= htmlspecialchars($row['nombre']) ?>">
                <?php else: ?>
                    <img src="img/no-image.png" alt="Sin foto">
                <?php endif; ?>
                <h3><?= htmlspecialchars($row['nombre']) ?></h3>
                <p><strong>Marca:</strong> <?= htmlspecialchars($row['marca']) ?></p>
                <p><strong>Precio:</strong> $<?= htmlspecialchars($row['precio']) ?></p>
                <p><strong>Stock:</strong> <?= htmlspecialchars($row['stock']) ?></p>
                <p><strong>Tipo:</strong> <?= htmlspecialchars($row['tipo']) ?></p>
                <p><strong>Viscosidad:</strong> <?= htmlspecialchars($row['viscosidad']) ?></p>
                <a href="aceitescrud.php" class="cta-button" style="position: fixed; bottom: 30px; right: 30px; z-index: 999;" > Gestionar Aceites </a>
            </div>
            <?php endwhile; ?>
        </div>
    </main>
    <footer>
        <!-- Incluye aquí tu footer si tienes uno -->
    </footer>
</body>
</html>