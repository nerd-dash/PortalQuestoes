<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <?php
        session_start();
        require '../db/block.php';


        $_SESSION['questaoId'] = preg_replace("/[^0-9]/", "", $_POST['questaoRadio']);
        $questaoId = preg_replace("/[^0-9]/", "", $_POST['questaoRadio']);

        require_once "../db/dbConnect.php";

        $queryQuestao = "SELECT questao, idDisciplina FROM questoes where idQuestao = '$questaoId'";
        $sqlQuestao = mysqli_query($dbConnection, $queryQuestao);

        $disciplina;

        if (mysqli_num_rows($sqlQuestao) > 0) {
            while ($row = mysqli_fetch_array($sqlQuestao)) {
                $questao = $row['questao'];
                $disciplina = $row['idDisciplina'];
            }
        }

        $queryAlternativas = "SELECT resposta, idAlternativa, correta FROM `alternativas` WHERE idQuestao = '$questaoId'";
        $sqlAlternativas = mysqli_query($dbConnection, $queryAlternativas);
        ?>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="../db/updateQuestao.php">
            <textarea name="questao"><?php echo $questao ?></textarea>
            <?php
            include "../db/dbConnect.php";
            $idRadio = 1;
            while ($alt = mysqli_fetch_array($sqlAlternativas)) {

                $_SESSION['idAlt' . ($idRadio - 1)] = $alt['idAlternativa'];

                if ($alt['correta'] == 1) {
                    echo "<input type='radio' name='altCorreta' value='$idRadio' checked='checked'>"
                    . "<input type='text' name='resposta" . $idRadio . "' value='" . $alt['resposta'] . "'>";
                } else {

                    echo "<input type='radio' name='altCorreta' value='$idRadio'>"
                    . "<input type='text' name='resposta" . $idRadio . "' value='" . $alt['resposta'] . "'>";
                }
                $idRadio++;
            }
            mysqli_close($dbConnection);
            ?>
            <button type="submit">Guardar Alterações</button>
        </form>
        <script>

            document.getElementById("<?php echo "disciplina" . $disciplina; ?>").selected = "true";

        </script>
    </body>
    <a href="menu.php">Voltar ao Menu</a>
</html>
