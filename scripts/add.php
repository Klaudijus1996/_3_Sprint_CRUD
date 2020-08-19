<?php 
    if (isset($_GET['adde'])) { ?>
        <form action="" method="post" autocomplete="off">
            *Enter name<input type="text" name="fname">
            *Enter last name<input type="text" name="lname">
            *Enter role<input type="text" name="role">
             Enter project ID<input type="number" name="pid">
            <input type="submit" value="Add">
            <div><a href="index.php">Cancel</a></div>
        </form>
    <?php 
        if (isset($_POST['fname']) && isset($_POST['lname'])) {
            $name = $_POST['fname'];
            $surname = $_POST['lname'];
            $role = empty($_POST['role']) ? '-' : $_POST['role'];
            $projectid = empty($_POST['pid']) ? '-' : $_POST['pid'];

            $employee = new Employee();
            $employee->setName($name);
            $employee->setSurname($surname);
            $employee->setRole($role);
            $employee->setProjectID($projectid);
            $entityManager->persist($employee);
            $entityManager->flush();
            header('Location: ./index.php');
        } 
    } else { ?>
        <a href="index.php?adde">Add</a>
    <?php } 
?>