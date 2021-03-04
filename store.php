<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>The BookPlace</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div id="wrapper">
<div class="wrapper-holder">
<header>
<h1>THE BOOKPLACE</h1><br></header>
<nav id="nav">
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="store.php">Book List</a></li>
</ul>   
</nav>
        <main>
        <table>
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
            <?php

                require('mysqli_connect.php');
                
                $query = "SELECT * FROM bookinventory";
                $result = @mysqli_query($dbc, $query);
                $num = @mysqli_num_rows($result);
                if($num>0){
                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        echo "<tr><td>{$row['BookID']}</td>
		                          <td><a style='text-decoration:none' href='checkout.php?name={$row['BookName']}'>{$row['BookName']}</a></td>
		                          <td>{$row['Quantity']}</td></tr>";
                    }
                }
            ?>
            </tbody>
        </table>
        </main>
       <footer id="footer">
<div class="footer-content">
<ul class="left_side">
<li>
    <p>The BookPlace<br>
        8945 Bramalea Road <br>
        Brampton, ON, Canada</p>
    <p>Tel. (421) 524 534<br></p>
</li></ul>
<ul class="right_side">
<li>
<div class="social">
<a href="#" class="fb">Facebook</a>
<a href="#" class="tw">Twitter</a></div>
<div class="social">
<a href="#" class="pn">Pinterest</a>
<a href="#" class="gl">Google+</a></div></li></ul>
<div class="clear"></div>
<h5 class="copy">TheBookPlace &copy; 2021</h5>
</div>
        </footer>
    </div>   
    </div>
    </body>
</html>