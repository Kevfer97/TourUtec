</body>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script> 
 
var m_tr = true;
$(document).ready(function(){
    setTimeout(cerraLoad, 1000);
});
function cerraLoad(){
$(".cont-load").addClass("hidden");
animar();
}
function animar(){
  var tl = new TimelineMax();
var $Div = $(".animar-entrada-up")
var $Div2 = $(".animar-entrada-left")

tl.to($Div2, 0, { ease: Back.easeOut.config(1.7), x: 500 }
).to($Div2, 1, { ease: Back.easeOut.config(1.7), x: -0 }
).to($Div, 0, { ease: Back.easeOut.config(1.7), y: 500 },-1
).to($Div, 2, { ease: Back.easeOut.config(1.7), y: -0 },-1);
};

$(".img-bar").click(function(){
if(m_tr){
    m_tr = false;
    $(".main-menu").css("visibility","visible").animate({
    opacity: 0.9,
    left: "+=10"
  }, 500, function() {
    // Animation complete.
  });
    $(".cont-ico-menu").css("background","#33001A")
    $(".img-bar  img").attr("src","<?php echo base_url('/Recursos/img/icon-bars.png');?>").animate({
    opacity: 0.5,
    left: "+=10"
  }, 500, function() {
    // Animation complete.
  });
}else{
    m_tr = true;
    $(".main-menu").css("visibility","hidden").animate({
    opacity: 0.25,
    left: "-=10"
  }, 500, function() {
    // Animation complete.
  });
    $(".cont-ico-menu").css("background","")
    $(".img-bar  img").attr("src","<?php echo base_url('/Recursos/img/icon-bars.svg');?>").animate({
    opacity: 1,
    left: "-=10"
  }, 500, function() {
    // Animation complete.
  });
}
});
$(".ddsd").click(function() {
		//alert($(this));
		$(".ddsd").removeClass("active");
		$(this).addClass("active");
		var $cod = $("."+$(this).attr("cosa"))
		$(".cds").addClass("hidden");
		$cod.removeClass("hidden");
	});
 // falta el id para hacer consulta para traer los datos del laboratorio y mandarlos como parametros para el mapa
 var Latitud = "10.305385";
  var Longitud = "77.923029";
  var frameMapa ="";
  frameMapa += '<iframe src = "https://maps.google.com/maps?q='+Latitud+' ,'+Longitud+'&hl=es;z=14&amp;output=embed" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>';
  console.log(frameMapa);
  $(".mapa_content").append(frameMapa);

   let scanner = new Instascan.Scanner(
             {
                 video: document.getElementById('preview')
             }
         );
         scanner.addListener('scan', function(content) {
             alert('Conenido: ' + content);
           window.open(content, "_blank");
       });
         var ArrCamaras 
         var contCam = 0;
         Instascan.Camera.getCameras().then(cameras => 
         {
           ArrCamaras = cameras;
             if(cameras.length > 0){
                if(cameras.length == 1){$(".content-btn-cmb-camara").addClass("hidden")}
               scanner.start(cameras[0]);
            } else {
                 console.error("no existe camara en el dispositivo!");
             }
         });
         $(".content-btn-cmb-camara").click(function(){
        contCam ++;
           if(contCam <= ArrCamaras.length){
              
              scanner.start(cameras[contCam]);
            }else{
               contCam =0;
             scanner.start(cameras[contCam]);
            }
        });
</script>
</html>