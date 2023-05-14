
<?php
class ownerAuction extends controller
{

   //to view auction articles
   public function index()
   {

      isLoggedIn();
      $auction = $this->model("auctionArticleModel");
      $result = $auction->getAuctionArticles();
      $this->view("/Owner/ownerAuctionDashboard", $result);
     
   }

   //to view the details of auctioned article
   public function viewAuctionItem($article_id)
   {
      isLoggedIn();
      $auction = $this->model("auctionArticleModel");
      $result = $auction->viewAuctionArticle($article_id);
      $sum = 0;
      foreach ($result[1] as $row) {
         $sum = $sum + $row->Amount;
      }
      $result[] = $sum;
      $this->view("/Owner/ownerViewAuctionItem", $result);
   }


   //to filter the articles
   public function filter()
   {
      $auctionDate=isset($_POST['auction-date']) ? $_POST['auction-date'] : '';
      $firstDate = isset($_POST['created-date']) ? $_POST['created-date'] : '';
      $secondDate = isset($_POST['end-date']) ? $_POST['end-date'] : '';
      $karatage = isset($_POST['karatage']) ? $_POST['karatage'] : '';
      $type = isset($_POST['type']) ? $_POST['type'] : '';
      $minWeight = isset($_POST['min-weight']) ? floatval($_POST['min-weight']) : '';
      $maxWeight = isset($_POST['max-weight']) ? floatval($_POST['max-weight']) : '';

      $auction = $this->model("auctionArticleModel");
      $res = $auction->filter($auctionDate, $firstDate, $secondDate,  $karatage,  $type,$minWeight,$maxWeight);

      if($res){
         isLoggedIn();
         $this->view("/Owner/ownerAuctionDashboard", $res);

      }else{
         $this->view("/Owner/ownerAuctionDashboard", 0);

      }
      
   }
}
?>
