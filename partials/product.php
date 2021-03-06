<article class="flex-grid">
  <div class="col">
    <img src="<?php echo $product['AFBEELDING_GROOT']; ?>" alt="Afbeelding <?php echo $product['PRODUCTNAAM']; ?>">
  </div>
  <div class="col">
    <h1><?php echo $product['PRODUCTNAAM']; ?></h1>

    <?php if ( !empty( $product['OMSCHRIJVING'] ) ) { ?>
      <p><?php echo $product['OMSCHRIJVING']; ?></p>
    <?php } ?>

    <p>
      <span>Categorie:</span>
      <?php echo $product['CATEGORIE']; ?>
    </p>

    <p>
      <span>Voorraad:</span>
      <?php echo $product['VOORRAAD']; ?>
    </p>

    <p>
      <span>Prijs:</span>
      <?php echo han_format_price( $product['PRIJS'] ); ?>
    </p>

    <?php if ( $product['VOORRAAD'] >= 1 ) { ?>
    <form method="post">
      <input type="hidden" name="productnummer" value="<?php echo $product['PRODUCTNUMMER']; ?>">
      <button type="submit">Toevoegen aan winkelwagen</button>
      <input type="hidden" name="form_action" value="cart">
    </form>
    <?php } ?>

  </div>
</article>

<?php if ( $related_products = han_get_related_products( $product['PRODUCTNUMMER'] ) ) { ?>

<h2>Gerelateerde producten</h2>

<div class="flex-grid">

  <?php foreach ( $related_products as $related_product ) { ?>
    <!-- Start Product <?php echo $related_product['PRODUCTNUMMER']; ?> -->
    <article class="col product-item">
      <a href="index.php?page=product&amp;productnummer=<?php echo $related_product['PRODUCTNUMMER']; ?>"></a>
      <img src="<?php echo $related_product['AFBEELDING_KLEIN']; ?>" alt="<?php echo $related_product['PRODUCTNAAM']; ?>">
      <h3><?php echo $related_product['PRODUCTNAAM']; ?></h3>
      <strong class="price"><?php echo han_format_price( $related_product['PRIJS'] ); ?></strong>
    </article>
    <!-- Eind Product <?php echo $related_product['PRODUCTNUMMER']; ?> -->
  <?php } ?>

</div>
<?php } ?>
