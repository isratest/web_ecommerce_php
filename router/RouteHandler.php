<?php

namespace Router;

class RouteHandler{

    protected $method;
    protected $data;

    public function set_method($method) {
        $this->method = $method;
    }

    
    public function set_data($data) {
        $this->data = $data;
    }
    
    public function route($controller, $id){
        $resource = new $controller();

        switch ($this->method) {
            case "get":
                if ($id && $id == "signup"){
                    $resource->create();
                } elseif ($id == "login"){
                    require("../resources/views/login.php");
                }elseif ($id == "logout"){
                    require("../resources/views/logout.php");
                } else {
                    $resource->index();
                }
                break;
            case "post":
                    $resource->store($this->data);
                break;

            case "user_post":
                $resource->show($_POST);
                break;

            // case "delete":
            //     $resource->delete($id);
            //     break;
        }
    }

}
