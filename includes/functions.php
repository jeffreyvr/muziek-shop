<?php
/**
 * Error screen
 *
 * Maakt een error scherm.
 *
 * @param  string $message
 * @param  string $title
 */
function han_error_screen( $message, $title = '' ) {
  include PARTIAL_PATH . 'header.php';

  echo '<div class="message message-error">';
    echo ( ! empty( $title ) ? '<strong>' . $title . '</strong>' : null );
    echo $message;
  echo '</div>';

  include PARTIAL_PATH . 'footer.php';

  die(); // error dus stoppen met alles
}

/**
 * Form handeler
 *
 * Controleert of een formulier met specifieke 'action'
 * is verzonden en zorgt voor aanroep van
 * bijhorende functie
 */
function han_formhandeler() {
  if ( ! isset ( $_POST ) ) return; // controleer of GET bestaat

  if( empty( $_POST['form_action'] ) ) return; // controleer of form_action een waarde heeft

  $form_actions = array( 'login', 'logout', 'winkelwagen', 'winkelwagen_bijwerken', 'registreren' ); // mogelijke actions

  if ( in_array( $_POST['form_action'], $form_actions ) ) {
    call_user_func( 'han_do_' . $_POST['form_action'] );
  }
}

/**
 * Get gebruikers
 *
 * Evt. nog argumenten toevoegen aan functie: limit, offset, order etc.
 *
 * @return array
 */
function han_get_gebruikers() {
  global $db;

  $statement = "SELECT * FROM GEBRUIKER";

  $query = $db->query( $statement );

  return $query->fetchAll();
}

/**
 * Get gebruikers
 *
 * @return array
 */
function han_get_gebruiker_by_gebruikersnaam($gebruikersnaam) {
  global $db;

  $query = $db->prepare('SELECT * FROM GEBRUIKER WHERE GEBRUIKERSNAAM = :gebruikersnaam');

  $query->execute( [ 'gebruikersnaam' => $gebruikersnaam ] );

  return $query->fetch();
}

/**
 * Do login
 */
function han_do_login() {
  if ( empty( $_POST['gebruikersnaam'] ) || empty( $_POST['wachtwoord'] ) ) {
    han_error_screen( 'Er zijn geen inloggegevens ingevuld', 'Fout bij inloggen' );
  }

  $gebruiker = han_get_gebruiker_by_gebruikersnaam( $_POST['gebruikersnaam'] );

  if ( $gebruiker['WACHTWOORD'] == $_POST['wachtwoord'] ) {
    $_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam'];
  } else {
    han_error_screen( 'Foutief wachtwoord', 'Fout bij inloggen' );
  }
}

/**
 * Do winkelwagen
 */
function han_do_winkelwagen() {
  if ( empty( $_POST['productnummer'] ) ) {
    han_error_screen( 'Er is geen productnummer bekend', 'Fout bij inloggen' );
  }

  if ( !empty( $_SESSION['winkelwagen'][$_POST['productnummer']] ) ) {
    $_SESSION['winkelwagen'][$_POST['productnummer']]['aantal']++;
  } else {
    $_SESSION['winkelwagen'][$_POST['productnummer']]['aantal'] = 1;
  }

  header("location: index.php?page=winkelwagen");
  exit;
}

/**
 * Do winkelwagen bijwerken
 */
function han_do_winkelwagen_bijwerken() {
  $producten = $_POST['product'];

  foreach ( $producten as $productnummer => $aantal ) {
    $_SESSION['winkelwagen'][$productnummer]['aantal'] = $aantal;
  }

  if ( isset( $_POST['delete'] ) ) {
    unset( $_SESSION['winkelwagen'][$_POST['delete']] );
  }

  header("location: index.php?page=winkelwagen");
  exit;
}

/**
 * Get winkelwagen
 *
 * @return array|null
 */
function han_get_winkelwagen() {
  return ( !empty( $_SESSION['winkelwagen'] ) ? $_SESSION['winkelwagen'] : null );
}

/**
 * Get winkelwagen totaal
 *
 * @return int|null
 */
function han_get_winkelwagen_totaal() {
  $winkelwagen = han_get_winkelwagen();

  if ( empty( $winkelwagen ) ) return;

  $total = 0;

  foreach ( $winkelwagen as $productnummer => $item ) {
    $product = han_get_product_by_productnummer( $productnummer );
    $total = $total + ( $product['PRIJS'] * $item['aantal'] );
  }

  return $total;
}

/**
 * Is gebruiker logged in
 */
function han_is_gebruiker_logged_in() {
  return ( isset( $_SESSION['gebruikersnaam'] ) ? true : false );
}

/**
 * Log out
 */
function han_do_logout() {
  session_destroy();

  // redirect
  header('location: index.php?page=login');
  exit;
}

/**
 * Get producten
 *
 * @return array
 */
function han_get_producten() {
  global $db;

  $statement = "SELECT * FROM PRODUCT";

  $query = $db->query( $statement );

  return $query->fetchAll();
}

/**
 * Format price
 *
 * @param  int $price
 * @return string
 */
function han_format_price( $price, $currency = '&euro;' ) {
  return $currency . ' ' . number_format( $price, 2, ",", "." );
}

/**
 * Get product by productnummer
 *
 * @param  int $productnummer
 * @return array
 */
function han_get_product_by_productnummer( $productnummer ) {
  global $db;

  $query = $db->prepare('SELECT * FROM PRODUCT WHERE PRODUCTNUMMER = :productnummer');

  $query->execute( [ 'productnummer' => $productnummer ] );

  return $query->fetch();
}

/**
 * Registreren
 */
function han_do_registreren() {
  global $db, $error;

  foreach ( $_POST as $post => $value ) {
    if ( empty( $value ) && $post !== 'tussenvoegsel' ) {
      $error[$post] = 'leeg';
    }
  }

  if ( empty( $error ) ) {
    $query = $db->prepare("INSERT INTO GEBRUIKER (GEBRUIKERSNAAM, VOORNAAM, TUSSENVOEGSEL, ACHTERNAAM, STRAATNAAM, HUISNUMMER, POSTCODE, WOONPLAATS, EMAIL, SEXE, WACHTWOORD) VALUES
    (:gebruikersnaam, :voornaam, :tussenvoegsel, :achternaam, :straatnaam, :huisnummer, :postcode, :woonplaats, :email, :sexe, :wachtwoord)");

    $query->bindParam(':gebruikersnaam', $_POST['gebruikersnaam']);
    $query->bindParam(':voornaam', $_POST['voornaam']);
    $query->bindParam(':tussenvoegsel', $_POST['tussenvoegsel']);
    $query->bindParam(':achternaam', $_POST['achternaam']);
    $query->bindParam(':straatnaam', $_POST['straatnaam']);
    $query->bindParam(':huisnummer', $_POST['huisnummer']);
    $query->bindParam(':postcode', $_POST['postcode']);
    $query->bindParam(':woonplaats', $_POST['woonplaats']);
    $query->bindParam(':email', $_POST['email']);
    $query->bindParam(':sexe', $_POST['aanhef']);
    $query->bindParam(':wachtwoord', $_POST['wachtwoord']);

    $query->execute();
  }
}
