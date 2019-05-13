<?php
use Restserver\Libraries\REST_Controller;
require(APPPATH . 'libraries/REST_Controller.php'); 
class userApi extends REST_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarioModel');
    }
    //API - client sends isbn and on valid isbn book information is sent back
    function userPorCred_get(){
        $user  = $this->get('user');
        $pass  = $this->get('pass');
        
        if(!$user || !$pass){
            $this->response("Usuario o contraseña no especificado", 400);
            exit;
        }
        $result = $this->usuarioModel->getUsuarioPorCred($user, $pass);
        if($result){
            $this->response($result, 200); 
            exit;
        } 
        else{
             $this->response("Credenciales Inválidas", 404);
            exit;
        }
    } 
    //API -  Fetch All books
    function usuariosLista_get(){
        $result = $this->usuarioModel->getUsuarios();
        if($result){
            $this->response($result, 200); 
        } 
        else{
            $this->response("No se encontraron Registros", 404);
        }
    }
     
    //API - create a new book item in database.
    function addBook_post(){
         $name      = $this->post('name');
         $price     = $this->post('price');
         $author    = $this->post('author');
         $category  = $this->post('category');
         $language  = $this->post('language');
         $isbn      = $this->post('isbn');
         $pub_date  = $this->post('publish_date');
        
         if(!$name || !$price || !$author || !$price || !$isbn || !$category){
                $this->response("Enter complete book information to save", 400);
         }else{
            $result = $this->book_model->add(array("name"=>$name, "price"=>$price, "author"=>$author, "category"=>$category, "language"=>$language, "isbn"=>$isbn, "publish_date"=>$pub_date));
            if($result === 0){
                $this->response("Book information coild not be saved. Try again.", 404);
            }else{
                $this->response("success", 200);  
           
            }
        }
    }
    
    //API - update a book 
    function updateBook_put(){
         
         $name      = $this->put('name');
         $price     = $this->put('price');
         $author    = $this->put('author');
         $category  = $this->put('category');
         $language  = $this->put('language');
         $isbn      = $this->put('isbn');
         $pub_date  = $this->put('publish_date');
         $id        = $this->put('id');
         
         if(!$name || !$price || !$author || !$price || !$isbn || !$category){
                $this->response("Enter complete book information to save", 400);
         }else{
            $result = $this->book_model->update($id, array("name"=>$name, "price"=>$price, "author"=>$author, "category"=>$category, "language"=>$language, "isbn"=>$isbn, "publish_date"=>$pub_date));
            if($result === 0){
                $this->response("Book information coild not be saved. Try again.", 404);
            }else{
                $this->response("success", 200);  
            }
        }
    }
    //API - delete a book 
    function borrarDatos_delete()
    {
        $id  = $this->delete('id');
        if(!$id){
            $this->response("Parámetro Perdido", 404);
        }
         
        if($this->usuarioModel->delete($id))
        {
            $this->response("Realizado", 200);
        } 
        else
        {
            $this->response("Error", 400);
        }
    }
}