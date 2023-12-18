<?php 
include ("./model/model_article.php");
include ("./utils/bdd.php");


$message = '';
$name ='';
$prix = '';
$showArticle='';


if(isset($_POST['submit'])){
    //SECURITE ETAPE 1 : vérifie les données, si elles sont vide ou non
    if(isset($_POST['nom_article']) && !empty($_POST['nom_article']) 
        && isset($_POST['prix_article']) && !empty($_POST['prix_article'])){

        //SECURITE ETAPE 2 : nettoyage
        $name = htmlentities(strip_tags(trim($_POST['nom_article'])));
        $prix = htmlentities(strip_tags(trim($_POST['prix_article'])));

        //J'APPELLE LA REQUETE POUR ENREGISTRER MON ARTICLE (fonction se trouvant dans le model)
        $message = addArticle($name,$prix,$bdd);

    }
    else {
        //J'affiche un message d'erreur si le formulaire n'est paz correctement rempli
            $message = 'Remplissez correctement le formulaire';
    }
}

$data = showArticle($bdd);
foreach($data as $article){
    $showArticle = $showArticle."<p>numéro de l'article : {$article['id_article']}</p>
    <p>nom de l'article : {$article['nom_article']}</p>
    <p>prix de l'article : {$article['prix_article']}</p>
    <br><br>";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
include('./view/view_article.php');
?>

</body>
</html>