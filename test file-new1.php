<html>
    <head>   
        <link href="style-new1.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <?php
        include 'Calendar-new1.php';
        
        $calendar = new Calendar();
        
        echo $calendar->show();
        ?>

        <input type="button" value="Add New Event" onclick="location='add event-new1.php'">

    </body>
</html>  