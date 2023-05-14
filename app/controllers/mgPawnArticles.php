<?php
class mgPawnArticles extends controller{
    
     public function index(){

        isLoggedIn();
        $this->view("/Manager/pawnArticle_Dashboard");
     }

     public function viewPawnedItem(){
      
      isLoggedIn();
      $this->view("/Manager/viewPawnedItem");
     }

     
}
?>