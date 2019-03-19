<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Urna (N1-Elecciones-PHP)</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
</head>
<body>

<header>

</header>

<nav>

</nav>

<main>
    <section id="section-candidate">
        <fieldset id="div-first-candidate">
            <legend>Candidato 1</legend>

            <?php

            include_once ("Urn.php");

            $urn = Urn::getInstance();
            $urn->showCandidate(0);

            ?>

            <button type="button" class="button-blue">Porcetaje Votos</button>
            <br><br>
            <button onclick="location.href='index.php?action=vote'"
                    type="button" class="button-blue">Votar</button>
        </fieldset>
        <fieldset id="div-second-candidate">
            <legend>Candidato 2</legend>

            <?php

            include_once ("Urn.php");

            $urn = Urn::getInstance();
            $urn->showCandidate(1);

            ?>

            <button type="button" class="button-blue">Porcetaje Votos</button>
            <br><br>
            <button onclick="location.href='index.php?action=vote'"
                    type="button" class="button-blue">Votar</button>
        </fieldset>
        <fieldset id="div-third-candidate">
            <legend>Candidato 3</legend>

            <?php

            include_once ("Urn.php");

            $urn = Urn::getInstance();
            $urn->showCandidate(2);

            ?>

            <button type="button" class="button-blue">Porcetaje Votos</button>
            <br><br>
            <button onclick="location.href='index.php?action=vote'"
                    type="button" class="button-blue">Votar</button>
        </fieldset>
    </section>
</main>

<footer>
    <p>&copy <?php echo date('Y')?></p>
</footer>

</body>
</html>