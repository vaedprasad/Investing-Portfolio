<?php
    require("../includes/config.php");
    
        if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
            $list = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
            render("history_form.php", ["title" => "History", "list" => $list]);
 
        }    
            
            
?>