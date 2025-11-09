<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVIBRO - Film Database</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFFFF;
            color: #333;
            line-height: 1.6;
        }
        
        /* TITEL KLEUREN */
        h1 {
            color: #47A3B5;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            border-bottom: 2px solid #47A3B5;
            padding-bottom: 0.5rem;
        }
        
        h2 {
            color: #47A3B5;
            margin: 1.5rem 0 1rem 0;
            font-size: 1.5rem;
        }
        
        h3 {
            color: #47A3B5;
            margin: 1rem 0;
            font-size: 1.25rem;
        }
        
        .header {
            background: #47A3B5;
            padding: 0.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }
        
        .logo-container {
            display: flex;
            align-items: center;
        }
        
        .logo {
            height: 50px;
            width: auto;
            max-width: 150px;
            transition: all 0.3s ease;
        }
        
        /* Responsive design voor kleinere schermen */
        @media (max-width: 768px) {
            .header {
                padding: 0.5rem 1rem;
            }
            
            .logo {
                height: 40px;
                max-width: 120px;
            }
            
            h1 {
                font-size: 1.75rem;
            }
            
            h2 {
                font-size: 1.35rem;
            }
        }
        
        @media (max-width: 480px) {
            .logo {
                height: 35px;
                max-width: 100px;
            }
            
            h1 {
                font-size: 1.5rem;
            }
            
            h2 {
                font-size: 1.25rem;
            }
        }
        
        .auth-buttons {
            display: flex;
            gap: 1rem;
        }
        
        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background: #47A3B5;
            color: white;
        }
        
        .btn-secondary {
            background: #f44336;
            color: white;
        }
        
        .btn-outline {
            background: transparent;
            border: 2px solid #47A3B5;
            color: #47A3B5;
        }
        
        .btn-nav {
            background: #47A3B5;
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s;
            border: 2px solid transparent;
            display: block;
            text-align: center;
        }
        
        .btn-nav:hover, .btn-nav.active {
            background: #3a8b9a;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .page-navigation {
            display: flex;
            justify-content: left;
            margin-bottom: 2rem;
            border-radius: 10px;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .nav-item {
            display: inline-block;
        }
        
        /* INVERTED COLORS - Aangepaste div achtergronden en tekst */
        .films-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 2rem 0;
        }
        
        .film-card {
            background: #53B5C8; /* Nieuwe achtergrondkleur */
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border: 1px solid #47A3B5;
            color: #FFFFFF; /* Witte tekst */
        }
        
        .films-container {
            background: #53B5C8; /* Nieuwe achtergrondkleur */
            border-radius: 10px;
            padding: 2rem;
            margin: 2rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border: 1px solid #47A3B5;
            color: #FFFFFF; /* Witte tekst */
        }

        .film-item {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.3); /* Lichtere witte lijn */
            transition: background-color 0.3s;
            color: #FFFFFF; /* Witte tekst */
        }

        .film-item:hover {
            background-color: rgba(255,255,255,0.1); /* Lichte hover met witte overlay */
        }

        .film-item:last-child {
            border-bottom: none;
        }
        
        .film-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #FFFFFF; /* Witte filmtitels */
        }
        
        .film-genre {
            color: rgba(255,255,255,0.8); /* Licht transparante witte tekst */
            font-style: italic;
            font-size: 1rem;
        }
        
        .actors-list {
            list-style: none;
            padding-left: 1rem;
            color: #FFFFFF; /* Witte tekst */
        }
        
        .actors-list li {
            padding: 0.3rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.2); /* Lichtere witte lijn */
            color: #FFFFFF; /* Witte tekst */
        }

        .actors-list li:last-child {
            border-bottom: none;
        }
        
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }
        
        .action-card {
            background: #53B5C8; /* Nieuwe achtergrondkleur */
            padding: 2rem;
            text-align: center;
            border-radius: 10px;
            transition: transform 0.3s;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border: 1px solid #47A3B5;
            color: #FFFFFF; /* Witte tekst */
        }
        
        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .action-card h3 {
            color: #FFFFFF; /* Witte titels in action cards */
            margin-bottom: 1rem;
        }
        
        .action-card p {
            color: rgba(255,255,255,0.9); /* Licht transparante witte tekst */
            margin-bottom: 1.5rem;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #47A3B5;
            font-weight: bold;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background: #fff;
            color: #333;
        }
        
        .links-table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
            background: #53B5C8; /* Nieuwe achtergrondkleur */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Styling voor forms in table */
.links-table form {
    display: inline;
    margin: 0;
    padding: 0;
}

.links-table .btn {
    margin: 0;
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
}
        
        .links-table th, .links-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            color: #FFFFFF; /* Witte tekst */
        }
        
        .links-table th {
            background: #47A3B5; /* Donkerdere blauwe header */
            color: white;
        }
        
        .links-table tr:hover {
            background-color: rgba(255,255,255,0.1); /* Lichte hover */
        }
        
        /* Aanvullende styling voor consistentie */
        .film-card h3,
        .film-card p,
        .action-card h3,
        .action-card p {
            color: #FFFFFF; /* Zorg dat alle tekst wit is */
        }
        
        /* Styling voor de formulier containers op andere pagina's */
        /* Styling voor de formulier containers */
.form-container {
    background: #53B5C8;
    padding: 2rem;
    border-radius: 10px;
    margin: 2rem 0;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border: 1px solid #47A3B5;
    color: #FFFFFF;
    height: 400px;
}

.form-container form {
    width: 100%;
}

.form-container .form-group {
    margin-bottom: 1.5rem;
}

.form-container label {
    display: block;
    margin-bottom: 0.5rem;
    color: #FFFFFF; /* Witte labels */
    font-weight: bold;
}

.form-container input, 
.form-container select {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 5px;
    background: rgba(255,255,255,0.9);
    color: #333; /* Donkere tekst in inputs voor leesbaarheid */
    font-size: 1rem;
}

.form-container input:focus {
    outline: none;
    border-color: #47A3B5;
    background: #FFFFFF;
    box-shadow: 0 0 5px rgba(71, 163, 181, 0.5);
}

.form-container .btn {
    padding: 0.8rem 1.5rem;
    font-size: 1rem;
    font-weight: bold;
}

.form-container .btn-primary {
    background: #47A3B5;
    border: 2px solid #47A3B5;
    margin-top: 30px;
}

.form-container .btn-primary:hover {
    background: #3a8b9a;
    border-color: #3a8b9a;
}

.form-container .btn-secondary {
    background: #47A3B5;
    border: 2px solid #47A3B5;
    margin-top: 30px;
}

.form-container .btn-secondary:hover {
    background: #3a8b9a;
    border-color: #3a8b9a;
}

.error-message {
    background: #f44336;
    color: white;
    padding: 1rem;
    border-radius: 5px;
    margin-bottom: 1rem;
    border-left: 4px solid #d32f2f;
}

.form-container small {
    display: block;
    margin-top: 0.25rem;
    font-size: 0.85rem;
    color: rgba(255,255,255,0.7);
}

/* Input validation styling */
.form-container input:invalid {
    border-color: #f44336;
}

.form-container input:valid {
    border-color: #4CAF50;
}
    </style>
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <img src="Movibro_logo.png" alt="MOVIBRO Logo" class="logo">
        </div>
    </header>
    
    <div class="container">
        <!-- Navigatie knoppen komen hier in elke template -->