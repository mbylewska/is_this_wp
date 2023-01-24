<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: whitesmoke;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            margin: auto;
            text-align: center;

        }

        h2 {
            color: black;
            font-size: 3rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Is this website build in WordPress?</h2>

        <form name='website' method="POST">
            <label for="url">Put URL here: </label><input type="text" name="url" placeholder="https://mysite.com">
            <input type="submit" value="Submit">

        </form>
        <?php

        $web_address = "";
        $http_address = "";

        foreach ($_POST as $name => $value) {
            if ('url' == $name) {
                $web_address = file_get_contents($value);
                //  return $http_address = htmlentities($value);

                echo "<p>" . htmlentities($value) . "</p>";
            }
        }
        $message = "";

        if (strpos($web_address, 'wp-content')) {
            $message = "This website is using WordPress";
        } else {
            $message =  "This website use different technology";
        }

        ?>

        <p><?php echo $message ?></p>

    </div>
</body>

</html>