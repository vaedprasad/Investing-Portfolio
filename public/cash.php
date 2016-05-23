<?php
    require("../includes/config.php");
    
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $list = query("SELECT*FROM portfolio WHERE id = ?", $_SESSION["id"]);
            render("cash_form.php", ["title" => "Cash", "list" => $list]);
 
        }    
            
        else if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(preg_match("/^\d+$/", $_POST["cash"])&&$_POST["cash"]!=0)
            {
                $acash = $_POST["cash"];
                query("UPDATE users SET cash = cash + ? WHERE id = ?", $acash, $_SESSION["id"]);
                query("INSERT INTO history (transaction, symbol, shares, price, id) VALUES(?,?,?,?,?)", "ADD", "N/A", 0 , $acash, $_SESSION["id"]);
                redirect("index.php");
            }
            
            else
            {
                apologize("You may only add integerial cash values greater than $0");
            }


        }
            
?>