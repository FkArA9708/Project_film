<!-- Navigatie knoppen -->
<div class="page-navigation">
    <div class="nav-item">
        <a href="index.php?page=home" class="btn-nav <?= $page === 'home' ? 'active' : '' ?>">Home</a>
    </div>
    <div class="nav-item">
        <a href="index.php?page=film" class="btn-nav <?= $page === 'film' ? 'active' : '' ?>">Film</a>
    </div>
    <div class="nav-item">
        <a href="index.php?page=acteur" class="btn-nav <?= $page === 'acteur' ? 'active' : '' ?>">Acteur</a>
    </div>
    <div class="nav-item">
        <a href="index.php?page=koppelen" class="btn-nav <?= $page === 'koppelen' ? 'active' : '' ?>">Koppelen</a>
    </div>
</div>

<?php
$allFilms = $filmManager->getAllFilms();
$allActors = $actorManager->getAllActors();
?>

<h1>Acteur aan film koppelen</h1>

<div class="form-container">
    <form method="POST">
        <div class="form-group">
            <label for="film_id">Selecteer film:</label>
            <select id="film_id" name="film_id" required>
                <option value="">Kies een film...</option>
                <?php foreach ($allFilms as $film): ?>
                    <option value="<?= $film->getId() ?>"><?= htmlspecialchars($film->getName()) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="actor_id">Selecteer acteur:</label>
            <select id="actor_id" name="actor_id" required>
                <option value="">Kies een acteur...</option>
                <?php foreach ($allActors as $actor): ?>
                    <option value="<?= $actor->getId() ?>"><?= htmlspecialchars($actor->getName()) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <button type="submit" name="link_actor_film" class="btn btn-primary">Koppelen</button>
    </form>
</div>

<h2>Bestaande koppelingen</h2>
<table class="links-table">
    <thead>
        <tr>
            <th>Film</th>
            <th>Acteur</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $allLinks = $filmActorManager->getAllFilmActors();
        foreach ($allLinks as $link): ?>
            <tr>
                <td><?= htmlspecialchars($link['film_name']) ?></td>
                <td><?= htmlspecialchars($link['actor_name']) ?></td>
                <td>
                    <form method="POST" style="display: inline;">
                        <input type="hidden" name="film_id" value="<?= $link['film_id'] ?>">
                        <button type="submit" name="delete_film" class="btn btn-secondary" 
                                onclick="return confirm('Weet je zeker dat je de film \"<?= htmlspecialchars($link['film_name']) ?>\" wilt verwijderen? Dit verwijdert de film en alle koppelingen, maar de acteurs blijven in de database.')">
                            Verwijderen
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>