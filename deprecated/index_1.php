<?php
include "init.php";
if (isPost()) {
    if (!empty($_POST['texte'])) {
        $texte = htmlspecialchars($_POST['texte']);

        
        header("Location: page1.php");
        exit;
    } else {
        header("Location: index.php");
        exit;
    }
}
?>

<?php include "html-header.php" ?>
    <style>
        body {
            background-color: #000;
            color: #F5F5DC; 
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .cadre {
            border: 2px solid #F5F5DC;
            padding: 20px;
            margin: 20px auto;
            display: inline-block;
        }
        .cadre img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }
        form {
            width: 100%;
            margin-top: 20px;
        }
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            background-color: #333; 
            color: #F5F5DC; 
            border: 1px solid #F5F5DC;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .image-centree {
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 20px;
    max-width: 100%;
}
    </style>
</head>
<body>
    <div class="container">
        <img class="image-centree" src="debut-aventure.jpg" alt="">
        <div class="cadre">
            <p>Bonjour aventurier, quelle est ton nom ?</p>
        </div>
        <form action="traitement.php" method="post">
            <div>
                <label for="texte">Entrez votre texte :</label><br>
                <textarea id="texte" name="texte" rows="4" cols="50"></textarea>
            </div>
            <div>
                <input type="submit" value="Valider">
            </div>
        </form>
    </div>
</body>
</html>
<?php include "html-footer.php" ?>
