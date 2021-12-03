<?php
    //on récupère quoi qu'il arrive TOUS les produits pour les lister en bas de page
    $films = $response["data"]["films"];
    $film = $response["data"]["film"];
    $action = $response["data"]["action"];

    ?>

    <h1>Ajouter un produit</h1>
    <form action="<?= $action ?>" method="post">
        <p>
            <label>
                Nom du produit :
                <input type="text" name="name" value="<?php $film ? $film['titre'] : "" ?>">
            </label>
        </p>
        <p>
            <label>
                Prix du produit :
                <input type="number" step="any" name="price" value="<?= $film ? $film['durée'] : "" ?>">
            </label>
        </p>
        <p>
            <label>
                Description du produit :
                <textarea name="descr" rows=3><?php $film ? $film['résumé'] : "" ?></textarea>
            </label>
        </p>
        <p>
            <input type="submit" value="Valider">
        </p>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>DESCRIPTION</th>
                <th>OPTIONS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($films as $film){
            ?>
            <tr>
                <td><?= $film["id"] ?></td>
                <td><?= $film["titre"] ?></td>
                <td><?= $film["durée"] ?></td>
                <td><?= $film["résumé"] ?></td>
                <td>
                    <a href="?ctrl=admin&action=index&id=<?= $film["id"] ?>">MODIFIER</a> - 
                    <a href="?ctrl=admin&action=deleteProduct&id=<?= $film['id'] ?>"
                        onclick="confirmDelete('<?= $film['titre'] ?>')">
                        SUPPRIMER
                    </a>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
        <div id="modal">
            <h1>ALERTE</h1>
            <p>Vous allez supprimer le produit <span class="modal__name"></span>, confirmer ?</p>
            <p id="modal-actions">
                <a class="modal-actions__confirm" href="">Confirmer</a>
                <a class="modal-actions__cancel" href="#">Annuler</a>
            </p>
        </div>
    </table>
    <script src="<?= JS_PATH ?>script.js"></script