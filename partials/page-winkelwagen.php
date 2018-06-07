<?php
  $winkelwagen = han_get_winkelwagen();
?>

<h1>Winkelwagen</h1>

<?php if ( empty( $winkelwagen ) ) { ?>

  <p>Er staat nog niets in de winkelwagen.</p>

<?php } else { ?>

  <form method="post">

    <button type="submit">Winkelwagen bijwerken</button>

    <input type="hidden" name="form_action" value="winkelwagen_bijwerken">

    <table class="cart">
      <tr>
        <th>Afbeelding</th>
        <th>Productnaam</th>
        <th>Prijs</th>
        <th>Aantal</th>
        <th>Subtotaal</th>
        <th>Verwijderen</th>
      </tr>

    <?php foreach ( $winkelwagen as $productnummer => $item ) {
      $product = han_get_product_by_productnummer( $productnummer ); ?>

      <tr>
        <td><img src="<?php echo $product['AFBEELDING_GROOT']; ?>"></td>
        <td>
          <a href="index.php?page=product&amp;productnummer=<?php echo $product['PRODUCTNUMMER']; ?>">
            <?php echo $product['PRODUCTNAAM']; ?>
          </a>
        </td>
        <td><?php echo han_format_price( $product['PRIJS'] ); ?></td>
        <td>
          <input type="number" name="product[<?php echo $productnummer; ?>]" min="1" value="<?php echo $item['aantal']; ?>">
        </td>
        <td><?php echo han_format_price( $product['PRIJS'] * $item['aantal'] ); ?></td>
        <td><button type="submit" name="delete" value="<?php echo $productnummer; ?>">Verwijderen</button></td>
      </tr>

    <?php } ?>

      <tr>
        <td colspan="5" align="right">
          <strong>Eindtotaal:</stong>
        </td>
        <td align="left">
          <?php echo han_format_price( han_get_winkelwagen_totaal() ); ?>
        </td>
      </tr>

    </table>

    <button type="submit">Winkelwagen bijwerken</button>

    <?php if ( han_is_gebruiker_logged_in() ) { ?>
      <a href="index.php?page=afrekenen" class="button">Afrekenen</a>
    <?php } else { ?>
      <a href="index.php?page=registreren" class="button">Registreren</a>
    <?php } ?>

  </form>
<?php } ?>
