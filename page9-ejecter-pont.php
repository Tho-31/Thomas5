<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Monty Python - Pont de la Mort</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: white;
            text-align: center;
            background: url('https://images.unsplash.com/photo-1597764691341-5c5a6b5d6815?auto=format&fit=crop&w=1600&q=80') no-repeat center center fixed;
            background-size: cover;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 60px 20px;
            min-height: 100vh;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.3em;
            margin-bottom: 40px;
        }

        iframe {
            border: 6px solid #fff;
            border-radius: 12px;
            box-shadow: 0 0 20px #000;
        }
    </style>
</head>
<body>
    <div class="overlay">
        <h1>Extrait du Pont de la Mort - Monty Python</h1>
        <p></p>

        <?php
            // Lien de la vidéo (extrait disponible sur YouTube)
            $videoURL = "https://www.youtube.com/embed/Wpx6XnankZ8"; // Vidéo de la scène du Bridge of Death
        ?>

        <iframe width="800" height="450" src="<?= $videoURL ?>" 
                title="Monty Python Bridge of Death" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
        </iframe>
    </div>
</body>
</html>
