
<?php 
require '../../../PHP/Functions.php';
 
   if(isset($_POST['category'])){
      $category = $_POST['category'];
 
      if($category === "all"){
         $products = getAllProducts();
      }else{
         $products = getProductsByCategory($category);
      }
      echo json_encode($products);
   }
   ?>