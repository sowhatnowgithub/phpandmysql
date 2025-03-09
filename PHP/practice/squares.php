<html>
<head>
    <title>Squares of first 20 even numbers</title> 
</head>
<body>
    <p>The squares of first 20 even numbers</p>
    <table border="2" cellspacing="3" cellpadding=5>
        <tr scope="col">
            <th>S.No</th>
            <th>Number</th>
            <th>Square</th>
        </tr>
        

        <?php
        $num=0;
        for($i=1;$i<21;$i++){
            $num+=2;
            print "<tr>";
            if($num%2==0){
                print "
                <td>".$i."</td>
                <td>".$num."</td>
                <td>".$num*$num."</td>
                ";
            }
            print "</tr>";
        }
        ?>
    </table>
</body>
</html>
