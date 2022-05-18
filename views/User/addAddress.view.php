<!--<> FORMULAIRE CHANGEMENT DE L'ADRESSE- <>-->
<form method="POST" action="userAddress/av">
  <div class="form-row">
    <div class="form-group">
      <label for="street_number">Numéro de la rue :</label>
      <input type="number" class="form-control" name="street_number" id="street_number" placeholder="1234" required>
    </div>
    <div class="form-group">
      <label for="street_name">Adresse :</label>
      <input type="text" class="form-control" name="street_name" id="street_name" placeholder="Main St" required>
    </div>
    <div class="form-group">
      <label for="additional_address">Complément d'adresse :</label>
      <input type="text" class="form-control" name="additional_address" id="additional_address" placeholder="Apartment, studio, or floor">
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>

<!--<> FORMULAIRE CHANGEMENT DE LA VILLE <>-->
<form method="POST" action="account/validationChangeTown">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name_town">Ville :</label>
      <input type="text" class="form-control" name="name_town" id="name_town" placeholder="Ville" required>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
      <label for="postal_code">Code postal :</label>
      <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="50000" required>
    </div>
    <!-- <div class="form-group col-md-4">
      <label for="inputDelivery">Type de livraison :</label>
      <select id="inputDelivery" class="form-control">
        <option selected>Choisir</option>
        <option value="1">Domicile</option>
        <option value="2">Travail</option>
        <option value="3">Autre</option>
      </select>
    </div> -->
    <!-- <div class="form-group col-md-4">
      <label for="inputState">Région :</label>
      <select id="inputState" class="form-control">
        <option selected>Choisir</option>
      <option>...</option>
      </select>
    </div> -->
  </div>
  <button type="submit" class="btn btn-primary">Valider</button>
</form>