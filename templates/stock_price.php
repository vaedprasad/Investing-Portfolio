<?php

if(lookup($_POST["symbol"]))
{
    print("Name: " . $stock["name"]);
?>
<br>
<?php
    print("Symbol: " . $stock["symbol"]);
?>
<br>
<?php
    print("Share: 1");
?>
<br>
<?php
    print("Price: $" . $stock["price"]);
}
else
{
    apologize("That stock symbol is invalid, please try again.");
}

?>