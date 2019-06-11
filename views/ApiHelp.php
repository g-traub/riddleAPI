<?php $categories = ['Alphabet', 'Animaux', 'Bizarre', 'Charade', 'Compliquée', 'Difficile', 'Facile', 'Localité', 'Meilleure', 'Monsieur et madame', 'Nourriture', 'Pays', 'Sport'];

ob_start(); ?>

<h1>API</h1>
<section>
  <h2>Documentation</h2>
  <p>
    L'url de l'API : 
    <!-- URL à réécrire -->
    <div>http://localhost:8888/scrapedDataAPI_PHP/api/api.php</div>
  </p>
  <h3>Paramètres</h3>
  <p>
    L'url prend deux paramètre : la catégorie et le nombre de devinettes voulues.
  </p>
  <div>
    <h4>Catégorie</h4>
    <p>
      Préciser la catégorie voulue, si aucune catégorie n'est précisée des devinettes de toutes les catégories seront renvoyées.
      exemple :
      <div>http://localhost:8888/scrapedDataAPI_PHP/api/api.php?category=sport</div>
    </p>
    <h5>Liste des catégories : </h5>
    <ul>
      <?php foreach($categories as $category){
        echo  '<li>' . $category . '</li>';
      }
      ?>
    </ul>
  </div>
  <div>
    <h4>Nombre de devinettes</h4>
    <p>
      Préciser le nombre de devinettes voulues, si aucun nombre n'est précisé le maximum de devinettes sera renvoyée.
      exemple :
      <div>http://localhost:8888/scrapedDataAPI_PHP/api/api.php?amount=25</div>
    </p>
  </div>
</section>
<section>
  <h2>Outil d'aide pour l'API</h2>
  <form>
    <label for="amount">Nombre de devinettes</label>
    <input type="number" name="amount" id="amount">

    <label for="category">Catégories</label>
    <select name="category" id="category">
      <option value="">Sélectionnez une catégorie</option>
      <?php foreach($categories as $category){
        echo  '<option value=' . $category . '>' . $category . '</option>';
      }
      ?>
    </select>
    <input type="submit" value="Générer un url pour l'API">
  </form>
  
</section>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>