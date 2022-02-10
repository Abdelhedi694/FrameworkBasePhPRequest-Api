<hr>
    <img src="images/<?= $velo->getImage() ?>" style="max-width:200px" alt="">
    <h2>Nom du vélo : </h2>
    <p><?= $velo->getName() ?></p>
    <h2>Description du vélo : </h2>
    <p><?= $velo->getDescription() ?></p>
    <h2>Prix : </h2>
    <p><?= $velo->getPrice() ?>€</p>
    <form action="?type=velo&action=suppr" method="post">
            <button type="submit" name="id" value="<?= $velo->getId() ?>" class="btn btn-danger">Supprimer ce vélo</button>
        </form>
        <a href="?type=velo&action=change&id=<?= $velo->getId() ?>" class="btn btn-warning">Modifier</a>
<hr>

<?php foreach ($velo->getAvis() as $unAvis) :?>
<div class="bg-success mb-1 p-1">
  <h4><?= $unAvis->getAuthor()->getDisplayName() ?></h4>
  <p><?= $unAvis->getContent() ?></p>
  <form action="?type=avis&action=delete" method="post">
            <button type="submit" name="id" value="<?= $unAvis->getId() ?>" class="btn btn-danger">Supprimer cet avis</button>
            <input type="hidden" name="idVelo" value="<?= $velo->getId() ?>">
        </form>
        <a href="?type=avis&action=change&id=<?= $unAvis->getId() ?>" class="btn btn-warning">Modifier</a>
</div>

<?php endforeach ?>

<?php 

if (!$velo->getAvis()) {
  
echo "<p>Aucun message existe soyez le premier a poster !!</p>";
}
?>

<?php if(\Models\User::getUser()){ ?>
    <form action="?type=avis&action=new" method="post">


        <div class="form-group">
            <input type="text" placeholder="votre avis" name="content" id="">
        </div>
        <div class="form-group">
            <input type="hidden" name="veloId" value="<?=$velo->getId() ?>">
        </div>
        <div class="form-group">

            <button class="btn btn-success" type="submit">Poster</button>
        </div>
    </form>

<?php }else{ ?>

    <h2>Connectez vous pour commenter   </h2>
    <a href="?type=user&action=signin" class="btn btn-primary">sign in</a>

<?php } ?>