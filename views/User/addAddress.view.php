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