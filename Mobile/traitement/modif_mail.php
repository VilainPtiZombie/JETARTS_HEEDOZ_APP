<?php // script de traitement ajout de promo commerçant
  //INPORT SETTINGS
  include('../config.php');
  include('../db.php');
  include('../auth.php');



if (isset($_GET['action']) && ($_GET['action'] == "form") && isset($_GET['id'])) {
    /*
     * si on a un id de fourni
    * on charge l'element depuis la base de donnée
    */
    // recherche dans la table message les elements avec id = "$_GET['id']"
    $sql = "select * from message where id =:id limit 1";
    $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(
        ':id' => $_GET['id']
    ));
    $message = $sth -> fetch();
    // on met le contenu de l'element demandé dans $postdata
    $postdata = $message;

}

if (isset($_GET['action']) && ($_GET['action'] == "save")) {

    /*
    * on sauvegarde l'element dans la base de donnée
    */

// par defaut on va considerer que le "nom de fichier" c'est celui fourni en $_POST
    $file_name = $_POST['fichier'];

// si il y a un fichier envoyé on le stocke dans repertoire courant + nom de fichier
    if (isset($_FILES['fichier']) && !empty($_FILES['fichier']['name'])) {

        $tmp_name = $_FILES['fichier']['tmp_name'];

        $current_dir = realpath(dirname(__FILE__));



        $final_name = $current_dir . '/uploads/' . $_FILES['fichier']['name'];
        if (move_uploaded_file($tmp_name, $final_name)) {
            // si le fichier est uploade, on va considerer que le "nom de fichier" c'est celui fourni en $_FILES
            $file_name = $_FILES['fichier']['name'];
            echo('<hr/>fichier uploadé TMTC<hr/>');
        }
    }

    /*
     *  ON TRAITE LE CAS OU C'EST un Update et pas une Creation
     * pour ca on ajoute un bout de code SQL qui permet de gerer ce cas
     * sur le debut de la requete on a rajouté l'alias :id qui correspond au $_POST['id'] ( et pas au $_GET['id'] )
     * si un id est fourni en $_POST c'est tres certainement un update.
     */
    /* syntaxe avec preparedStatements */
    $sql = "insert into message (id, message, fichier) values(:id,  :message, :fichier)";
    $sql .= " on duplicate key update message=:message, fichier=:fichier";


    $sth = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $sth->execute(array(
        ':id' => $_POST['id'],
        ':message' => $_POST['message'],
        ':fichier' => $file_name
    ));

}
?>



<?php
//requete qui doit retourner des resultats pour les editer
$results = $dbh->query("select * from message");
// recupere les messages dans le connecteur
$messages = $results->fetchAll();

for ($i = 0; $i < count($messages); $i++) {
    ?>
    <article>
        <a href="?action=form&id=<?= $messages[$i]['id'] ?>"><?= $messages[$i]['id'] ?> / <?= $messages[$i]['message'] ?> / <?= $messages[$i]['fichier'] ?></a>

    </article>
<?php
}
?>


