<?php
    require("../includes/config.php");
    
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $list = query("SELECT*FROM portfolio WHERE id = ?", $_SESSION["id"]);
            render("sell_form.php", ["title" => "Sell", "list" => $list]);
 
        }    
            
        else if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            
            $stock = lookup($_POST["symbol"]);
            $shares = query("SELECT shares FROM portfolio WHERE id=? AND symbol=?", $_SESSION["id"], $_POST["symbol"]);
            query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            query("UPDATE users SET cash = cash + ? WHERE id = ?", $stock["price"] * $shares[0]["shares"], $_SESSION["id"]);
            query("INSERT INTO history (transaction, symbol, shares, price, id) VALUES(?,?,?,?,?)", "SELL", $_POST["symbol"], $shares[0]["shares"], $shares[0]["shares"] * $stock["price"], $_SESSION["id"]);

            redirect("index.php");


        }
            
?>