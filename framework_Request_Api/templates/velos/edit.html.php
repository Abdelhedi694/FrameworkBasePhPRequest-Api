<form action="?type=velo&action=change" method="post">
<h4>Nom du vélo</h4>
<input type="text" name="name" value="<?= $velo->getName() ?>">
<hr>
<h4>Description du vélo</h4>
<textarea name="description" cols="30" rows="10"><?= $velo->getDescription() ?></textarea>
<hr>
<h4>url de l'image</h4>
<input type="text" name="image" value="<?= $velo->getImage() ?>">
<hr>
<h4>Prix du vélo</h4>
<input type="text" name="price" id="" value="<?= $velo->getPrice() ?>">
<button type="submit" class="btn btn-warning" name="idEdit" value="<?= $_GET['id'] ?>">Modifier</button>

</form>