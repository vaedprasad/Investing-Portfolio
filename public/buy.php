
         
<?php
    require("../includes/config.php");
    
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $list = query("SELECT*FROM portfolio WHERE id = ?", $_SESSION["id"]);
            render("buy_form.php", ["title" => "Sell", "list" => $list]);
 
        }    
            
        else if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            
            if(preg_match("/^\d+$/", $_POST["shares"])&&$_POST["shares"]!=0)
            {
                $stock = lookup($_POST["symbol"]);
                $shares = query("SELECT * FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
                $cash= query("SELECT cash FROM users WHERE id=?", $_SESSION["id"]);
                $amt = $stock["price"] * $_POST["shares"];
                if($cash[0]["cash"]>=$amt)
                {
                    
                    query("INSERT INTO portfolio (id, symbol, shares) VALUES(?,?,?) ON DUPLICATE KEY UPDATE shares=shares+?", $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $_POST["shares"]);
                    query("UPDATE users SET cash = cash - ? WHERE id = ?", $amt, $_SESSION["id"]);
                    query("INSERT INTO history (transaction, symbol, shares, price, id) VALUES(?,?,?,?,?)", "BUY", $_POST["symbol"], $_POST["shares"], $stock["price"]*$_POST["shares"], $_SESSION["id"]);
                    redirect("index.php");

                   
                }
                
                else
                {
                        apologize("Sorry, you do not have enough money for this purchase. Please try again.");
                }
            }
            
            else
            {
                apologize("The number of shares you buy must be an integer greater than 0. Please try again.");
            }


        }
            
?>