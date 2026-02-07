<?php

    require_once "Models/Korisnik.php";
    
    $korisnik = new Korisnik();

    //$korisnik->register("milosojkic@gmail.com", "123321");

    echo $korisnik->setName("milosojko");
    echo $korisnik->getName();

    $korisnik->delete("milosojko@gmail.com");
    $korisnik->update("milosojkic@gmail.com", "milosojkan@gmail.com");

?>