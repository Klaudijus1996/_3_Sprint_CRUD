<?php 
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