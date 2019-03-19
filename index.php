 <?php

     try
     {
         // Include the file that creates the $pdo variable and
         // connects to the database
         include_once __DIR__ . '/php/DatabaseConnection.php';

         include_once __DIR__ . '/html/Urn.php';
         include_once __DIR__ . '/php/classes/DatabaseTable.php';
         include_once __DIR__ . '/php/controllers/ElectionsController.php';

         $candidateTable = new DatabaseTable($pdo, 'Candidatos', 'ID_CAND');
         $votingTable = new DatabaseTable($pdo, 'Votantes', 'ID_VOTA');

         $electionsController = ElectionsController::getInstance();

         $urn = Urn::getInstance();
         $urn->setCandidates($candidateTable);
         $urn->showCandidate(0);

         if (isset($_GET['action']))
         {
             $action = $_GET['action'];
         }
         else
         {
             $action = 'home';
         }

//         if ($action == 'vote')
//         {
//             $page = $electionsController->vote();
//             echo $page['output'];
//         }
//         else
//         {
//             $page = $electionsController->list();
//             echo $page['output'];
//         }
     }
     catch (PDOException $exception)
     {
         $output = '<p>Unable to Connect to the Database server.</p><br>';

         echo '<p>Error: ' . $exception->getMessage() . '</p>';
         echo '<p>File: ' . $exception->getFile() . '</p>';
         echo '<p>Line: ' . $exception->getLine() . '</p>';

     }
