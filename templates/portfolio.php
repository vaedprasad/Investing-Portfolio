<div>
<table class= "table table-bordered">
    <?php
            print("<tr>");
            print("<th><center>" . "Symbol" . "</center></td>");
            print("<th><center>" . "Name" . "</center></td>");
            print("<th><center>" . "Shares" . "</center></td>");
            print("<th><center>" . "Price" . "</center></td>");
            print("<th><center>" . "Total" . "</center></td>");
        foreach ($positions as $position)
        {
            
            print("<tr>");
            print("<td>" . $position["symbol"] . "</td>");
            print("<td>" . $position["name"] . "</td>");
            print("<td>" . $position["shares"] . "</td>");
            print("<td>" . "$" . $position["price"] . "</td>");
            print("<td>" . "$" . $position["total"] . "</td>");

            print("</tr>");
        }

            print("<tr>");
            print("<th><center>" . "Total" . "</center></td>");
            print("<th>" . "" . "</td>");
            print("<th>" . "" . "</td>");
            print("<th>" . "" . "</td>");
            print("<th><center>" . "$" . $gtotal . "</center></td>");

    ?>
</table>
</div>

<?php
$showcash = number_format($money);
print("Cash: $" . $showcash);
