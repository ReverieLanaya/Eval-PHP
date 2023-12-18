<?php


function addArticle($name,$prix,$bdd){
            try{
                //ETAPE 2 : Préparer la requête
                $req=$bdd->prepare('INSERT INTO article (nom_article, prix_article) VALUES(?,?)');

                //ETAPE 3 : Binding de Paramètre
                $req->bindParam(1,$name,PDO::PARAM_STR);
                $req->bindParam(2,$prix,PDO::PARAM_STR);

                //ETAPE 4 : Exécution de la requête
                $req->execute();

                //ETAPE 5 : J'envoie le message de confirmation au Controler
                return "L'article : $name, $prix a bien été ajouté à la BDD. ";

            }catch(Exception $error){
                //J'envoie le message d'erreur au Controler
                return $error->getMessage();
            }
}


function showArticle($bdd){
    try{
    
        //ETAPE 2 : Préparation de la requête
        $req=$bdd->prepare('SELECT article.id_article, article.nom_article, article.prix_article FROM article');

        //ETAPE 3 : Exécuter la requête
        $req->execute();

        //ETAPE 4 : Récupération des données
        $data=$req->fetchAll();

        //ETAPE 5 : J'envoie les données au Controler
        return $data;

    }catch(Exception $error){
        //J'envoie le message d'erreur au Controler
        return $error->getMessage();
    }
}


















?>