<?php
    if(array_key_exists('createAccount', $_POST)) {
        $NewUser = True;
        $PwdCorrect = True;
        if(isset($_POST["Mdp"]) and isset($_POST["MdpConf"])){
            if ($_POST["Mdp"] != $_POST["MdpConf"]){
                echo "les deux mot de passe doivent etre identique";
                $PwdCorrect = False;
            }
        }
        if(isset($_POST["NomUtilisateur"]) and $PwdCorrect) {
            $handle = fopen("data/connexion.csv", "r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $identifier = explode(',', $line);
                    if ($_POST["NomUtilisateur"] == $identifier[0]) {
                        echo "Nom utilisateur deja utiliser";
                        $NewUser = False;
                        break;
                    }
                }
            }
            fclose($handle);
            if ($NewUser) {
                $handle = fopen("data/connexion.csv", "a");
                $newLigne = $_POST["NomUtilisateur"] . "," . $_POST["Mdp"] . "," . $_POST["Email"] . ",";
                fwrite($handle, $newLigne);
                fclose($handle);
            }
        }
    }

    if(array_key_exists('Login', $_POST)) {
        $UserFind = False;
        if(isset($_POST["username"]) and isset($_POST["pwd"])) {
          $handle = fopen("data/connexion.csv", "r");
          if ($handle) {
              while (($line = fgets($handle)) !== false) {
                  $identifier = explode(',', $line);
                  if ($_POST["username"] == $identifier[0] and $_POST["pwd"] == $identifier[1]) {
                      $_SESSION['username'] = $_POST["username"];
                      $_SESSION['email'] = $identifier[2];
                      $UserFind = True;
                      break;
                  }
              }
          }
          fclose($handle);
          if ($UserFind) {
            $_SESSION['status'] = "connecter";
          }
        }
    }
    
    if(array_key_exists('sendMail', $_POST)) {
        $body = "send by " . $_POST["nom"] . " " . $_POST["prenom"] . " le " . $_POST["date"] . " son adresse email est " . $_POST["email"] . " " . $_POST["body"];
        $subject = $_POST["sujet"];
        mail("societelafleur5@gmail.com", $subject, $body);
    }
?>