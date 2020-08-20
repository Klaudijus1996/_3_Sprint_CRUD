<?php 
    if (isset($_GET['dele'])) {
        $delete = $_GET['dele'];
        $employee = $entityManager->find('Employee', $delete);
        $entityManager->remove($employee);
        $entityManager->flush();
        header('Location: ./index.php');
    }
?>