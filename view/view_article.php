<form action="index.php" method="POST">
        <input type="text" name="nom_article" placeholder="nom de l'article">
        <input type="text" name="prix_article" placeholder="prix de l'article">
        <input type="submit" name="submit">
    </form>

<p><?php echo $message ?></p>

<p><?php echo $showArticle ?></p>