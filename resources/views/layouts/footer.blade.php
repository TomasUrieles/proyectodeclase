<footer class="footer">
    <div class="footer-content">
        
        <div class="footer-section">
            <h4>🛒 MiTienda</h4>
            <p style="color: var(--text-gray); font-size: 14px;">
                Tu tienda online de confianza con los mejores productos y precios.
            </p>
        </div>

        <div class="footer-section">
            <h4>Enlaces</h4>
            <a href="{{ url('/') }}">Inicio</a>
            <a href="{{ route('product.index') }}">Productos</a>
            <a href="#">Sobre nosotros</a>
            <a href="#">Contacto</a>
        </div>

        <div class="footer-section">
            <h4>Ayuda</h4>
            <a href="#">Preguntas frecuentes</a>
            <a href="#">Envíos</a>
            <a href="#">Devoluciones</a>
            <a href="#">Términos y condiciones</a>
        </div>

        <div class="footer-section">
            <h4>Contacto</h4>
            <a href="mailto:info@mitienda.com">📧 info@mitienda.com</a>
            <a href="tel:+1234567890">📞 +1 234 567 890</a>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} MiTienda. Todos los derechos reservados.</p>
    </div>
</footer>