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

<h1>Film toevoegen/beheren</h1>

<div class="form-container">
    <form method="POST">
        <div class="form-group">
            <label for="film_name">Filmnaam:</label>
            <input type="text" id="film_name" name="film_name" required 
                   placeholder="The Matrix" minlength="1" maxlength="30"
                   pattern=".{1,30}" title="Filmnaam moet tussen 1 en 30 karakters zijn">
            <small style="color: rgba(255,255,255,0.7);">Maximaal 30 karakters</small>
        </div>
        
        <div class="form-group">
            <label for="film_genre">Genre:</label>
            <input type="text" id="film_genre" name="film_genre" required 
                   placeholder="Science Fiction" minlength="1" maxlength="30"
                   pattern=".{1,30}" title="Genre moet tussen 1 en 30 karakters zijn">
            <small style="color: rgba(255,255,255,0.7);">Maximaal 30 karakters</small>
        </div>
        
        <div style="display: flex; gap: 1rem;">
            <button type="submit" name="add_film" class="btn btn-primary">Toevoegen</button>
            <a href="index.php" class="btn btn-secondary">Annuleren</a>
        </div>
    </form>
</div>