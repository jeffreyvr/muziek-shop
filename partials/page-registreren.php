<form method="post">

  <h2>Accountgegevens</h2>

  <input type="hidden" name="form_action" value="registreren">

  <div class="form-group">
    <label for="gebruikersnaam">Gebruikersnaam*:<label>
    <input type="text" name="gebruikersnaam" id="gebruikersnaam">
  </div>

  <div class="form-group">
    <label for="wachtwoord">Wachtwoord*:<label>
    <input type="password" name="wachtwoord" id="wachtwoord">
  </div>

  <h2>Factuuradres</h2>

  <div class="form-group form-group-inline">
    <div style="display: inline-block;">
      <label for="aanhef">Aanhef*:<label>
      <select name="aanhef" id="aanhef">
        <option value="m">Dhr.</option>
        <option value="v">Mevr.</option>
      </select>
    </div>
    <div style="display: inline-block;">
      <label for="voornaam">Voornaam*:<label>
      <input type="text" name="voornaam" id="voornaam">
    </div>
    <div style="display: inline-block;">
      <label for="tussenvoegsel">Tussenvoegsel:<label>
      <input type="text" name="tussenvoegsel" id="tussenvoegsel">
    </div>
    <div style="display: inline-block;">
      <label for="achternaam">Achternaam*:<label>
      <input type="text" name="achternaam" id="achternaam">
    </div>
  </div>

  <div class="form-group">
    <label for="email">E-mailadres*:<label>
    <input type="email" name="email" id="email">
  </div>

  <div class="display: inline-block;">
    <div class="form-group form-group-inline">
      <label for="text">Straatnaam*:<label>
      <input type="text" name="straatnaam" id="straatnaam">
    </div>

    <div class="form-group form-group-inline">
      <label for="huisnummer">Huisnummer*:<label>
      <input type="text" name="huisnummer" id="huisnummer">
    </div>
  </div>

  <div class="display: inline-block;">
    <div class="form-group form-group-inline">
      <label for="postcode">Postcode*:<label>
      <input type="text" name="postcode" id="postcode">
    </div>

    <div class="form-group form-group-inline">
      <label for="woonplaats">Plaats*:<label>
      <input type="text" name="woonplaats" id="woonplaats">
    </div>
  </div>

  <div class="form-group">
    <label for="telefoon">Telefoon*:<label>
    <input type="text" name="telefoon" id="telefoon">
  </div>

  <div style="clear: both;"></div>

  <button type="submit">Registreer</button>
</form>
