<form action="?type=avis&action=change" method="post">

<hr>
<h4>Contenu</h4>
<textarea name="content" cols="30" rows="10"><?= $avis->getContent() ?></textarea>

<button type="submit" class="btn btn-warning" name="idEdit" value="">Modifier</button>

</form>