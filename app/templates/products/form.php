<form method="post">

        <div>
            <label for="name">Nom du Produit</label>
            <input type="text" id="name" name="name" value="<?= $name ?>">
        </div>

        <div>
            <label for="description">Description du Produit</label>
            <textarea id="description" name="description" rows="8" cols="80"><?= $description ?></textarea>
        </div>

        <div>
            <label for="image">Image du Produit</label>
            <input type="text" id="image" name="image" value="<?= $image ?>">
        </div>

        <div>
            <label for="price">Prix du Produit</label>
            <input type="" id="price" name="price" value="<?= $price ?>">
        </div>

        <button type="submit" name="button">Envoi</button>

    </form>