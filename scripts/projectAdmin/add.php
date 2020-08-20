<?php
if (isset($_GET['addp'])) { ob_clean(); ?>
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
                <td><a href="index.php?del.p">Del</a><a href="index.php?edit.p">Edit</a><a href="index.php?assign">Assign</a></td>
            </tr> <?php } ?>
        </table>
            <form action="" method="post" autocomplete="off">
                *Enter project name <input type="text" name="pname">
                Date <input type="text" name="pdl">
                <input type="submit" value="Add">
                <div><a href="index.php?projects">Cancel</a></div>
            </form>
       <?php
       $date = date_create();
       date_add($date,date_interval_create_from_date_string("7 days"));
       $futureDate = date_format($date, "Y-m-d");
       $pdl = !empty($_POST['pdl']) ? $_POST['pdl'] : $futureDate;
       if (isset($_POST['pname'])) {
            $pname = $_POST['pname'];
            $project = new Project();
            $project->setName($pname);
            $project->setDeadline($pdl);

            $entityManager->persist($project);
            $entityManager->flush();
            header('Location: ./index.php?projects');
       }
    } 
?>