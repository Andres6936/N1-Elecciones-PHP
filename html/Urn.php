<?php

/**
 * Singleton Class.
 * This class cannot be extended.
 */
final class Urn
{

    // Fields

    /**
     * @var Urn Hold the class instance.
     */
    private static $instance = null;

    /**
     * @var DatabaseTable Table of candidates.
     */
    private $candidates;

    // Construct

    /**
     * The constructor is private to prevent initiation
     * with outer code.
     */
    private function __construct()
    {

    }

    // Method Static

    /**
     * The object is created from within the class itself
     * only if the class has no instance.
     */
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Urn();
        }

        return self::$instance;
    }

    // Method

    public function setCandidates(DatabaseTable $candidatesTable)
    {
        $this->candidates = $candidatesTable;
    }

    public function showCandidate(int $numCandidate)
    {
        $resultObj = $this->candidates;

        $result = $resultObj->findAll();

        $candidates = [];
        foreach ($result as $candidate)
        {
            $candidates[] = [
                'ID_CAND' => $candidate['ID_CAND'],
                'NOM_CAND' => $candidate['NOM_CAND'],
                'APEL_CAND' => $candidate['APEL_CAND'],
                'PART_CAND' => $candidate['PART_CAND'],
                'EDAD_CAND' => $candidate['EDAD_CAND'],
                'COST_CAND' => $candidate['COST_CAND'],
                'VOTO_CAND' => $candidate['VOTO_CAND']
            ];
        }

        echo '<p>Nombre:' . $candidates[$numCandidate]['NOM_CAND'] . '</p>';
        echo '<p>Apellido:' . $candidates[$numCandidate]['APEL_CAND'] . '</p>';
        echo '<p>Edad:' . $candidates[$numCandidate]['EDAD_CAND'] . '</p>';
        echo '<p>Partido Político:' . $candidates[$numCandidate]['PART_CAND'] . '</p>';
        echo '<p>Costo Campaña:' . $candidates[$numCandidate]['COST_CAND'] . '</p>';
        echo '<p>Número de Votos:' . $candidates[$numCandidate]['VOTO_CAND'] . '</p>';
    }
}

?>

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



                <button type="button" class="button-blue">Porcetaje Votos</button>
                <br><br>
                <button onclick="location.href='index.php?action=vote'"
                        type="button" class="button-blue">Votar</button>
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
                <button onclick="location.href='index.php?action=vote'"
                        type="button" class="button-blue">Votar</button>
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