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
$allActors = $actorManager->getAllActors();
?>

<h1>Acteur toevoegen/beheren</h1>

<div class="form-container">
    <form method="POST">
        <div class="form-group">
            <label for="actor_name">Acteurnaam:</label>
            <input type="text" id="actor_name" name="actor_name" required 
                   placeholder="Keanu Reeves" minlength="1" maxlength="30"
                   pattern=".{1,30}" title="Acteurnaam moet tussen 1 en 30 karakters zijn">
            <small style="color: rgba(255,255,255,0.7);">Maximaal 30 karakters</small>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <button type="submit" name="add_actor" class="btn btn-primary">Toevoegen</button>
            <a href="index.php" class="btn btn-secondary">Annuleren</a>
        </div>
    </form>
</div>

<h2>Bestaande acteurs</h2>
<div class="films-grid">
    <?php foreach ($allActors as $actor): ?>
        <div class="film-card">
            <h3 class="film-title"><?= htmlspecialchars($actor->getName()) ?></h3>
            <?php
            $actorFilms = $filmActorManager->getActorFilms($actor->getId());
            if ($actorFilms): ?>
                <p>Films waarin gespeeld:</p>
                <ul class="actors-list">
                    <?php foreach ($actorFilms as $film): ?>
                        <li><?= htmlspecialchars($film['name']) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>