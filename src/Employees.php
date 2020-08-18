<?php 
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="employees")
 */
    class Employee {
        /** 
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        protected $id;
        /** 
         * @ORM\Column(type="string") 
         */
        protected $name;
        /** 
         * @ORM\Column(type="string") 
         */
        protected $surname;
        /**
         * @ORM\Column(type="string")
         */
        protected $role;
        /**
         * @ORM\ManyToOne(targetEntity="employee")
         * @ORM\JoinTable(name="project_employee",
         *      joinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="project_id")},
         *      inverseJoinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id", unique=true)}
         * )
         */
        protected $employee_id;

        public function getProjectData() {
            return $this->project_id;
        }
    
        public function getID() {
            return $this->id;
        }
        public function setName($name) {
            $this->name = $name;
        }
        public function getName() {
            return $this->name;
        }
        public function setSurname($surname) {
            $this->surname = $surname;
        }
        public function getSurname() {
            return $this->surname;
        }
        public function setRole($role) {
            $this->role = $role;
        }
        public function getRole() {
            return $this->role;
        }
    }
?>