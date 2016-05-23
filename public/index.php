<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio
    
    
    $money = query ("SELECT cash FROM users WHERE id=?", $_SESSION["id"]);
    $rows = query("SELECT symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"]);

    $positions = [];
    $gtotal=0;
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "total"  => $stock["price"] * $row["shares"],

            ];
                 $gtotal += $stock["price"]*$row["shares"];

        }
        
    }
    
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions, "gtotal" => $gtotal, "money" => $money[0]["cash"]]);
    
?>
