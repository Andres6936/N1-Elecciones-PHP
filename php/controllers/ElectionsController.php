<?php

class ElectionsController
{
    // Fields

    private $candidateTable;

    // Constructs

    public function __construct(DatabaseTable $candidateTable)
    {
        $this->candidateTable = $candidateTable;
    }

    // Methods

    public function home()
    {

    }

    public function list()
    {
        $result = $this->candidateTable->findAll();

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

        ob_start();

        include __DIR__ . '/html/Urn.php';

        $output = ob_get_clean();

        return ['output' => $output, 'candidates' => $candidates];
    }

    public function edit()
    {

    }
}