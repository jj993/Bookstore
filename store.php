<html>
    <head>
        <title>BookStore - Store</title>
    </head>
    <body>
        <nav>
            <br>
            <h2>BookStore</h2>
            <br>
            <span><a href="index.html">Home</a></span>&nbsp;&nbsp;&nbsp;<span><a href="store.php">Store</a></span>
        </nav>
        <main>
        <br><br>
        <table width="60%">
            <thead>
                <tr>
                    <th align="left">Book ID</th>
                    <th align="left">Book Name</th>
                    <th align="left">Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php


                require('mysqli_connect.php');
                $query = "SELECT * FROM bookinventory";
                $result = @mysqli_query($dbc, $query);
                $num = @mysqli_num_rows($result);
                if($num>0){
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo '<tr><td align="left">' . $row['BookID'] . '</td>
                        <td align="left">' . $row['BookName'] . '</td>
                        <td align="left">' . $row['Quantity'] . '</td>
                        </tr>';
                    }
                }
            ?>
            </tbody>
        </table>
        </main>
        <footer>
        <h3>Book Store</h3>
              <p>
                3055 Bramalea Road <br>
               Brampton, ON, Canada<br><br>
                <strong>Phone:</strong> +1  888-555-5500<br>
                
              </p>
            <small><i>BookStore &copy; 2021</i></small>
        </footer>
    </body>
</html>