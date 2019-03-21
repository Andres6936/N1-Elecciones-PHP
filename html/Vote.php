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

        $votersCandidate = $electionController->getVotersTable();
        $votersCandidate->save(['ID_VOTA' => '',
            'NOM_VOTA' => $firstName, 'APEL_VOTA' => $lastName]);
    }
}
