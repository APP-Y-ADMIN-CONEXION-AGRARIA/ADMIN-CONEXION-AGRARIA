<?php

class TerritoriosController {

    public function index(){

        require_once('views/components/layout/head.php');
        require_once('views/territorios/index.php');
        require_once('views/components/layout/footer.php');

    }

    public function show(){
        require_once('views/components/layout/head.php');
        require_once('views/territorios/show.php');
        require_once('views/components/layout/footer.php');
    }

    public function edit(){
        require_once('views/components/layout/head.php');
        require_once('views/territorios/edit.php');
        require_once('views/components/layout/footer.php');
    }

    public function create(){
        require_once('views/components/layout/head.php');
        require_once('views/territorios/create.php');
        require_once('views/components/layout/footer.php');
    }
}