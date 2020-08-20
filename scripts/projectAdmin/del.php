<?php 
    if (isset($_GET['delp'])) {
        $delete = $_GET['delp'];
        $project = $entityManager->find('Project', $delete);
        $entityManager->remove($project);
        $entityManager->flush();
        header('Location: ./index.php?projects');
    }
?>