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
        echo '<p>Partido Político: <br>' . $candidates[$numCandidate]['PART_CAND'] . '</p>';
        echo '<p>Costo Campaña:' . $candidates[$numCandidate]['COST_CAND'] . '</p>';
        echo '<p>Número de Votos:' . $candidates[$numCandidate]['VOTO_CAND'] . '</p>';
    }
}
