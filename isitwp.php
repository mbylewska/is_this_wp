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
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }

        /* .container {
            margin: auto;
            text-align: center;

        } */

        .container {
            margin-top: 3rem;
            position: relative;
            text-align: center;
            /* border-radius: 20px; */
            padding: 50px;
            box-sizing: border-box;
            background: #E6EDF0;
            box-shadow: 14px 14px 20px #D9E4E8, -14px -14px 20px white;
        }

        h2 {
            color: black;
            font-size: 3rem;
            padding-bottom: 1rem;
        }

        input {
            padding: 0.5rem;
            border: none;
            /* box-shadow: inset 6px 6px 6px #D9E4E8, inset -6px -6px 6px white; */
        }

        .btn {
            /* box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white; */
            transition: 0.5s;
            background-color: #B3C9D1;
        }

        .btn:hover {
            background-color: #8CAEBA;

        }

        p {
            padding-top: 1rem;
        }

        .message {
            padding-top: 1rem;
            font-size: 2rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Is this website build in WordPress?</h2>

        <form name='website' method="POST">
            <label for="url">Put URL here: </label><input type="text" name="url" placeholder="https://mysite.com">
            <input class="btn" type="submit" value="Submit">

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

        <p class="message"><?php echo $message ?></p>

    </div>
</body>

</html>