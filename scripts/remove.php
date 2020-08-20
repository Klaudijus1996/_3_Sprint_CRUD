<?php 
    if (isset($_GET['removeEmployee'])) { ob_clean();
        $removeEmployee = $_GET['removeEmployee'];
        // $employee = $entityManager->find('Employee', $removeEmployee);
        $employee = $entityManager->getRepository('Employee')->findBy(array('project_id' => $removeEmployee));?>
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
            <td>
                <a href="index.php?projectsDel=<?=$id?>">Del</a>
                <a href="index.php?projectsEdit=<?=$id?>">Edit</a>
                <a href="index.php?projectsAssign=<?=$id?>">Assign</a>
                <a href="index.php?removeEmployee=<?=$id?>">Remove</a>
            </td>
        </tr>
        <?php } ?>
        </table>
        <form action="" method="post">
            Remove employee from project: <select name="selectEmployee" id="">
                <?php foreach($employee as $single) { ?>
                    <option value="<?=$single->getID()?>"><?=$single->getName();?> <?=$single->getSurname()?></option>
               <?php  } ?>
            </select>
            <input type="submit" value="Remove">
        </form>
   <?php 
        if(isset($_POST['selectEmployee'])) {
            $selectedEmployee = $_POST['selectEmployee'];
            $employee = $entityManager->find('Employee', $selectedEmployee);
            $employee->setProjectID(NULL);
            $entityManager->persist($project);
            $entityManager->flush();
            header('Location: ./index.php?projects');
        }
    }
?>