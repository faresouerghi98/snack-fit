<?php
require_once '../header.php';
require_once 'SMS.php';
?>

<?php if (!isset($_SESSION['user'])) : ?>
  <script type="text/javascript">
  window.location.href = '<?= BASE_URL?>view/user/login.php ';
  </script>
<?php endif; ?>


<?php
require_once '../../core/EvenementCore.php';
$evenementCore= new EvenementCore();

$event=$evenementCore->findById($_GET['id']);

if(isset($_POST['reserve'])&&isset($_POST['qty'])){
  //var_dump($evenementCore->getParticipation($_SESSION['user']->id,$_GET['id']));die;
  if($_POST['qty']>$event->nb_place) echo "<script>alert(\"nombre de place insuffisant\")</script>";

  else if (count($evenementCore->getParticipation($_SESSION['user']->id,$_GET['id'])) >0) echo "<script>alert(\"vous avez deja reserver de place\")</script>";
  else {
    $evenementCore->participer($_SESSION['user']->id,$_GET['id'],$_POST['qty']);
    $prix=$_POST['qty']*$event->prix;

    SMS::send("Snack-Fit Events","Mr-M ".$_SESSION['user']->username ."Vous avez reserver ".$_POST['qty']." places pour l'evenement ".$event->nom." veuillez payer la somme de ".$prix." au pres de nos guicher dans les prochaines 24h.");


      echo "<script type=\"text/javascript\">  window.location.href = '".BASE_URL."view/event/events.php ';</script>";
  }
  ?>
  <?php if (!isset($_SESSION['user'])) : ?>
    <script type="text/javascript">
    window.location.href = '<?= BASE_URL?>view/user/login.php ';
    </script>
  <?php endif; ?>
  <?php

}




?>

<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">



        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a class="gallery_img" href="img/product-img/pro-big-1.jpg">
                                    <img class="d-block w-100" src="<?= WR_URL.$event->image?>" alt="First slide">
                                </a>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price"><?= $event->prix?> DT</p>
                        <a href="product-details.html">
                            <h6><?= $event->nom?></h6>
                        </a>
                        <!-- Ratings & Review -->

                        <!-- Avaiable -->
                        <?php if ($event->nb_place > 0): ?>
                              <p class="avaibility"><i class="fa fa-circle"></i> Place Disponible</p>
                        <?php else: ?>
                              <p class="avaibility"><i class="fa fa-circle" style="color:red;"></i> Complet</p>
                        <?php endif; ?>

                    </div>
                    <div class="short_overview my-5">
                        <h5>du <?= $event->dated?> a <?= $event->datef?> a <?= $event->lieu?></h5>

                    </div>
                    <div class="short_overview my-5">
                        <p><?= $event->descp?></p>
                    </div>

                    <!-- Add to Cart Form -->
                    <?php if ($event->nb_place > 0): ?>
                      <form class="cart clearfix" method="post" action="#">
                          <div class="cart-btn d-flex mb-50">
                              <p>nb Ticket</p>
                              <div class="quantity">
                                  <span class="qty-minus" onclick=" var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--; pchange();return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                  <input type="number"  class="qty-text" id="qty" step="1" min="1" max="5" name="qty" value="1">
                                  <span class="qty-plus" onclick=" var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++; pchange();return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                              </div>
                              <p>Total:<label for="" id="price"><?= $event->prix?></label> DT</p>
                          </div>

                          <button type="submit" name="reserve" value="5" class="btn amado-btn">Reserver</button>
                      </form>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  function pchange() {
    var effect = document.getElementById('qty')

    $("#price").html( effect.value * <?= $event->prix?>);
  }
</script>


<?php require_once '../footer.php'?>
