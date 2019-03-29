<?php

/**
 * Singleton Class.
 * This class cannot be extended.
 */
final class Vote
{
    // Fields

    /**
     * @var Vote Hold the class instance.
     */
    private static $instance = null;

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
            self::$instance = new Vote();
        }

        return self::$instance;
    }

    // Method

    public function processVoteForm($form)
    {
        $firstName = $form['first-name'];
        $lastName = $form['last-name'];
        $candidate = $form['candidate'];
        $influence = $form['influence'];

        $electionController = ElectionsController::getInstance();

        $candidateTable = $electionController->getCandidatesTable();

        if($candidate == 'candidate-first')
        {
            $idCandidate = 1;
            $candidateTable->incrementBy(['VOTO_CAND'], 1, 1);
            $this->processInfluenceVote($candidateTable, $idCandidate, $influence);
        }
        else if($candidate == 'candidate-second')
        {
            $idCandidate = 2;
            $candidateTable->incrementBy(['VOTO_CAND'], 2, 1);
            $this->processInfluenceVote($candidateTable, $idCandidate, $influence);
        }
        else if($candidate == 'candidate-third')
        {
            $idCandidate = 3;
            $candidateTable->incrementBy(['VOTO_CAND'], 3, 1);
            $this->processInfluenceVote($candidateTable, $idCandidate, $influence);
        }
        else if($candidate == 'blank-vote')
        {
            //TODO: Document this convention
            //Zero for blank vote
            $idCandidate = 0;
        }
        else
        {
            //TODO: Document this convention
            //Zero for blank vote
            $idCandidate = 0;
        }

        $votersCandidate = $electionController->getVotersTable();
        $votersCandidate->insert(['ID_VOTA' => '',
            'NOM_VOTA' => $firstName, 'APEL_VOTA' => $lastName,
            'ID_CAND' => $idCandidate]);
    }

    /**
     * Processes the influence of the vote according to the requirements,
     * increasing the campaign cost of the chosen candidate.
     * @param DatabaseTable $candidate Table Candidate.
     * @param int $primaryKey Value of the primary register key.
     * @param string $influence Influence of the vote.
     */
    public function processInfluenceVote(DatabaseTable $candidate,
                                         int $primaryKey, string $influence)
    {
        if($influence == 'television')
        {
            $candidate->incrementBy(['COST_CAND'], $primaryKey, 1000);
        }
        else if($influence == 'radio')
        {
            $candidate->incrementBy(['COST_CAND'], $primaryKey, 500);
        }
        else if($influence == 'internet')
        {
            $candidate->incrementBy(['COST_CAND'], $primaryKey, 100);
        }
        else
        {
            //TODO: Throw Exception
            echo '<p>Error</p>';
        }
    }
}
