<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>InvestorPro: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$ Finance</title>
        <?php endif ?>
        <link rel="shortcut icon" href="http://sstatic.net/stackoverflow/img/favicon.ico">

        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <a href="/"><img alt="C$ Finance" src="img/logo.gif" style="width:65%;"/></a>
            </div>

            <div id="middle">
<center>        
<button onclick= "window.location.href='index.php'">Portfolio</button>
<button onclick= "window.location.href='quote.php'">Quote</button>
<button onclick= "window.location.href='buy.php'">Buy</button>
<button onclick= "window.location.href='sell.php'">Sell</button>
<button onclick= "window.location.href='history.php'">History</button>
<button onclick= "window.location.href='cash.php'">Add Cash</button>
<button onclick= "window.location.href='logout.php'">Logout</button>
</center>
<br/>
