<div>
<table class= "table table-striped">
    <?php
            print("<tr>");
            print("<th>" . "Transactions" . "</td>");
            print("<th>" . "Date/Time" . "</td>");
            print("<th>" . "Symbol" . "</td>");
            print("<th>" . "Shares" . "</td>");
            print("<th>" . "Price" . "</td>");
        foreach ($list as $position)
        {
            
            print("<tr>");
            print("<td>" . $position["transaction"] . "</td>");
            print("<td>" . $position["datetime"] . "</td>");
            print("<td>" . $position["symbol"] . "</td>");
            print("<td>" . $position["shares"] . "</td>");
            print("<td>" . "$" . $position["price"] . "</td>");

            print("</tr>");
        }

    ?>
</table>
</div>

