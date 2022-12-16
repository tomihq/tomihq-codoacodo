<?php
    class Person{
        protected $id; 
        protected $name;
        protected $surname;
        protected $email;

        function __construct($name, $surname, $email){

            if(is_null($name) || empty($name)){
                $name = '';
            }

            $this->name = $name;
            $this->surname = $surname;
            $this->email = $email;
        }

        function getName(){
            return $this->name;
        }
    
        function getPerson(){
            $user = Array("id" => $this->id, "name"=> $this->name, "surname" => $this->surname, "email" => $this->email);
    
            return $user;
        }
        
        function setID($id){
            $this->id = $id;
        }


        
    }

   


?>