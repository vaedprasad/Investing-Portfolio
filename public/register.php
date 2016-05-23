<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        {
        // else render form
        render("register_form.php", ["title" => "Register"]);
        }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
        if  (empty($_POST["username"]))
            {
             apologize("Your username seems to be blank");
  
            }
        else if (empty($_POST["password"]))
            {
             apologize("Your password seems to be blank");
            }
        else if ($_POST["password"]!==$_POST["confirmation"])
            {
          apologize("Your password does not match your confirmation");
            }    
        
        else 
       
            {
             $people= query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

                 if (empty($people))
                    { 
                    query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
                    $rows = query("SELECT LAST_INSERT_ID() AS id");
                    $id = $rows[0]["id"];
                    $_SESSION=$id;
                    redirect("index.php");
                    }
                else
                    {
                    apologize("Sorry, that username is already in use");
                    }
                        
            }  
                
        }
       

?>