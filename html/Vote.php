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

        $electionController = ElectionsController::getInstance();

        $candidateTable = $electionController->getCandidatesTable();

        if($candidate == 'candidate-first')
        {
            $idCandidate = 1;
            $candidateTable->incrementBy(['VOTO_CAND'], 1, 1);
        }
        else if($candidate == 'candidate-second')
        {
            $idCandidate = 2;
            $candidateTable->incrementBy(['VOTO_CAND'], 2, 1);
        }
        else if($candidate == 'candidate-third')
        {
            $idCandidate = 3;
            $candidateTable->incrementBy(['VOTO_CAND'], 3, 1);
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
}
