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
                <p>Nombre: <?=$nameCandidate[0]?></p>
                <p>Apellido: <?=$lastNameCandidate[0]?></p>
                <p>Edad: <?=$ageCandidate[0]?></p>
                <p>Partido Político: <br><?=$politicalPartyCandidate[0]?></p>
                <p>Costo Campaña: <?=$costElectoralCampaignCandidate[0]?></p>
                <p>Número de Votos: <?=$votesCandidate[0]?></p>
                <button type="button" class="button-blue">Porcetaje Votos</button>
                <br><br>
                <button type="button" class="button-blue">Votar</button>
            </fieldset>
            <fieldset id="div-second-candidate">
                <legend>Candidato 2</legend>
                <p>Nombre: <?=$nameCandidate[1]?></p>
                <p>Apellido: <?=$lastNameCandidate[1]?></p>
                <p>Edad: <?=$ageCandidate[1]?></p>
                <p>Partido Político: <br><?=$politicalPartyCandidate[1]?></p>
                <p>Costo Campaña: <?=$costElectoralCampaignCandidate[1]?></p>
                <p>Número de Votos: <?=$votesCandidate[1]?></p>
                <button type="button" class="button-blue">Porcetaje Votos</button>
                <br><br>
                <button type="button" class="button-blue">Votar</button>
            </fieldset>
            <fieldset id="div-third-candidate">
                <legend>Candidato 3</legend>
                <p>Nombre: <?=$nameCandidate[2]?></p>
                <p>Apellido: <?=$lastNameCandidate[2]?></p>
                <p>Edad: <?=$ageCandidate[2]?></p>
                <p>Partido Político: <br><?=$politicalPartyCandidate[2]?></p>
                <p>Costo Campaña: <?=$costElectoralCampaignCandidate[2]?></p>
                <p>Número de Votos: <?=$votesCandidate[2]?></p>
                <button type="button" class="button-blue">Porcetaje Votos</button>
                <br><br>
                <button type="button" class="button-blue">Votar</button>
            </fieldset>
        </section>
    </main>

    <footer>
        <p>&copy <?php echo date('Y')?></p>
    </footer>

</body>
</html>