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
$filmsWithActors = $home->getRecentFilmsWithActors();
$filmCount = $home->getFilmCount();
$actorCount = $home->getActorCount();
?>

<h1>Laatst toegevoegde films</h1>

<div class="films-container">
    <?php foreach ($filmsWithActors as $filmData): ?>
        <div class="film-item">
            <h2 class="film-title"><?= htmlspecialchars($filmData['name']) ?> 
                <span class="film-genre">(<?= htmlspecialchars($filmData['genre']) ?>)</span>
            </h2>
            <?php if (!empty($filmData['actor_names'])): ?>
                <p>Acteurs:</p>
                <ul class="actors-list">
                    <?php 
                    $actors = explode(', ', $filmData['actor_names']);
                    foreach ($actors as $actor): ?>
                        <li><?= htmlspecialchars($actor) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Nog geen acteurs gekoppeld</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<h2>Snelle Acties</h2>
<div class="quick-actions">
    <div class="action-card">
        <h3>Nieuwe film toevoegen</h3>
        <p>Voeg een nieuwe film toe aan de database</p>
        <a href="index.php?page=film" class="btn btn-primary">Toevoegen</a>
    </div>
    
    <div class="action-card">
        <h3>Nieuwe acteur toevoegen</h3>
        <p>Voeg een nieuwe acteur toe aan de database</p>
        <a href="index.php?page=acteur" class="btn btn-primary">Toevoegen</a>
    </div>
    
    <div class="action-card">
        <h3>Koppeling maken</h3>
        <p>Koppel een acteur aan een film</p>
        <a href="index.php?page=koppelen" class="btn btn-primary">Koppelen</a>
    </div>
</div>

<div style="margin-top: 2rem; text-align: center; color: #47A3B5;">
    <p><strong>Statistieken:</strong> <?= $filmCount ?> films en <?= $actorCount ?> acteurs in de database</p>
</div>