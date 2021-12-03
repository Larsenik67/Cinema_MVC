<?php
    $films = $response["data"]["films"];
?>
<section class="products">
    <?php  
        foreach($films as $film)
        {
        ?>
            <div class="products__item">
                <h2>
                    <a href="?ctrl=film&action=product&id=<?= $film['id'] ?>">
                        <?= $film["titre"] ?>
                    </a>
                </h2>
                <p><?= mb_strimwidth($film["résumé"], 0, 50, "...") ?></p>
                <p><?= $film["durée"] ?> min. </p>
                <p>
                    <a href="">Ajouter au panier</a>
                </p>
            </div>
        <?php
        }
    ?>
</section>
