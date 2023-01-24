<?php
class mgPawnArticles extends controller{
    
     public function index(){

        isLoggedIn();
        $this->view("/Manager/pawnArticle_dashboard");
     }
}
?>