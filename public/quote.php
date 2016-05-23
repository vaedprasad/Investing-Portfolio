<?php
    require("../includes/config.php");
    
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
        // else render form
        render("quote_form.php", ["title" => "Quote"]);
        }
  
        else if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $stock= lookup($_POST["symbol"]);
            render("stock_price.php", ["title"=> "Quote", "stock" => $stock, ]);
        }
        
?>