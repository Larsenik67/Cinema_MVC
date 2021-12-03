<?php
    $film =  $response["data"]["films"];
?>

<p>
    <a href="/">&ltrif;&nbsp;Retour</a>
</p>
<section class="single-product">
    <figure class="single-product__image">
        <img src="https://via.placeholder.com/300.png?text=<?= $film["titre"] ?>" alt="<?= $film["titre"] ?>">
    </figure>
    <div class="single-product__infos">
        <h1><?= $film["titre"] ?></h1>
        <p><?= date("d F Y", strtotime($film["sortie"])); ?></p>
        <p><?= $film["durée"] ?> min.</p>
        <p><?= $film["note"] ?>/5</p>
        <p>Résumé: <?= $film["résumé"] ?></p>
        <p>
            <a href="">Ajouter au panier</a>
        </p>
    </div>
    
</section>
