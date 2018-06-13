<?php
  $winkelwagen = han_get_winkelwagen();
?>

<h1>Winkelwagen</h1>

<?php if ( empty( $winkelwagen ) ) { ?>

  <p>Er staat nog niets in de winkelwagen.</p>

<?php } else { ?>

  <?php if ( isset( $_GET['message'] ) ) { ?>

    <?php if ( $_GET['message'] == 1 ) { ?>
      <div class="message message-success">
        <p>Product is succesvol toegevoegd. <a href="index.php">Verder winkelen &raquo;</a></p>
      </div>
    <?php } ?>

  <?php } ?>

  <form method="post">

    <input type="hidden" name="form_action" value="winkelwagen_bijwerken">

    <div class="shopping-cart">

      <div class="shopping-cart-actions">
        <div class="cart-edit">
          <button type="submit" class="button-grey">Winkelwagen bijwerken</button>
        </div>

        <div class="cart-continue">
          <?php if ( han_is_gebruiker_logged_in() ) { ?>
            <a href="index.php?page=afrekenen" class="button">Afrekenen</a>
          <?php } else { ?>
            <a href="index.php?page=registreren&amp;redirect_to=index.php?page=winkelwagen" class="button">Registreren &raquo;</a>
          <?php } ?>
        </div>
      </div>

      <?php foreach ( $winkelwagen as $productnummer => $item ) {
        $product = han_get_product_by_productnummer( $productnummer ); ?>

      <div class="item">
        <div class="image">
          <img src="<?php echo $product['AFBEELDING_GROOT']; ?>" alt="Afbeelding <?php echo $product['PRODUCTNAAM']; ?>">
        </div>

        <div class="description">
          <span><a href="index.php?page=product&amp;productnummer=<?php echo $product['PRODUCTNUMMER']; ?>">
            <?php echo $product['PRODUCTNAAM']; ?>
          </a></span>
        </div>

        <div class="quantity">
          <label>Aantal:</label><input type="number" name="product[<?php echo $productnummer; ?>]" min="1" value="<?php echo $item['aantal']; ?>">
        </div>

        <div class="total-price">
          <span>Per stuk:<br><?php echo han_format_price( $product['PRIJS'] ); ?></span>

          <?php if ( $item['aantal'] > 1 ) { ?>
            <span>Subtotaal:<br> <?php echo han_format_price( $product['PRIJS'] * $item['aantal'] ); ?></span>
          <?php } ?>
        </div>

        <div class="delete">
          <button type="submit" name="delete" class="button-grey" value="<?php echo $productnummer; ?>">Verwijderen</button>
        </div>
      </div>
      <?php } ?>

    </div>

  </form>
<?php } ?>
