<?php

class arrendamientosController
{

    public function index()
    {

        require_once ('views/components/layout/head.php');
        require_once ('views/arrendamientos/index.php');
        require_once ('views/components/layout/footer.php');

    }
}