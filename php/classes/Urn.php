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
    private $candidatesTable;

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

    public function setCandidatesTable(DatabaseTable $candidatesTable)
    {
        $this->candidatesTable = $candidatesTable;
    }

    public function showCandidateFrank()
    {
        $resultObject = $this->candidatesTable;

        $candidateFrank = $resultObject->getCandidateFrank();
        $this->showInformation($candidateFrank);
    }
    
    public function showCandidateClaire()
    {
        $resultObject = $this->candidatesTable;

        $candidateClaire = $resultObject->getCandidateClaire();
        $this->showInformation($candidateClaire);
    }
    
    public function showCandidateObama()
    {
        $resultObject = $this->candidatesTable;

        $candidateObama = $resultObject->getCandidateObama();
        $this->showInformation($candidateObama);
    }

    private function showInformation($candidate)
    {
        echo '<p>Nombre:' . $candidate['NOM_CAND'] . '</p>';
        echo '<p>Apellido:' . $candidate['APEL_CAND'] . '</p>';
        echo '<p>Edad:' . $candidate['EDAD_CAND'] . '</p>';
        echo '<p>Partido Político: <br>' . $candidate['PART_CAND'] . '</p>';
        echo '<p>Costo Campaña:' . $candidate['COST_CAND'] . '</p>';
        echo '<p>Número de Votos:' . $candidate['VOTO_CAND'] . '</p>';
    }
    
    public function showButtonAverageAndVote()
    {
        echo '<button type="button" class="button-blue">Porcetaje Votos</button>';
        echo '<br><br>';
        echo '<button onclick="location.href=\'index.php?action=vote\'"
                type="button" class="button-blue">Votar</button>';
    }

    public function showAverageVotes()
    {

    }

    public function showTotalCampaignCost()
    {

    }
}
