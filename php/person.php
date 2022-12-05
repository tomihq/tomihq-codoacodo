<?php
    class Person{
        protected $name;
        protected $surname;
        protected $email;

        function __construct(string $name, string $surname, string $email){
            $this->name = $name;
            $this->surname = $surname;
            $this->email = $email;
        }

        function getName(){
            return $this->name;
        }
    
        function getPerson(){
            $user = Array("name"=> $this->name, "surname" => $this->surname, "email" => $this->email);
    
            return $user;
        }
        
    }

   


?>