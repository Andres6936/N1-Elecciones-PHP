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
        echo '<img src="images/Francis.jpg" alt="Obama" width="160" height="200" class="center">';
        $this->showInformation($candidateFrank);
    }
    
    public function showCandidateClaire()
    {
        $resultObject = $this->candidatesTable;

        $candidateClaire = $resultObject->getCandidateClaire();
        echo '<img src="images/Claire.jpg" alt="Obama" width="160" height="200" class="center">';
        $this->showInformation($candidateClaire);
    }
    
    public function showCandidateObama()
    {
        $resultObject = $this->candidatesTable;

        $candidateObama = $resultObject->getCandidateObama();

        echo '<img src="images/Obama.jpg" alt="Obama" width="160" height="200" class="center">';
        $this->showInformation($candidateObama);
    }

    private function showInformation($candidate)
    {
        echo '<p>Name:' . $candidate['NOM_CAND'] . '</p>';
        echo '<p>Last Name:' . $candidate['APEL_CAND'] . '</p>';
        echo '<p>Age:' . $candidate['EDAD_CAND'] . '</p>';
        echo '<p>Political Party: <br>' . $candidate['PART_CAND'] . '</p>';
        echo '<p>Cost Campaign:' . $candidate['COST_CAND'] . '</p>';
        echo '<p>N° of Votes:' . $candidate['VOTO_CAND'] . '</p>';
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
