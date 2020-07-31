<?php 
    include "templates/header.html";
?>

        <!--CONTENT-->

        <section class="hero-wrap js-fullheight" style="background-image: url('images/itbg.jpg');" data-section="home" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-5 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">                        
                        <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Servicio Tecnico Informatico</h1>
                        <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
                            <b>Soluciones a diversos problemas en sistemas y equipos informaticos: equipos de escritorio, notebooks, netbooks, telefonos android, etc. <br><br>
                            Diagnostico gratuito. Mantenimiento, formateos, respaldos, recuperacion de archivos, y mas. <br><br>
                            Servicios a domicilio, retiro de equipos. Consultas al +56 9 9274 0152, al correo informaticapuq@protonmail.com, o por redes sociales.
                            </b>
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">
            </div>
        </section>
		
		<section class="ftco-section ftco-services-2" id="notas-section">
			<div class="container">
				<div class="row justify-content-center pb-5">
					<div class="col-md-12 heading-section text-center ftco-animate">
						<h2 class="mb-4">Acerca del servicio</h2>
						<p>Existe una cantidad inconmesurable de cosas que pueden ocurrir a un equipo. Nuestro servicio posee limites dentro de los cuales puede trabajar.</p>
						<p>Para mas detalles, visite la seccion de Condiciones.</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services text-center d-block">
							<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-detective"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Diagnostico Gratuito</h3>
								<p>El diagnostico y presupuesto del servicio no posee costo, y puede realizarse de manera digital via redes sociales.</p>
							</div>
						</div>      
					</div>
					<div class="col-md d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
							<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-house"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Servicio a domicilio</h3>
								<p>En caso de requerirlo, se puede realizar el servicio en un recinto particular, o retirar un equipo de una direccion.<b> Esto posee costo.</b></p>
							</div>
						</div>      
					</div>
					<div class="col-md d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services text-center d-block">
							<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-pin"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Servicio Informatico</h3>
								<p>Nuestro servicio se especializa en lo informatico (software, datos, programas, etc). No se reparan equipos da�ados electronicamente (rotos, caidos al agua, etc).</p>
							</div>
						</div>      
					</div>
					<div class="col-md d-flex align-self-stretch ftco-animate">
						<div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
							<div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-purse"></span></div>
							<div class="media-body">
								<h3 class="heading mb-3">Trabajo completo</h3>
								<p>No se cobrara por los servicios que no hayan sido completados.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
    <?php include "templates/buscadorequipos.html"?>
		
        <section class="ftco-section" id="servicios-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-5">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Servicios ofrecidos</h2>
                        <p>Aqui se detallan algunos de los servicios disponibles mas comunes, junto con el costo base de cada uno de ellos. <br>
						<b>El costo base es el valor minimo del servicio, y puede aumentar segun la complejidad del trabajo.<br></b>
						Consulte por su diagnostico y presupuesto al +56 9 9274 0152, al correo informaticapuq@protonmail.com, o por medio de las redes sociales.
						</p>
                    </div>
                </div>
                <div class="row d-flex">

                    <!--LISTADO DE SERVICIOS-->

                    <?php
                    $handle = opendir('servicios/');

                    if ($handle) 
                    {
                        while (false !== ($file = readdir($handle))) 
                        {
                            if (substr($file, strlen($file)-4) == ".php")
                            {
                                include "servicios/$file";
                                ?>
                                    <div class="col-md-6 col-lg-4 d-flex ftco-animate">
                                        <div class="blog-entry justify-content-end">
                                            <a href="servicios.php?id=<?php print substr($file, 0, strlen($file)-4)?>" class="block-20" style="background-image: url('<?php print $image ?>');">
                                            </a>
                                            <div class="text float-right d-block">
                                                <h3 class="heading"><a href="single.html"><?php print $title ?></a></h3>
                                                <p><?php print $desc ?></p>
                                                <div class="d-flex align-items-center mt-4 meta">
                                                    <p class="mb-0"><a href="servicios.php?id=<?php print substr($file, 0, strlen($file)-4)?>" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        } 
                        
                        closedir($handle);
                    }
                    ?>
                </div>
            </div>
        </section>

    <?php 
        include "templates/contacto.html"; 
        include "templates/footer.html";
    ?>

        