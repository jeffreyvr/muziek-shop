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

  $form_actions = array( 'login', 'logout' ); // mogelijke actions

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

  // Controle nog toevoegen:
  // select by gebruikersnaam
  // if wachtwoord == gebruikers.wachtwoord { //set session }

  $_SESSION['gebruikersnaam'] = $_POST['gebruikersnaam'];
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
 * Evt. nog argumenten toevoegen aan functie: limit, offset, order etc.
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
 * [han_format_price description]
 * @param  [type] $price [description]
 * @return [type]        [description]
 */
function han_format_price( $price ) {
  return number_format( $price, 2, ".", "," );
}
