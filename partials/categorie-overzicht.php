<article>
  <h1>Categorie-overzicht</h1>

  <?php if ( $categorieen = han_get_categories() ) { ?>

    <ul>
      <?php foreach ( $categorieen as $categorie ) { ?>

        <li><a href="index.php?category=<?php echo $categorie['CATEGORIENAAM']; ?>"><?php echo ucfirst( $categorie['CATEGORIENAAM'] ); ?></a></li>

      <?php } ?>
    </ul>

  <?php } else { ?>

    <p>Er zijn geen categorieën om weer te geven.</p>

  <?php } ?>

</article>
