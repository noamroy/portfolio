<?php   //creating connection
    $dbhost = "182.50.133.173";
    $dbuser = "studDB21a";
    $dbpass = "stud21DB1!";
    $dbname = "studDB21a";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    //echo "connection to DB success";

    //testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Noam Roytman</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <main class="flex_container">
            <section class= "details">
                <div class="flex_container">
                    <img src="images/israeli flag.jpg" alt= "image" title="my image">
                    <h1>Noam Roytman</h1>
                    <div class="line"></div>
                    <h3>Software Engineer</h3>
                    <h2>CONTACT</h2>
                    <div class="line"></div>
                    <h5>phone: +972 52-1234321</h5>
                    <h5>mail: gregory@mail.com</h5>
                    <h5>git: https://github.com/noamroy</h5>
                    <h2>MOTO</h2>
                    <div class="line"></div>
                    <text>"Give man a fish and you feed him for a day. Teach a man to fish and you feed him for a lifetime"</text>  
                </div>
            </section>
            <section class="works">
                <div class="flex_container">
                    <h2>PROJECTS</h2>
                    <?php
                        $query = "select * from tbl_87_folio order by id";
                        $result = mysqli_query($connection, $query);
                        if(!$result){
                            die ("DB query failed");
                        }
                    ?>
                    <ul class="list-group list-group-flush">
                    <?php
                        while ($row = mysqli_fetch_assoc($result)){
                            $name = $row["name"];
                            if (!$name) $name = "ERROR";
                            $github = $row["github"];
                            if (!$github) $github = "ERROR";
                            echo '<a href="'.$github.'" target="_blank"><li class="list-group-item">'.$name.' link: '.$github.'</li></a>';
                        }
                    ?>
                    </ul>
                </div>
            </section>   
        </main>
        <footer>
        <a href="https://www.shenkar.ac.il/he/departments/engineering-software-department" target="_blank">
            <h6>תואר ראשון בהנדסת תוכנה בשנקר</h6>
        </a>
        </footer>
    </body>
</html>
<?php
    mysqli_close($connection);
?>