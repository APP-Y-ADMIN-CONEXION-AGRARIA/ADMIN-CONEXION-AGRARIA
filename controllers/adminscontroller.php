<?php

class adminsController{

    public function index(){

        require_once('./views/components/layout/head.php');
        require_once('./views/admins/index.php');
        require_once('./views/components/layout/footer.php');

    }

    public function create(){

        require_once('./views/components/layout/head.php');
        require_once('./views/admins/create.php');
        require_once('./views/components/layout/footer.php') ;

    }

    public function show(){

        require_once('./views/components/layout/head.php');
        require_once('./views/admins/show.php');
        require_once('./views/components/layout/footer.php');

    }
    
    public function edit(){

        require_once('./views/components/layout/head.php');
        require_once('./views/admins/edit.php');
        require_once('./views/components/layout/footer.php');
        
    }
}