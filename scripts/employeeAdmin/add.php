<?php 
    if (isset($_GET['adde'])) { ?>
        <form action="" method="post" autocomplete="off">
            *Enter name<input type="text" name="fname">
            *Enter last name<input type="text" name="lname">
            *Enter role<input type="text" name="role">
            <select name="projects" id="projects"> 
                <option value="NULL">-</option>
                <?php foreach($projects as $project) { ?>
                <option value="<?=$project->getID()?>"><?=$project->getName()?></option>
                <?php } ?>
            </select>
            <input type="submit" value="Add">
            <div><a href="index.php">Cancel</a></div>
        </form>
    <?php 
        if (isset($_POST['fname']) && isset($_POST['lname'])) {
            $projectID = $entityManager->find('Project', $_POST['projects']);
            $name = $_POST['fname'];
            $surname = $_POST['lname'];
            $role = empty($_POST['role']) ? '-' : $_POST['role'];

            $employee = new Employee();
            $employee->setName($name);
            $employee->setSurname($surname);
            $employee->setRole($role);
            $employee->setProjectID($projectID);
            $entityManager->persist($employee);
            $entityManager->flush();
            header('Location: ./index.php');
        } 
    } else { ?>
        <a href="index.php?adde">Add</a>
    <?php } 
?>