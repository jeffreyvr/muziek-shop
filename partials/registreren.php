<?php if ( ! han_is_gebruiker_logged_in() ) :

  $gebruikersnaam = filter_input( INPUT_POST, 'gebruikersnaam', FILTER_SANITIZE_STRING );
  $wachtwoord = filter_input( INPUT_POST, 'wachtwoord', FILTER_SANITIZE_STRING );
  $aanhef = filter_input( INPUT_POST, 'aanhef', FILTER_SANITIZE_STRING );
  $voornaam = filter_input( INPUT_POST, 'voornaam', FILTER_SANITIZE_STRING );
  $tussenvoegsel = filter_input( INPUT_POST, 'tussenvoegsel', FILTER_SANITIZE_STRING );
  $achternaam = filter_input( INPUT_POST, 'achternaam', FILTER_SANITIZE_STRING );
  $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_STRING );
  $straatnaam  = filter_input( INPUT_POST, 'straatnaam', FILTER_SANITIZE_STRING );
  $postcode = filter_input( INPUT_POST, 'postcode', FILTER_SANITIZE_STRING );
  $huisnummer = filter_input( INPUT_POST, 'huisnummer', FILTER_SANITIZE_NUMBER_INT );
  $woonplaats = filter_input( INPUT_POST, 'woonplaats', FILTER_SANITIZE_STRING );
  $telefoon = filter_input( INPUT_POST, 'telefoon', FILTER_SANITIZE_STRING );
  $redirect_to = filter_input ( INPUT_GET, 'redirect_to', FILTER_SANITIZE_URL );
  ?>

<div class="message">
  <p>Heb je al een account? Log dan in via het formulier rechtsboven.</p>
</div>

<form method="post">

  <?php if ( !empty( $error ) ) { ?>
    <p class="message message-error">Je hebt een of meerdere velden niet ingevuld.</p>
  <?php } ?>

  <h2>Accountgegevens</h2>

  <input type="hidden" name="form_action" value="registreren">

  <div class="form-group">
    <label for="gebruikersnaam">Gebruikersnaam*:</label>
    <input type="text" name="gebruikersnaam" id="gebruikersnaam" value="<?php echo $gebruikersnaam; ?>" <?php echo ( !empty( $error['gebruikersnaam'] ) ? 'class="error"' : null ); ?>>
  </div>

  <div class="form-group">
    <label for="wachtwoord">Wachtwoord*:</label>
    <input type="password" name="wachtwoord" id="wachtwoord" value="<?php echo $wachtwoord; ?>" <?php echo ( !empty( $error['wachtwoord'] ) ? 'class="error"' : null ); ?>>
  </div>

  <h2>Factuuradres</h2>

  <div class="form-group form-group-inline">
    <div style="display: inline-block;">
      <label for="aanhef">Aanhef*:</label>
      <select name="aanhef" id="aanhef" <?php echo ( !empty( $error['aanhef'] ) ? 'class="error"' : null ); ?>>
        <option <?php echo ( $aanhef == 'm' ? 'selected' : null ); ?> value="m">Dhr.</option>
        <option <?php echo ( $aanhef == 'v' ? 'selected' : null ); ?> value="v">Mevr.</option>
      </select>
    </div>
    <div style="display: inline-block;">
      <label for="voornaam">Voornaam*:</label>
      <input type="text" name="voornaam" id="voornaam" value="<?php echo $voornaam; ?>" <?php echo ( !empty( $error['voornaam'] ) ? 'class="error"' : null ); ?>>
    </div>
    <div style="display: inline-block;">
      <label for="tussenvoegsel">Tussenvoegsel:</label>
      <input type="text" name="tussenvoegsel" id="tussenvoegsel" value="<?php echo $tussenvoegsel; ?>">
    </div>
    <div style="display: inline-block;">
      <label for="achternaam">Achternaam*:</label>
      <input type="text" name="achternaam" id="achternaam" value="<?php echo $achternaam; ?>" <?php echo ( !empty( $error['achternaam'] ) ? 'class="error"' : null ); ?>>
    </div>
  </div>

  <div class="form-group">
    <label for="email">E-mailadres*:</label>
    <input type="email" name="email" id="email" value="<?php echo $email; ?>" <?php echo ( !empty( $error['email'] ) ? 'class="error"' : null ); ?>>
  </div>

  <div class="display: inline-block;">
    <div class="form-group form-group-inline">
      <label for="straatnaam">Straatnaam*:</label>
      <input type="text" name="straatnaam" id="straatnaam" value="<?php echo $straatnaam; ?>" <?php echo ( !empty( $error['straatnaam'] ) ? 'class="error"' : null ); ?>>
    </div>

    <div class="form-group form-group-inline">
      <label for="huisnummer">Huisnummer*:</label>
      <input type="text" name="huisnummer" id="huisnummer" value="<?php echo $huisnummer; ?>" <?php echo ( !empty( $error['huisnummer'] ) ? 'class="error"' : null ); ?>>
    </div>
  </div>

  <div class="display: inline-block;">
    <div class="form-group form-group-inline">
      <label for="postcode">Postcode*:</label>
      <input type="text" name="postcode" id="postcode" value="<?php echo $postcode; ?>" <?php echo ( !empty( $error['postcode'] ) ? 'class="error"' : null ); ?>>
    </div>

    <div class="form-group form-group-inline">
      <label for="woonplaats">Woonplaats*:</label>
      <input type="text" name="woonplaats" id="woonplaats" value="<?php echo $woonplaats; ?>" <?php echo ( !empty( $error['woonplaats'] ) ? 'class="error"' : null ); ?>>
    </div>
  </div>

  <div class="form-group">
    <label for="telefoon">Telefoon*:</label>
    <input type="text" name="telefoon" id="telefoon" value="<?php echo $telefoon; ?>" <?php echo ( !empty( $error['telefoon'] ) ? 'class="error"' : null ); ?>>
  </div>

  <div style="clear: both;"></div>

  <input type="hidden" name="redirect_to" value="<?php echo $redirect_to; ?>">

  <button type="submit">Registreer</button>
</form>
<?php else : ?>
  <p>Je bent al ingelogd.</p>
<?php endif; ?>
