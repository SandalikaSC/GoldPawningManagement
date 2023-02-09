<?php
class ownerPawnArticleDash extends controller
{

   public function index()
   {

      isLoggedIn();
      $this->view("/Owner/ownerPawnArticlesDash");
   }

   public function viewAuctionItem(){
      isLoggedIn();
      $this->view("/Owner/ownerPawnArticlesDash");
      
   }
}