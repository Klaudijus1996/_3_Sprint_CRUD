<?php 
    $URI = $_SERVER['REQUEST_URI'];
    $str = substr($URI, strripos($URI, '/')+1);
    function group($peopleArr) {
        if(empty($peopleArr)) {
            return '-';
        }
        $groupedPeople = "";
        foreach($peopleArr as $people) {
            foreach($people as $person) {
                $groupedPeople.= "$person, ";
            }
        }
        return substr($groupedPeople, 0, strripos($groupedPeople, ','));
    }
?>