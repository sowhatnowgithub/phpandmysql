<!DOCTYPE html>
<html>
    <head>
        <title>Cubes</title>
        
    </head>
    <body>
        <h1>Cubes of First 10 Numbers</h1>
        <table width="150px" border="2" bgcolor="pink">
            <tr>
                <th scope="row">Integer</th>
                <th scope="row">Cube</th>
            </tr>
            <?php
                for($a=0;$a<100;$a++){
                    print "<tr>";
                    print "<td>".$a."</td>";
                    print "<td>".$a*$a*$a."</td>";
                    print "</tr>";                
                }
            ?>
        </table>
    </body>
</html>