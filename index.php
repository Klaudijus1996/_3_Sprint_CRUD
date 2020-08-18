<?php 
declare(strict_types=1); include_once('bootstrap.php');
$employees = $entityManager->getRepository('employee')->findAll();
$projects = $entityManager->getRepository('project')->findAll();
$EmployeeTableColumns = $entityManager->getClassMetadata('employee')->getColumnNames();
$ProjectsColumns = $entityManager->getClassMetadata('project')->getColumnNames();
// $ProjectsJoinedColumns = $entityManager->getClassMetadata('project')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/user.css">
    <title>C.R.U.D</title>
</head>
<body>
    <header>
        <div>
            <a href="index.php">Employees</a>
            <a href="index.php?projects">Projects</a>
            <h2>C.R.U.D</h2>
        </div>
        <?php
            $test = $entityManager->getRepository('project')->findAll();
            echo "<br>:: TESTING ::<br>";
            // echo "<pre>";var_dump($test);
            foreach($test as $tests) {
                echo "<pre>";var_dump($tests->getEmployeeName()->getName());
                // $data = $tests->getEmployeeName();
                // foreach($data as $kekw) {
                //     echo $kekw->getName();
                // }
            }
            echo "<br>";
        ?>
    </header>
    <main>
        <table>
            <?php ob_start(); ?>
            <tr>
                <?php foreach($EmployeeTableColumns as $column) { ?>
                <th><?echo $column?></th>
                <?php } ?>
            </tr>
            <?php foreach($employees as $employee) { ?>
            <tr>
                <td><?echo $employee->getID()?></td>
                <td><?echo $employee->getName()?></td>
                <td><?echo $employee->getSurname()?></td>
                <td><?echo $employee->getRole()?></td>
            </tr>
            <?php } ?>
            <?php if(isset($_GET['projects'])) { ob_clean(); ?>
            <tr>
                <?php foreach($ProjectsColumns as $column) { ?>
                <th><?echo $column?></th>
                <?php } ?>
                <th>Employees</th>
            </tr>
            <?php foreach($projects as $project) { ?>
            <tr>
                <td><?echo $project->getID()?></td>
                <td><?echo $project->getName()?></td>
                <td><?echo $project->getDeadline()?></td>
                <td><?=$project->getEmployeeName()->getName()?></td>
            </tr>
            <?php }} ?>
        </table>
    </main>
    <footer>
    <h5><?echo "&#169;  ".date("\n l jS F Y"); ?></h5>
    </footer>
</body>
</html>