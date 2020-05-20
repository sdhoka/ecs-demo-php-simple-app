<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Simple PHP App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <style>body {margin-top: 40px; background-color: #333;}</style>
        <link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="hero-unit">
                <h1>Green PHP App</h1>
                <h2>Welcome to the Demo</h2>
                <p>Your PHP application is now running on a container in Amazon ECS.</p>
                <p>The container is running PHP version <?php echo phpversion(); ?>.</p>
                <?php
                        $dbhost = $_SERVER['RDS_HOSTNAME'];
                        $dbport = $_SERVER['RDS_PORT'];
                        $dbname = $_SERVER['RDS_DB_NAME'];
                        $charset = 'utf8' ;

                        $dsn = "pgsql:host={$dbhost};port={$dbport};dbname={$dbname};options='-c client_encoding=utf8'";
                        $username = $_SERVER['RDS_USERNAME'];
                        $password = $_SERVER['RDS_PASSWORD'];

                        $conn = new PDO($dsn, $username, $password);

                        if(! $conn )
                        {
                          die('Could not connect to instance: ');
                        }
                        echo "Connected to POSTGRESQL Successfully! $dsn";
                ?>
                <?php
                        $myfile = fopen("/var/www/my-vol/date", "r") or die("");
                        echo fread($myfile,filesize("/var/www/my-vol/date"));
                        fclose($myfile);
                ?>

            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>

</html>
