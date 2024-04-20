<?php 

class usersController {

    public function index(){

        require_once('views/components/layout/head.php');
        require_once('views/users/index.php');
        require_once('views/components/layout/footer.php');

    }
}
