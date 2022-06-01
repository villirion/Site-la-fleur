<?php
    if (!isset($_SESSION['status'])) {
        $_SESSION['status'] = "deconnecter";
    }

    if (!isset($_SESSION['article'])) {
        $_SESSION['article'] = 0;
    }

    if (!isset($_SESSION['content'])) {
        $_SESSION['content'] = "index";
    }
    if(array_key_exists('accueil', $_POST)) {
        $_SESSION['content'] = "index";
    }
    if(array_key_exists('bulbes', $_POST)) {
        $_SESSION['content'] = "bulbes";
    }
    if(array_key_exists('rosiers', $_POST)) {
        $_SESSION['content'] = "rosiers";
    }
    if(array_key_exists('massif', $_POST)) {
        $_SESSION['content'] = "massif";
    }
    if(array_key_exists('contact', $_POST)) {
        $_SESSION['content'] = "contact";
    }

    if(array_key_exists('panier', $_POST)) {
        $_SESSION['content'] = "panier";
        $catalogue = fopen("data/catalogue.csv", "r");
        $panier = fopen("php/panier.html", "w");
        $somme = 0;
        if ($catalogue) {
            while (($line = fgets($catalogue)) !== false) {
                $tableau = explode(',', $line);
                if(isset($_SESSION[$tableau[2]])) {
                    $nombre = $_SESSION[$tableau[2]][0];
                    $prix = rtrim($_SESSION[$tableau[2]][2], "€") * $nombre;
                    $newLine = $nombre . " x " . $_SESSION[$tableau[2]][1] . " = " . $prix . " €<br>";
                    $somme += $prix;
                    fwrite($panier, $newLine);
                }
            }
        }
        $newLine = "Total = " . $somme . " €";
        fwrite($panier, $newLine); 
        fclose($catalogue);
        fclose($panier);
    }
    if(array_key_exists('register', $_POST)) {
        $_SESSION['content'] = "register";
    }
    if(array_key_exists('logOf', $_POST)) {
        $_SESSION['status'] = "deconnecter";
        session_destroy();
        header("Refresh:0");
    }

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

    if(array_key_exists('ajoutPanier', $_POST)) {
        $somme = 0;
        $handle = fopen("data/catalogue.csv", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $identifier = explode(',', $line);
                if(isset($_POST[$identifier[2]])) {
                    if ($_POST[$identifier[2]] > 0) {
                        $_SESSION[$identifier[2]] = [$_POST[$identifier[2]],$identifier[3],$identifier[4]];
                    }
                }
                if(isset($_SESSION[$identifier[2]])) {
                    $somme += $_SESSION[$identifier[2]][0];
                }
            }
        }
        $_SESSION['article'] = $somme;
        fclose($handle);
    }
?>