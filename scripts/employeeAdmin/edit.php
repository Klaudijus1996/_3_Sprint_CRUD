<?php 
     if (isset($_GET['edite'])) {
        $editEmployee = $_GET['edite'];
        $employees = $entityManager->getRepository('Employee')->findAll();
        $employee = $entityManager->find('Employee', $editEmployee);
        ?>
        <form action="" method="post" autocomplete="off">
            Name: <input type="text" name="update-fname" value="<?=$employee->getName()?>">
            Surname: <input type="text" name="update-lname" value="<?=$employee->getSurname()?>">
            Role: <input type="text" name="update-role" value="<?=$employee->getRole()?>">
            Project: <select name="projects" id="projects"> 
                <?php foreach($projects as $project) { ?>
                    <option value="<?=$project->getID()?>"><?=$project->getName()?></option>
                    <?php } ?>
                    <option value="NULL">-</option>
            </select>
            <input class="sub" type="submit" value="Update">
            <div><a href="index.php">Cancel</a></div>
        </form>
        <?php 
        if (isset($_POST['update-fname']) || isset($_POST['update-lname']) || isset($_POST['update-role']) || isset($_POST['projects'])) {
            $name = $_POST['update-fname'];
            $surname = $_POST['update-lname'];
            $role = $_POST['update-role'];
            $project = $_POST['projects'];
            $projectID = $entityManager->find('Project', $project);
            $employee->setName($name);
            $employee->setSurname($surname);
            $employee->setRole($role);
            $employee->setProjectID($projectID);
            $entityManager->flush();
            header('Location: ./index.php');
        }
    }
?>