 <?php

     try
     {
         // Include the file that creates the $pdo variable and
         // connects to the database
         include_once __DIR__ . '/php/DatabaseConnection.php';

         include_once __DIR__ . '/php/classes/DatabaseTable.php';
         include_once __DIR__ . '/php/controllers/ElectionsController.php';

         $candidateTable = new DatabaseTable($pdo, 'Candidatos', 'ID_CAND');
         $votingTable = new DatabaseTable($pdo, 'Votantes', 'ID_VOTA');

         $electionsController = new ElectionsController($candidateTable);

         $page = $electionsController->list();

         $candidates = $page['candidates'];

         $nameCandidate[] = $candidates[0]['NOM_CAND'];
         $lastNameCandidate[] = $candidates[0]['APEL_CAND'];
         $politicalPartyCandidate[] = $candidates[0]['PART_CAND'];
         $ageCandidate[] = $candidates[0]['EDAD_CAND'];
         $costElectoralCampaignCandidate[] = $candidates[0]['COST_CAND'];
         $votesCandidate[] = $candidates[0]['VOTO_CAND'];
     }
     catch (PDOException $exception)
     {
         $output = '<p>Unable to Connect to the Database server.</p><br>';

         echo '<p>Error: ' . $exception->getMessage() . '</p>';
         echo '<p>File: ' . $exception->getFile() . '</p>';
         echo '<p>Line: ' . $exception->getLine() . '</p>';

     }

     // This line is necessary to show page.
     include __DIR__ . '/html/Urn.php';
