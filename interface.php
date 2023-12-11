<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface</title>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/cars.js" type="text/javascript"></script>

    
    <link rel="stylesheet" href="C:\xampp\htdocs\Kocsik\fontawesome-free-6.5.1-web" type="text/css">
    <link rel="stylesheet" href="cars/cars.css" type="text/css">

</head>
<body>
    <nav>
        <a href="index.php"><i class="fa fa-home" title="Kezdőlap"></i></a>
        <a href="interface.php"><button>Gyártó</button></a>
        <a href="models.php"><button>Modellek</button></a>
    </nav>
    <h1>Gyártók</h1>
    <?php
        require_once 'DBMaker.php';
        $carMaker = new DBMAker();
        $abc = $carMaker->getAbc();
        //var_dump($abc);
        //return;
        echo "<div style='display: flex'>";
        foreach ($abc as $char) {
            echo "
                <form method='post' action='interface.php'>
                    <input type='hidden' name='abc' value='{$char['abc']}'>
                    <button type='submit'>{$char['abc']}</button>&nbsp;
                </form>
                ";
        }
        echo "</div><br>";
       
        if(isset($_POST['abc'])) {
            $abc = $_POST['abc'];
            $all = $carMaker->getByFirstLetter($abc);
            echo "<table align=center width=400 height=20>
                   <thead>

                   <tr>

                   <th>#</th>

                   <th>Gyártó</th>

                   <th>Művelet</th>

                   </tr>

                    <tr id='editor' style='display:none'>
                    <input type='hidden' id='id' name='id'> 
                    <th colspan=3>
                    <input type='search' id='edit-box' name='name'>
                    <button id='btn-save' title='Ment'>
                        <i class='fa fa-save'></i>
                    </button>
                    <button id='btn-cancel' title='Mégse'>
                        <i class='fa fa-cancel'></i>
                    </button>
                    </th>                   
                    </tr>


                   <tr>
                   <td colspan=3><input type='search'>
                   <button>Keresés</button>
                   </tr>

                </thead>
                <tbody>";
                foreach($all as $makers){
                    echo"<tr><td>{$makers['id']}</td><td>{$makers['name']}</td><td>mod / del</td></tr>";
                }
                echo "</tbody>
                </table>";

        }

    ?>
    
</body>
</html>