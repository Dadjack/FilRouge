<form method="POST" action="userTown/av">
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