<?php
include 'view/View.php';
 
class PermissionView extends View{
    public function logoff() {
        $this->render('logoff');
    }
    public function login() {
        $this->render('login');
    }
    public function restricted() {
        $this->render('restricted');
    }
}
?>