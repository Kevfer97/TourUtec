<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
  .main{
	padding: 3%;
	background-color:rgba(0,0,0,0.2);
width: 80;
height: auto;
margin: 0%;
margin-top:7%;
}
.titulo-Listado{
  width: 90%;
  max-width: 600px;
  height: 50px;
  line-height: 50px;
  margin-bottom: 15px;
  border-radius: 15px;
  background-color:rgba(107, 0, 54, 0.993);
  color: #fff;
  /* font-weight: bold; */
  font-size: 20px;
}
.boton{
	height: 180px;
	width: 250px;
	color: #fff;
	font-size: 20px;
	background-color:rgba(148, 38, 93, 0.993);
	border-radius: 10%;
	display: inline-block;
	margin: 10px;
	font-family:"Arial";
}
.boton img{
	height: 140px;
	width: 250px;	
	display: inline-block;
		border-radius: 10%;
}
.boton label{
	padding: 0px;
}
.boton:hover {
    transform : scale(1.10);
    	cursor: pointer;
	background-color: rgba(107, 0, 54, 0.993);
}

.hidden{
	display: none;
}

.on:hover{
	cursor: pointer;
	transform : scale(1.05);
}

/* .galeria{
	height: 150px;
	width: 250px;
	display: inline-block;
	padding: 0px;
} */
.galeria img{
		height: 150px;
	width: 250px;
	float: left;

	/*display: inline-block;*/
		/*border-radius: 10%;*/
		margin: 10px;
}
body{
    background:url(http://localhost:8080/TourUtec/Recursos/img/fondo.png) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    margin: 0px;
}
.hidden{
 /* visibility: hidden; */
 display: none;
}
.main-menu{
    position:fixed;
    width: 100%;
    top: 0%;
    left: 0%;
    height: 45px;
    background: rgba(107,0,54,0.95);
    border-radius: 3%;
    color: #fff;
    z-index: 9999999999999999999;
    padding-left: 10%;
    padding-right: 10%;
    visibility: visible;
}
@media (max-width: 700px){
    body{
    background:url(http://localhost:8080/TourUtec/Recursos/img/fondo-movil.png) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    margin: 0px;}
    .div-sld{
  width: 90%;
  height: 70%;
  margin-top: 5%;
  margin-left: 5%;
  border-radius: 1%;
  padding-bottom: 5%;}
  .d-block{
    height: 100%;
    width: 100%;
  }
  .carousel-inner{
    height: 150%;
  }
    .main-menu{
      top: 60px;
      display: inline-block;
        margin: 0px;
        padding: 0px;
        visibility: hidden;
        position: fixed;
    width: 100%;
}
.main{

margin-top:15%;
}
.main-menu a{
    position:static;
    text-align: center;
    background: rgba(107,0,54,1);
    margin: 0%;
    display: inline-block;
    width: 100%;
    top:15px;
    margin-top: 0px;
    margin-left: 15px;
    color: #fff;
}
.main-menu a:hover{
    background: black;
    color: white;
}
}
@media (min-width: 700px){
    .img-bar{
    visibility: hidden;

}
.cont-ico-menu{
    visibility: hidden;

}
.main-menu{
    visibility: visible;

}
}

.main-menu a{float: right;
    color: white;
    text-decoration: none;
    font-family:Verdana, Geneva, Tahoma, sans-serif;
    padding-left: 15PX; 
    padding-right: 15PX; 
    padding-top: 7px;
    padding-bottom: 7px;
    line-height: 30px;
}
.main-menu a:hover{
    color: #fff;
    background:#33001A;
    /* transform: scale(1.1); */
    /* border-bottom: solid 2px; */
    border-radius: 10px;
margin-bottom: 2px;
}
.img-bar{
height: 40px;
width: 40px;
float: right;
position: relative;
margin: 10px;
}
.img-bar img{
    height: 100%;
    width: 100%;
}
.cont-load{
    z-index: 9999999999999999999999;
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,0.95);
    position: fixed;
    top:0px;
    left:0px;
    bottom:0px;
    right:0px;
}
.cont-load-img{
    opacity: 0.95;
    z-index: 9999999999999999999099999999;
    top:0px;
    left:0px;
    bottom:0px;
    right:0px;
    
    margin: auto;
    position:absolute;
    line-height: 500px;
}
.cont-ico-menu{
    top:0px;
    left:0px;
    right:0px;
    position: fixed;
    z-index: 99999999999999999990;
}
.div-sld{
  height: auto;
  width: 90%;
  margin-top: 5%;
  margin-left: 5%;
  border-radius: 1%;
  padding-bottom: 5%;
}
.fondo-sld{
  height: auto;
  width: 96%;
  margin-left: 2%;
  margin-top:14%;
  position:static;
  border-radius: 1%;
  background: rgba(0, 0, 0,0.05);
  /* background:rgba(107,0,54,0.5); */
  
}
@media (min-width: 1000px){
  .fondo-sld{
  height: auto;
  width: 86%;
  margin-left: 7%;
  margin-top:10%;
  
  }
  .div-sld{
  width: 90%;
  margin-top: 5%;
  margin-left: 5%;
  border-radius: 1%;
  padding-bottom: 5%;
}
}
@media (min-width: 1150px){
  .fondo-sld{
  height: auto;
  width: 78%;
  margin-left: 11%;
  margin-top: 5%;
  
  }
  .div-sld{
  width: 90%;
  margin-top: 5%;
  margin-left: 5%;
  border-radius: 1%;
  padding-bottom: 5%;
}
}
.Lector{
  height: 90%;
  width: 90%;
  max-width: 500px;
  max-height: 500px;
  margin-top: 5%;
  margin-bottom: 5%;
}
.Lector-contorno{
  height: 90%;
  width: 90%;
  max-width: 500px;
  max-height: 500px;
  margin-top: 60px;
  /* float: right; */
  /* align-content: center; */
  background: rgba(0, 0, 0, 0.15);
  z-index: 88888;
}
.btn-Utec{
  background-color: rgba(51, 0, 26, 0.9);
  color: #fff;
}
.btn-Utec:hover{
  background-color: #33001A;
  color: #fff;
}
</style>
<body>
    <div class="cont-load">
        <div class="cont-load-img">
            <center>
                <img src="<?php echo base_url('/Recursos/img/load.gif');?>" alt="">
            </center>
        </div>
    </div>
    <div class="cont-ico-menu">
    <div class="img-bar"><img src="<?php echo base_url('/Recursos/img/icon-bars.svg');?>" alt=""></div>
  </div>
    <div class="main-menu animar-entrada-left">
        <a  href=""><i class="fas fa-qrcode"></i> QR</a>
        <a  href=""><i class="fas fa-home"></i> Inicio</a>
        <a  href="">Lugares</a>
        <a  href="">Usuario</a>
        <a  style="float:left; margin: 0%;" href=""><b>TOUR UTEC</b></a>
    </div>