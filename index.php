 <?php

     try
     {
         // Include the file that creates the $pdo variable and
         // connects to the database
         include_once __DIR__ . '/php/DatabaseConnection.php';

         include_once __DIR__ . '/php/DatabaseTable.php';

         $candidateTable = new DatabaseTable($pdo, 'Candidatos', 'ID_CAND');
         $votingTable = new DatabaseTable($pdo, 'Votantes', 'ID_VOTA');

         $result = $pdo->query('SELECT * FROM Candidatos');

         // Get the results of query and save in array.
         while ($row = $result->fetch())
         {
             $nameCandidate[] = $row['NOM_CAND'];
             $lastNameCandidate[] = $row['APEL_CAND'];
             $politicalPartyCandidate[] = $row['PART_CAND'];
             $ageCandidate[] = $row['EDAD_CAND'];
             $costElectoralCampaignCandidate[] = $row['COST_CAND'];
             $votesCandidate[] = $row['VOTO_CAND'];
         }

         ob_start();

         include __DIR__ . '/html/Urna.php';

         $output = ob_get_clean();
     }
     catch (PDOException $exception)
     {
         $output = '<p>Unable to Connect to the Database server.</p><br>';

         echo '<p>Error: ' . $exception->getMessage() . '</p>';
         echo '<p>File: ' . $exception->getFile() . '</p>';
         echo '<p>Line: ' . $exception->getLine() . '</p>';

     }

     // This line is necessary to show page.
     include __DIR__ . '/html/Urna.php';

     // Disconnect from the database server.
     $pdo = null;
