<?php 
declare(strict_types=1);
use Doctrine\ORM\Query;
include_once('bootstrap.php');
include_once('scripts/functions.php');
include_once('scripts/del.php');
// $URI = $_SERVER['REQUEST_URI'];
//     $str = substr($URI, 0, strripos($URI, '/'));
//     echo "<h1>$str</h1>";
$employees = $entityManager->getRepository('employee')->findAll();
$projects = $entityManager->getRepository('project')->findAll();
$EmployeeTableColumns = $entityManager->getClassMetadata('employee')->getColumnNames();
$ProjectsColumns = $entityManager->getClassMetadata('project')->getColumnNames();
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
    </header>
    <main>
        <table>
            <?php ob_start(); ?>
            <tr>
                <?php foreach($EmployeeTableColumns as $column) { ?>
                <th><?echo $column?></th>
                <?php } ?>
                <th>Actions</th>
            </tr>
            <?php foreach($employees as $employee) { ?>
            <tr>
                <td><?echo $employee->getID()?></td>
                <td><?echo $employee->getName()?></td>
                <td><?echo $employee->getSurname()?></td>
                <td><?echo $employee->getRole()?></td>
                <td><a href="index.php?employeeDel=<?=$employee->getID()?>">Del</a><a href="index.php?employeeEdit=<?=$employee->getID()?>">Edit</a></td>
            </tr>
            <?php } ?>
        </table>
        
            <?php if(isset($_GET['projects']) || isset($_GET['projectDel']) || isset($_GET['projectsAdd']) || isset($_GET['projectsEdit']) || isset($_GET['projectsAssign'])) { ob_clean();  ?>
            <tr>
                <?php $column_index = 0; foreach($ProjectsColumns as $column) {$column_index++; ?>
                <th><?echo $column?></th>
                <?php if($column_index == 1) { echo "<th>Employees</th>"; } else {continue;} } ?>
                <th>Actions</th>
            </tr>
            <?php foreach($projects as $project) {
                $id = $project->getID();
                $query = $entityManager->createQuery("SELECT CONCAT(u.name, ' ', u.surname) as fullname FROM Employee u WHERE u.project_id = $id GROUP BY u.id")->getResult(); ?>
            <tr>
                <td><?echo $project->getID()?></td>
                <td><?echo group($query)?></td>
                <td><?echo $project->getName()?></td>
                <td><?echo $project->getDeadline()?></td>
                <td><a href="index.php?projectsDel=<?=$id?>">Del</a><a href="index.php?projectsEdit=<?=$id?>">Edit</a><a href="index.php?projectsAssign=<?=$id?>">Assign</a></td>
            </tr>
            <?php } ?>
        </table>
        <?php  } require_once('scripts/add.php'); require_once('scripts/edit.php');
        require_once('scripts/projectAdmin/assign.php'); 
        if ($str == 'index.php') {
            echo "<a href='index.php?employeeAdd'>Add</a>";
        } else if ($str == 'index.php?projects') {
            echo "<a href='index.php?projectsAdd'>Add</a>";
        }
        ?>
    </main>
    <footer>
    <h5><?echo "&#169;  ".date("\n l jS F Y"); ?></h5>
    </footer>
</body>
</html>