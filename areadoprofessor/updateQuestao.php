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
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <section class="header">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <?php echo $nome ?>
                    </a>
                </div>
                <p class="navbar-text"><?php echo "Discipila - " . $_SESSION['descDisciplina']?>                    
                </p>
            </div>
        </nav>
    </section>
    <section class="panel panel-primary ">
        <div class="panel-heading container-fluid">Atualizar questões</div>
        <div class="panel-body">
        <form method="post" action="../db/updateQuestao.php" onsubmit="return confirmAtualizar()">
                <div class="form-group">
                    <textarea class="form-control" name="questao" placeholder="Enunciado da questão..."><?php echo $questao ?></textarea>
                </div>
                <div class="form-group">
                    <?php
                    include "../db/dbConnect.php";
                    $idRadio = 1;
                    while ($alt = mysqli_fetch_array($sqlAlternativas)) {

                        $_SESSION['idAlt' . ($idRadio - 1)] = $alt['idAlternativa'];

                        if ($alt['correta'] == 1) {
                            echo "<div class='row-fluid header'><div class='input-group'><span class='input-group-addon'><input type='radio' name='altCorreta' value='$idRadio' checked='checked'></span><input class='form-control' type='text' name='resposta" . $idRadio . "' value='" . $alt['resposta'] . "'></div></div>";
                        } else {

                            echo "<div class='row-fluid header'><div class='input-group'><span class='input-group-addon'><input type='radio' name='altCorreta' value='$idRadio'></span><input class='form-control' type='text' name='resposta" . $idRadio . "' value='" . $alt['resposta'] . "'></div></div>";
                        }
                        $idRadio++;
                    }
                    mysqli_close($dbConnection);
                    ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Atualizar</button>
                    <a class="btn btn-default" role="button" href="menu.php">Voltar ao Menu</a>
                </div>
            </form>
        </div>
    </section>


    <script>
        document.getElementById("<?php echo "disciplina" . $disciplina; ?>").selected = "true";
    </script>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>
