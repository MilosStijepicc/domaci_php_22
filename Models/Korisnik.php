<?php

    require_once "Baza.php";

    class Korisnik extends Baza
    {

        private $name = "milos";

        public function delete($email)
        {
            $email = $this->sql->real_escape_string($email);
            $this->sql->query("DELETE FROM korisnici WHERE email = '$email' ");
        }

        public function update($email, $newEmail)
        {
            $email = $this->sql->real_escape_string($email);
            $newEmail = $this->sql->real_escape_string($newEmail);
            $this->sql->query("UPDATE korisnici SET email = '$newEmail' WHERE email = '$email' ");
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($newName)
        {
            $this->name = ucfirst($newName);
        }

        public function register($email, $sifra)
        {

            $sifra = password_hash($sifra, PASSWORD_BCRYPT);
            $email = $this->sql->real_escape_string($email);
            $sifra = $this->sql->real_escape_string($sifra);
            
            $provjera = $this->sql->query("SELECT * FROM korisnici WHERE email = '$email' ");

            if($provjera->num_rows >= 1){
                die("Email vec postoji.");
            }
            else{
                $this->sql->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$sifra')");
            }

            
        }

        public function emailExists($email)
        {
            $email = $this->sql->real_escape_string($email);
            $result = $this->sql->query("SELECT * FROM korisnici WHERE email = '$email' ");

            if($result->num_rows == 1){
                echo "Korisnik postoji.";
            }
            else{
                echo "Korisnik ne postoji.";
            }

        }
    }

?>