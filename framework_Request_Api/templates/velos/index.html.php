<a href="?type=velo&action=new" class="btn btn-success">Créer un nouveau vélo</a>

<?php foreach($velos as $velo) { ?> 
    
    <hr>
    <img src="images/<?= $velo->getImage() ?>" style="max-width:200px" alt="">
    <h2>Nom du vélo : </h2>
    <p><?= $velo->getName() ?></p>
    <h2>Description du vélo : </h2>
    <p><?= $velo->getDescription() ?></p>
    <h2>Prix : </h2>
    <p><?= $velo->getPrice() ?>€</p>
    <a href="?type=velo&action=show&id=<?= $velo->getId() ?>" class="btn btn-primary">Voir ce vélo</a>
    <hr>
    
    
    
    
    
    <?php } ?>