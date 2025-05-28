<!DOCTYPE html>

<body>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valero Automotive</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/categorias.css">
</a>
    </head>
    <header class="valero-header">
        <div class="header-top">
            <div class="logo-container">
                <div class="logo">
                    <h1>VALERO <span>AUTOMOTIVE</span></h1>
                </div>
            </div>
            <div class="header-right">
                <div class="search-bar">
                    <input type="text" placeholder="Buscar productos...">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <nav class="main-nav">
                    <ul>
                        <li><a href="index.php"><i class="fas fa-home"></i> Inicio</a></li>
                        <li><a href="#"><i class="fas fa-user"></i> Mi Cuenta</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <section class="hero-banner">
            <div class="hero-content">
                <h2>Productos de Calidad para tu Vehículo</h2>
                <p>Encuentra todo lo que necesitas para el mantenimiento de tu automóvil</p>
            </div>
        </section>

        <section class="productos-destacados">
            <div class="section-header">
                <h2><i class="fas fa-star"></i> Productos Destacados</h2>
                <a href="productos.php" class="ver-todos">Ver todos <i class="fas fa-chevron-right"></i></a>
            </div>
            <div class="product-grid">
                <div class="producto">
                    <div class="product-badge">Nuevo</div>
                    <img src="img/img1.jpeg" alt="Producto 1">
                    <h3>Bateria Duncan 1100</h3>
                    <p class="product-desc">Descripción del producto 1.</p>
                    <p class="product-price">$80.00</p>
            
                </div>
                <div class="producto">
                    <div class="product-badge">Oferta</div>
                    <img src="img/img2.jpg" alt="Producto 2">
                    <h3>Faros Fiesta Power</h3>
                    <p class="product-desc">Par ded faros delanteros del Fiesta power</p>
                    <p class="product-price"><span class="old-price">$30.00</span> $25.00</p>
                </div>
                <!-- Añade más productos aquí -->
            </div>
        </section>

        <section class="categorias">
            <div class="section-header">
                <h2><i class="fas fa-tags"></i> Categorías</h2>
            </div>
            <div class="category-grid">
                <div class="category-card">
                    <img src="img/img3.png" alt="Parabrisas">
                    <h3>Parabrisas</h3>
                    <button>Explorar</button>
                </div>
                <div class="category-card">
                    <img src="img/img4.jpg" alt="Aceites">
                    <h3>Aceites</h3>
                    <a href="pagaceites.php" class="cta-button">Explorar más</a>
                </div>
                
                <!-- Añade más categorías aquí -->
            </div>
        </section>
        <section class="features">
            <div class="feature-box">
                <i class="fas fa-shield-alt"></i>
                <h3>Garantía</h3>
                <p>Productos con garantía</p>
            </div>
            <div class="feature-box">
                <i class="fas fa-headset"></i>
                <h3>Soporte</h3>
                <p>Asesoría especializada</p>
            </div>
        </section>
    </main>
    <footer class="shell-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>VALERO AUTOMOTIVE</h3>
                <p>Tu tienda confiable de repuestos y accesorios automotrices.</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/VALEROAUTOMOTIVE"target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/valeroautomotive/"target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Enlaces</h3>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Productos</a></li>
                    <li><a href="#">Categorías</a></li>
                    <li><a href="#">Contacto</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contacto</h3>
                <p><i class="fas fa-map-marker-alt"></i> Dirección: Venezuela, Estado Falcón, Av. los Medanos con Calle Polita de Lima Edif. Don Vicenso 4101</p>
                <p><i class="fas fa-phone"></i> Teléfono: 0268-2522055</p>
                <p><i class="fas fa-envelope"></i> Email: valero.auto1980@gmai.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 Valero Automotive. Todos los derechos reservados.</p>
            <ul>
                <li><a href="#">Términos y condiciones</a></li>
                <li><a href="#">Política de privacidad</a></li>
                <li><a href="http://creativecommons.org/licenses/by-nc-sa/4.0/" target="_blank">Licencia de Creative Commons</a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
