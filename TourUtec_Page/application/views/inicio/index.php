<div class="fondo-sld row animar-entrada-up">
    <div id="carouselExampleControls" class="carousel slide div-sld" data-ride="carousel">
        <div class="carousel-inner" style="  position:static;">
            <?php if (!empty($lstBanner)) {
                 $cont =0;
                foreach ($lstBanner as $lb) { ?>
                if($cont == 0){
                    <div class="carousel-item active">
                    $cont = 1;    
                }else{
                    <div class="carousel-item"> 
                    }
                    <img class="d-block w-100" style="  position:static;" src="<?php echo base_url('/TourUtec/Recursos/banner/' . $lb->ban_imagen)  ?>">
                    </div>
                <?php }
        }    ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>
</div>