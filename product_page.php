<?php
//CONNECT TO DATABASE
$arr = explode("/",$_SERVER['PHP_SELF']);
$CurrentDIR = '/' . $arr[1] . '/' . $arr[2];

include("header.php");


?>

<div class="container p-4">
<div class="row">
<div class="col">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent">
    <li class="breadcrumb-item active" aria-current="page">Products</li>
  </ol>
</nav>
</div>
</div>
  <div class="row">
  <div class="col-3">
    <?php include("filter_category.php"); ?>
  </div>
  <div class="col-9">

<?php

$pid = (isset($_POST['product'])) ? $_POST['product'] : '';
//select products based on specific product id
$sql="SELECT * FROM product ";
$results= mysqli_query($db, $sql);

while($row = mysqli_fetch_array($results)){

  $prod_id = $row["prod_id"];
  $prod_category = $row["prod_category"];
  $prod_title = $row["prod_title"];
  $prod_price = $row["prod_price"];
  $prod_description = $row["prod_description"];
  $prod_image = $row["prod_image"];

  echo "
<div class = 'productList bg-white'>
  <div class='col-md-8 p-1 mx-auto'  style = 'width : 250px; height : 300px;'>
                <div class='panel panel-default ' >
                    <div id='title' class='panel-heading'>$prod_title</div>
                        <div class='panel-body' style=' height: auto; overflow: hidden;'>
                            <a href = 'description_page.php?id=$prod_id'>
                                <img id='image' class='img-responsive' src='images/$prod_image' style = 'width : 100px; height:100px;'>
                              </a>
                        </div>
                        <form method='POST' action='cart.php?action=add&id=$prod_id&quantity=1'>
                          <div class='panel-heading'>
                              $ $prod_price
                              <button class='btn btn-info btn-xs' type='submit' name='add_to_cart'>
                                Add To Cart
                              </button>
                          </div>
                        </form>

                    </div>
        </div>
        </div>
    ";

};

    ?>
  </div>
  </div>
</div>

<?php include ("footer.php"); ?>