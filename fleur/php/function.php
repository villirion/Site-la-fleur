<?php
    $data = fopen("data/catalogue.csv", "r");
    $bulbes = fopen("php/bulbes.html", "w");
    $massif = fopen("php/massif.html", "w");
    $rosiers = fopen("php/rosiers.html", "w");
    if ($data and $bulbes and $massif and $rosiers) {
        $tabHead = "<table><tr><td>image</td><td>ref</td><td>nom</td><td>prix</td><td>stock</td></tr>";
        fwrite($bulbes, $tabHead);
        fwrite($massif, $tabHead);
        fwrite($rosiers, $tabHead);
        while (($line = fgets($data)) !== false) {
            $tableau = explode(',', $line);
            $tabLigne = "<tr><td>" . $tableau[1] . "</td><td>" . $tableau[2] . "</td><td>" . $tableau[3] . "</td><td>" . $tableau[4] . "</td><td>" . $tableau[5] . "</td></tr>";
            if ($tableau[0] == "bulbes") {
                fwrite($bulbes, $tabLigne);
            }
            if ($tableau[0] == "massif") {
                fwrite($massif, $tabLigne);
            }
            if ($tableau[0] == "rosiers") {
                fwrite($rosiers, $tabLigne);
            }
        }       
        $tabFoot = "</table>";
        fwrite($bulbes, $tabFoot);
        fwrite($massif, $tabFoot);
        fwrite($rosiers, $tabFoot);
    }
    fclose($data);
    fclose($bulbes);
    fclose($massif);
    fclose($rosiers);
?>