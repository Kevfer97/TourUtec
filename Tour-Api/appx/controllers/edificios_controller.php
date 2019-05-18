<?php
use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/Format.php';
require APPPATH . '/config/rest.php';
require APPPATH . '/libraries/REST_Controller.php';
class edificios_controller extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('clEdificios');
    }

    //API -  Regresa todos los edificios con opción de top
    function listaEdificios_get()
    {
        //  $top  = $this->post('n');        
        $top  = $this->input->get("t"); //this->get('$t');        
        // $top = 0;
        // $edf_codigo = 1;
        // $edf_nombre  = "";
        // $edf_orden  = 0;
        // $edf_latitud  = 0;
        // $edf_longitud  = 0;
        // $edf_acronimo  = "";
        $result = $this->clEdificios->getEdificios();
        if ($result) {
            $this->response($result, REST_Controller::HTTP_OK);
        } else {
            $this->response("No hay registros",  REST_Controller::HTTP_NOT_FOUND);
        }
    }

    //API -  Regresa todos los edificios y se puede filtrar por todos los campos
    function listaEdificios_fil_get()
    {
        //$top  = $this->input->get("t"); //this->get('$t');
        $edf_codigo  = $this->input->get("edf_codigo");
        $edf_nombre  = $this->input->get("edf_nombre");
        $edf_imagen  = $this->input->get("edf_imagen");
        $edf_orden  = $this->input->get("edf_orden");
        $edf_latitud  = $this->input->get("edf_latitud");
        $edf_longitud  = $this->input->get("edf_longitud");
        $edf_acronimo  = $this->input->get("edf_acronimo");
        $data = array('opc' => 2, 'edf_codigo' => $edf_codigo, 'edf_nombre' => $edf_nombre,'edf_imagen' => $edf_imagen, 'edf_orden' => $edf_orden, 'edf_latitud' => $edf_latitud, 'edf_longitud' => $edf_longitud, 'edf_acronimo' => $edf_acronimo);
        // $top = 0;
        // $edf_codigo = 1;
        // $edf_nombre  = "";
        // $edf_orden  = 0;
        // $edf_latitud  = 0;
        // $edf_longitud  = 0;
        // $edf_acronimo  = "";
        $result = $this->clEdificios->getEdificios_fil($data);
        if ($result) {
            $this->response($result, REST_Controller::HTTP_OK);
        } else {
            $this->response("1:" . $edf_acronimo . " 2:" . $edf_codigo, REST_Controller::HTTP_NOT_FOUND);
        }
    }

    //API - Guarda y actualiza los datos
    function guardarDatos_post()
    {
        $c  = $this->input->post("c");
        $edf_nombre  = $this->input->post("n");
        $edf_orden  = $this->input->post("o");
        $edf_latitud  = $this->input->post("l");
        $edf_longitud  = $this->input->post("lo");
        $edf_acronimo  = $this->input->post("a");
        $edf_imagen = $this->input->post("i");
        $result = $this->clEdificios->guardarDatos($c,array(
            "opc" => $edf_nombre,
            "c" => $edf_nombre,
            "n" => $edf_nombre,
            "o" => $edf_orden,
            "l" => $edf_latitud,
            "lo" => $edf_longitud,
            "a" => $edf_acronimo,
            "i" => $edf_imagen
        ));
        if (empty($result)) {
            $this->response("No se puede insertar/recuperar el registro", REST_Controller::HTTP_NOT_FOUND);
        } else {
            $this->response($result, REST_Controller::HTTP_OK);
        }
        // $edf_codigo = 11;
        // $edf_nombre  = "test";
        // $edf_orden  = 7;
        // $edf_latitud  = 231.1;
        // $edf_longitud  = -9854;
        // $edf_acronimo  = "fdgfg";
        //  if(empty($edf_nombre) || empty($edf_orden) || empty($edf_latitud) || empty($edf_longitud) || empty($edf_acronimo) ){
        //         $this->response("No se pudo ingresar el registro debido a que la inormación no esta completa.", REST_Controller::HTTP_BAD_REQUEST);
        //  }else{
        //     $result = $this->clEdificios->guardarDatos($edf_codigo, array("edf_nombre"=>$edf_nombre, 
        //                                                                     "edf_orden"=>$edf_orden, 
        //                                                                     "edf_latitud"=>$edf_latitud, 
        //                                                                     "edf_longitud"=>$edf_longitud, 
        //                                                                     "edf_acronimo"=>$edf_acronimo));
        //     if(empty($result)){
        //         $this->response("No se puede insertar/recuperar el registro", REST_Controller::HTTP_NOT_FOUND);
        //     }else{
        //         $this->response($result, REST_Controller::HTTP_OK);  
        //     }
        // }
    }

    //API - Borra registros
    function borrarDatos_delete()
    {
        $id = $this->input->delete('c');
        if (!$id) {
            $this->response("Parámetro Perdido", REST_Controller::HTTP_NOT_FOUND);
        }
        $result = $this->clEdificios->borrarDatos($id);
        if (empty($result)) {
            $this->response("Realizado. Afectó: " . $result, REST_Controller::HTTP_OK);
        } else {
            $this->response("Error", REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
