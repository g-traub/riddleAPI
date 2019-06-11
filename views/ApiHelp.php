<?php 
$title = 'Devinette API';
$categories = ['Alphabet', 'Animaux', 'Bizarre', 'Charade', 'Compliquée', 'Difficile', 'Facile', 'Localité', 'Meilleure', 'Monsieur et madame', 'Nourriture', 'Pays', 'Sport'];

ob_start(); ?>
<div class="my-4 fluid-container">
  <div class="d-none alert alert-success" role="alert">
    <h3 class="alert-heading">URL d'API généré : </h3>
    <div class="alert alert-light">http://localhost:8888/scrapedDataAPI_PHP/api/api.php</div>
  </div>
</div>
<div class="my-4 fluid-container">
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
  <div class="my-2">
    <h4>Catégorie</h4>
    <p>
      Préciser la catégorie voulue, si aucune catégorie n'est précisée des devinettes de toutes les catégories seront renvoyées.
      exemple :
      <div class="alert alert-light" >http://localhost:8888/scrapedDataAPI_PHP/api/api.php?category=sport</div>
    </p>
    <h5>Liste des catégories : </h5>
    <ul class="list-group list-group-flush">
      <?php foreach($categories as $category){
        echo  '<li class="bg-secondary list-group-item">' . $category . '</li>';
      }
      ?>
    </ul>
  </div>
  <div class="my-2">
    <h4>Nombre de devinettes</h4>
    <p>
      Préciser le nombre de devinettes voulues, si aucun nombre n'est précisé le maximum de devinettes sera renvoyée.
      exemple :
      <div class="alert alert-light">http://localhost:8888/scrapedDataAPI_PHP/api/api.php?amount=25</div>
    </p>
  </div>
</div>
<div class="my-4 jumbotron text-dark">
  <h2>Outil d'aide pour l'API</h2>
  <form>
    <div class="form-group">
      <label for="amount">Nombre de devinettes</label>
      <input class="form-control" type="number" min=0 max=96 name="amount" id="amount">
    </div>
    <div class="form-group">
      <label for="category">Catégories</label>
      <select class="form-control custom-select" name="category" id="category">
        <option value="">Sélectionnez une catégorie</option>
        <?php foreach($categories as $category){
          echo  '<option value=' . $category . '>' . $category . '</option>';
        }
        ?>
      </select>
    </div>
    <input class="btn btn-primary" type="submit" value="Générer un URL pour l'API">
  </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>