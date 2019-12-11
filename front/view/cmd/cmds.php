<?php
  require_once '../header.php'?>
  <?php if (!isset($_SESSION['user'])) : ?>
    <script type="text/javascript">
    window.location.href = '<?= BASE_URL?>view/user/login.php ';
    </script>
  <?php endif; ?>

  <?php
    require_once('../../core/CommandeCore.php');
    $CommandeCore= new CommandeCore();
    $cmds= $CommandeCore->getAllByID($_SESSION['user']->id);

    require_once '../header.php'
?>



<div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Prix Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cmds as $key => $value):  ?>
                                    <tr>

                                        <td class="cart_product_desc">
                                            <h5>White Modern Chair</h5>
                                        </td>
                                        <td class="price">
                                            <span><?= $value->Prix * $value->Qty ?> DT</span>
                                        </td>
                                        <td><a href="<?= BASE_URL?>view/reclamation/reclamer.php?id=<?= $value->id_commande?>"> reclamer</a></td>

                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


<?php
    require_once '../footer.php';
?>
