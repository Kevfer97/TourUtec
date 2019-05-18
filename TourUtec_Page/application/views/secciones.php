<div class="main animar-entrada-up">
      <center>
        <div class="titulo-Listado">Listado de Secciones</div>
      <div class="menu ">
            <div class="boton"><img src="assets/fondo.jpg"><label>Seccion 1</label></div>
            <div class="boton"><img src="assets/fondo2.jpg"><label>Seccion 2</label></div>
            <div class="boton"><img src="assets/fondo3.jpg"><label>Seccion 3</label></div>
            <div class="boton"><img src="assets/fondo4.jpg"><label>Seccion 4</label></div>
            <div class="boton"><img src="assets/fondo.jpg"><label>Seccion 5</label></div>
            <div class="boton"><img src="assets/fondo2.jpg"><label>Seccion 6</label></div>
            <div class="boton"><img src="assets/fondo3.jpg"><label>Seccion 7</label></div>
            <div class="boton"><img src="assets/fondo4.jpg"><label>Seccion 8</label></div>
            <?php if (!empty($lstSecciones)) {
                foreach ($lstSecciones as $sc) { ?>
                    <div class="boton"><img src="<?php echo base_url('/TourUtec/Recursos/img/'.$sc->sec_imagen)  ?>"><label><?php echo $ed->sec_nombre ?></label></div>     
                <?php }
        }    ?>
      </div>
      </center>
    </div>