<?php

    include 'database.php';
    session_start();
    $db=new mysqli(dbhost,dbuser,dbpass,dbtable);//crea nuova connessione al db, in base alle costanti in database.php
    if ($this->db->connect_error)
        die('Connessione fallita: '+$db->connect_error);//nel caso di errore, taglia la connessione


    /*funzione di login,
    @param email
    @param pwd  in sha256
    @return indicazione se l'utente esiste
    */
    function login($email,$pwd){
        $codePwd = sha256($pwd);
        if( mb_strlen($email, 'utf8') >= 70)//se la mail è >di 70 caratteri tronca il login
            return false;

        $stmt= $db->prepare("SELECT nome,cognome,ruolo FROM users WHERE email=? AND password=?");
        $stmt->bind_param('ss',$email,$codePwd);//bind dei parametri
        $stmt->execute();
        $result=$stmt->get_result();
        if($row=$result->fetch_assoc()){

            $_SESSION["nome"]=$row["nome"];//carico le info in sessione
            $_SESSION["cognome"]=$row["cognome"];
            $_SESSION["ruolo"]=$row["ruolo"];
            return true;//ritorno true al login
        }else
            return false;
    }//login
?>
