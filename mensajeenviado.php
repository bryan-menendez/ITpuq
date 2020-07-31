<?php
    include "templates/header.html";
    $cwd = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');    
?>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <!--TITULO-->
                <h2 class="mb-3">Mensaje enviado</h2>
                
                <!--PARRAFO-1-->
                <p>Su mensaje ha sido enviado exitosamente y sera respondido lo antes posible.</p>
                <a href="<?php print $cwd; ?>/index.php">Haga click aqui para volver al inicio.</a>
            </div>
        </div>
    </div>
</section>

<?php
    include "templates/footer.html";
?>