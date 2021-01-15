<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>micro-url</title>
</head>
<body>
    <pre>
        <?php
            include "micro_url.dbconf.php";
            
            try{
                $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
            
                //Selection d'une entrée
                $requete = "SELECT * FROM `url` 
                            WHERE `url_id` = :id;";       
                $prepare = $pdo->prepare($requete);
                $prepare->execute(array(
                    ":id" => 2
                ));
                $res = $prepare->fetchAll();
                print_r([$requete, $res]);
                
                //Insertion 
                $requete = "INSERT INTO `mot-cle` (`mot_cle`)
                            VALUES (:mot_cle);";
                $prepare = $pdo->prepare($requete);
                $prepare->execute(array(
                    ":mot_cle" => "Encore un mot cle"
                ));
                $res = $prepare->rowCount();
                $lastInsertedMotcleId = $pdo->lastInsertId();
                print_r([$requete, $res, $lastInsertedMotcleId]); 

                $requete = "UPDATE `mot-cle`
                            SET `mot_cle` = :mot_cle
                            WHERE `id` = :id;";
                $prepare = $pdo->prepare($requete);
                $prepare->execute(array(
                    ":mot_cle" => "Encore un mot cle mais modifié",
                    ":id" => $lastInsertedMotcleId
                ));
                $res = $prepare->rowCount();
                print_r([$requete, $res]);

                $requete = "DELETE FROM `mot-cle`
                            WHERE `id` = :id;";
                $prepare = $pdo->prepare($requete);
                $prepare->execute(array(
                    ":id" => $lastInsertedMotcleId
                ));
                $res = $prepare->rowCount();
                print_r([$requete, $res]);

                // $requete = "INSERT INTO `url` (`url_lien`, `shortcut`, `datetime`, `url_description`)
                //             VALUES (:url_lien, :shortcut, NOW(), :url_description);";
                // $prepare = $pdo->prepare($requete);
                // $prepare->execute(array(
                //     ":url_lien" => "https://www.zataz.com/total-energie-direct-obligee-de-stopper-un-jeu-en-ligne-suite-a-une-fuite-de-donnees/",
                //     ":shortcut" => "ztz7",
                //     ":url_description" => "L'entreprise Total Energie Direct avait lancé un jeu en ligne. Le concours a dû être stoppé. Il était possible d'accéder aux données des autres joueurs."
                // ));
                // $res = $prepare->rowCount();
                // print_r([$requete, $res]);

                // $requete = "INSERT INTO `mot-cle` (`mot_cle`)
                //             VALUES (:mot_cle);";
                // $prepare = $pdo->prepare($requete);
                // $prepare->execute(array(
                //     ":mot_cle" => "piratage"
                // ));
                // $res = $prepare->rowCount();
                // $lastInsertedMotcleId = $pdo->lastInsertId();
                // print_r([$requete, $res, $lastInsertedMotcleId]);

                // $requete = "INSERT INTO `assoc_url_mot-cle` (`id_url`, `id_mot-cle`)
                //             VALUES (17, 24);";
                // $prepare = $pdo->prepare($requete);
                // $prepare->execute();
                // $res = $prepare->rowCount();
                // print_r([$requete, $res]);

                $requete = "SELECT * FROM `url`
                INNER JOIN `assoc_url_mot-cle` ON `url_id` = `id_url`
                WHERE `id_mot_cle` = 24;";
                $prepare = $pdo->prepare($requete);
                $prepare->execute();
                $resultat = $prepare->fetchAll();
                print_r([$requete, $resultat]);


            }
            catch (PDOExeption $e){
                exit("❌🙀❌ OOPS :\n" . $e->getMessage());
            }
        ?>
    </pre>
</body>
</html>