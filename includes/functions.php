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
  global $config;

  include $config['paths']['partial'] . 'header.php';

  echo '<div class="container">';
    echo '<div class="message message-error">';
      echo ( ! empty( $title ) ? '<strong>' . $title . '</strong>' : null );
      echo $message;
    echo '</div>';
  echo '</div>';

  include $config['paths']['partial'] . 'footer.php';

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
    han_error_screen( 'Er zijn geen inloggegevens ingevuld.', 'Fout bij inloggen' );
  }

  $gebruiker = han_get_gebruiker_by_gebruikersnaam( $_POST['gebruikersnaam'] );

  if ( $gebruiker['WACHTWOORD'] == $_POST['wachtwoord'] ) {
    $_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam'];
  } else {
    han_error_screen( 'Je hebt een foute gebruikersnaam en/of wachtwoord ingevoerd.', 'Fout bij inloggen' );
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

  header("location: index.php?page=winkelwagen&message=1");
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
 * Get Producten
 *
 * Haal producten eventueel op basis van argumenten als search, category, offset en limit.
 *
 * @param  array $custom_arguments
 *
 * @return array
 */
function han_get_producten( $custom_arguments = array() ) {
  global $db;

  $arguments = [ 'offset' => 0, 'limit' => 12 ];

  if ( !empty( $custom_arguments ) ) {
    $arguments = array_merge( $arguments, $custom_arguments );
  }

  $statement = "SELECT * FROM PRODUCT";

  $wheres = [];

  if ( ! empty( $arguments['category'] ) ) {
    $wheres[] = "CATEGORIE = :category";
  }

  if ( ! empty( $arguments['search'] ) ) {
    $arguments['search'] = "%{$arguments['search']}%";
    $wheres[] = "PRODUCTNAAM LIKE :search";
  }

  foreach ( $wheres as $i => $where ) {
    if ( $i == 0 ) {
      $statement .= " WHERE";
    }

    if ( $i > 0 ) {
      $statement .= " AND";
    }

    $statement .= " {$where}";
  }

  $statement .= " LIMIT :offset, :limit ";

  $query = $db->prepare( $statement );

  $query->execute( $arguments );

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
    if ( empty( $value ) && ( $post == 'tussenvoegsel' || $post == 'redirect_to' ) == false ) {
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

    try {
      $query->execute();

      $_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam']; // log gebruiker in na registratie

    } catch(Exception $e) {
      han_error_screen( "Er ging iets mis met het registreren.<br>{$e->getMessage()}", 'Fout bij registreren' );
    }

    if ( isset( $_POST['redirect_to'] ) ){

      if( ! empty( $_POST['redirect_to'] ) ) {
        header("location: " . filter_input( INPUT_POST, 'redirect_to', FILTER_SANITIZE_STRING ) );
      } else {
        header("location: index.php");
      }
    }
  }
}

/**
 * Get categories
 *
 * @return array
 */
function han_get_categories() {
  global $db;

  $query = $db->query('SELECT * FROM CATEGORIE');

  return $query->fetchAll();
}

/**
 * Get related products
 *
 * @return array
 */
 function han_get_related_products( $productnummer ) {
   global $db;

   $query = $db->prepare( "SELECT PRODUCT.* FROM PRODUCT_GERELATEERD_PRODUCT
    INNER JOIN PRODUCT ON PRODUCT_GERELATEERD_PRODUCT.PRODUCTNUMMER_GERELATEERD_PRODUCT=PRODUCT.PRODUCTNUMMER
    WHERE PRODUCT_GERELATEERD_PRODUCT.PRODUCTNUMMER = :productnummer" );

   $query->execute( [ 'productnummer' => $productnummer ] );

   return $query->fetchAll();
 }
