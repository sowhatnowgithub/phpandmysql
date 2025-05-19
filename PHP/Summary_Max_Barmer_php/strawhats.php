<html>
    <head>
        <title>One Piece Characters</title>
    </head>
    <body>
        <h1>One Piece</h1>
        <h3>Straw Hat Pirates</h3>
        <?php
            $name = array("Luffy","Zoro","Usopp","Nami","Sanji","Chopper",
            "Robin","Franky","Brook","Zimbei");
            $status = array("Captian","Swordsman","Sniper","Treasurer and Navigation","Cook","Doctor","Archealogist","Ship Wreck","Musician","Helmsman");
        ?>
        <table border=3 cellspacing=3 cellpadding=4>
            <tr scope="col">
            <th>Order_Joining</th>
            <th>Name</th>
            <th>Status</th>
            </tr>
            <?php
            for ($i=0;$i<10;$i++){
                print"
                    <tr>
                    <td>".$i."</td>
                    <td>".$name[$i]."</td>
                    <td>".$status[$i]."</td>
                    </tr>
                ";
            }
            ?>
        </table>
    </body>
</html>