<?php 
     if (isset($_GET['editp'])) {
         ob_clean();
         $editProject = $_GET['editp'];
         $projects = $entityManager->getRepository('Project')->findAll();
         $getProject = $entityManager->find('Project', $editProject);
        ?>
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
            Name: <input type="text" name="update-pname" value="<?=$getProject->getName()?>">
            Deadline: <input type="text" name="upd-dl" value="<?=$getProject->getDeadline()?>">
            <input class="sub" type="submit" value="Update">
            <div><a href="index.php?projects">Cancel</a></div>
        </form>
<?php 
        if (isset($_POST['update-pname']) || isset($_POST['upd-dl'])) {
            $name = $_POST['update-pname'];
            $deadline = !empty($_POST['upd-dl']) ? $_POST['upd-dl'] : $getProject->getDeadline();
            $getProject->setName($name);
            $getProject->setDeadline($deadline);
            $entityManager->flush();
            header('Location: ./index.php?projects');
        }
    }
?>