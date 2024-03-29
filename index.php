<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Devinettes API</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" rel="stylesheet">
    </head>

    <body class="bg-dark">
      <header class="navbar navbar-dark bg-primary">
        <div class="container text-light" href="#">
          Devinettes API
          <img src="./assets/logo.svg" width="60" height="60" class="d-inline-block align-bottom" alt="">
        </div>
      </header>
      <div class="container">

<?php
$categories = ['Alphabet', 'Animaux', 'Bizarre', 'Charade', 'Compliquée', 'Difficile', 'Facile', 'Localité', 'Meilleure', 'Monsieur et madame', 'Nourriture', 'Pays', 'Sport'];
?>

<div class="my-4 fluid-container">
  <div class="

  <?php
if ((isset($_GET['amount']) && $_GET['amount'] !== '') || (isset($_GET['category']) && $_GET['category'] !== '')) {
    if (isset($_GET['amount']) && $_GET['amount'] >= 0 && $_GET['amount'] < 97) {
        $amount = $_GET['amount'];
    }
    if (isset($_GET['category']) && in_array($_GET['category'], $categories)) {
        $category = $_GET['category'];
    }
} else {
    echo 'd-none';
}
?>
   alert alert-success" role="alert">
    <h3 class="alert-heading">URL d'API généré : </h3>
    <div class="alert alert-light text-success">http://localhost:8888/scrapedDataAPI_PHP/api/api.php<?php
if (isset($amount) && isset($category)) {
    echo '?amount=' . $amount . '&category=' . $category;
} else if (isset($amount)) {
    echo '?amount=' . $amount;
} else if (isset($category)) {
    echo '?category=' . $category;
}
?></div>
  </div>
</div>
<div class="my-4 py-4 jumbotron fluid-container">
  <h2>Documentation</h2>
  <p>
    L'url de l'API :
    <!-- URL à réécrire -->
    <div class="alert alert-light">http://localhost:8888/scrapedDataAPI_PHP/api/api.php</div>
  </p>
  <h3>Paramètres</h3>
  <p>
    L'url prend deux paramètre : la catégorie et le nombre de devinettes voulues.
  </p>
  <div class="my-4">
    <h4>Catégorie</h4>
    <p>
      Préciser la catégorie voulue, si aucune catégorie n'est précisée des devinettes de toutes les catégories seront renvoyées.
      exemple :
      <div class="alert alert-light" >http://localhost:8888/scrapedDataAPI_PHP/api/api.php?category=Sport</div>
    </p>
    <h5>Liste des catégories : </h5>
    <ul class="list-group list-group-flush">
      <?php foreach ($categories as $category) {
    echo '<li class="list-group-item">' . $category . '</li>';
}
?>
    </ul>
  </div>
  <div class="my-4">
    <h4>Nombre de devinettes</h4>
    <p>
      Préciser le nombre de devinettes voulues, si aucun nombre n'est précisé le maximum de devinettes sera renvoyée.
      exemple :
      <div class="alert alert-light">http://localhost:8888/scrapedDataAPI_PHP/api/api.php?amount=25</div>
    </p>
  </div>
</div>
<div class="my-4 py-4 jumbotron">
  <h2>Outil d'aide pour l'API</h2>
  <form>
    <div class="form-group">
      <label for="amount">Nombre de devinettes</label>
      <input class="form-control" type="number" value="10" min=0 max=96 name="amount" id="amount">
      <small id="AmountHelp" class="form-text text-muted">Si il n'y pas suffisament de devinettes pour une catégorie donnée le maximum pour la catégorie sera renvoyé.</small>
    </div>
    <div class="form-group">
      <label for="category">Catégories</label>
      <select class="form-control custom-select" name="category" id="category">
        <option value="">Sélectionnez une catégorie</option>
        <?php foreach ($categories as $category) {
    echo '<option value=' . $category . '>' . $category . '</option>';
}
?>
      </select>
    </div>
    <input class="btn btn-primary" type="submit" value="Générer un URL pour l'API">
  </form>
</div>
</div>
</body>
</html>