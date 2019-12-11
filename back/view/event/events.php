<?php
    require_once '../../core/EvenementCore.php';
    $evenementCore= new EvenementCore();

    $events=$evenementCore->getAll();


require_once '../header.php'; ?>




<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Evenements</h1>
          <p></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Les Evenements <div style="float:right;"> <a href="ajouter.php" >Ajouter</a> </div></div>

          </div>
        </div>

        <?php foreach($events as $event): ?>
            <div class="col-lg-4">
                <div class="bs-component">
                <div class="card">
                    <h4 class="card-header"><?= $event->nom ?></h4>
                    <img style="height: 200px; width: 100%; display: block;" src="<?=WRC_URL.$event->image?>" alt="Card image">
                    <div class="card-body">
                    <p class="card-text"><?=$event->descp?></p>
                    <a class="card-link" href="modifier.php?id=<?=$event->id ?>">Modifier</a>
                    <a class="card-link" href="reservations.php?id=<?=$event->id ?>">Participant</a>
                    </div>
                    <div class="card-footer text-muted"><?=$event->dated ?> <div style="float: right;"> participant </div></div>

                </div>
                </div>
          </div>
          <?php endforeach ?>

    </div>
</main>








<?php require_once '../footer.php'; ?>
