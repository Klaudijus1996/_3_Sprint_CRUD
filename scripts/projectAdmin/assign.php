<?php 
    if(isset($_GET['assign'])) { $projectID = $_GET['assign']; ob_clean();?>
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
                <td><a href="index.php?delp=<?=$id?>">Del</a><a href="index.php?editp=<?=$id?>">Edit</a><a href="index.php?assign=<?=$id?>">Assign</a></td>
            </tr>
            <?php } ?>
        </table>
        <?="<a href='index.php?addp'>Add</a>"?>
        <form action="" method="post" autocomplete="off">
            Select project: <select name="projects" id="projects"> 
                <?php foreach($employees as $employee) { ?>
                    <option value="<?=$employee->getID()?>"><?=$employee->getName().' '.$employee->getSurname()?></option>
                    <?php } ?>
                    <option value="NULL">-</option>
            </select>
            <input type="submit" value="Assign">
        </form>
    <?php 
            if (isset($_POST['projects'])) {
                $employeeID = $_POST['projects'];
                $findProject = $entityManager->find('Project', $projectID);
                $findEmployee = $entityManager->find('Employee', $employeeID);
                $findEmployee->setProjectID($findProject);
                $entityManager->flush();
                header('Location: ./index.php?projects');
            }
    }
?>