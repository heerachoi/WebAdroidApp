<?php

    //Get values pass from form register.html
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    
    if(!empty($firstname) || !empty($lastname) || !empty($username)|| !empty($password)|| !empty($gender)) {
        $host ="localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "users";

        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if (mysqli_connect_error()) {
            die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
            $SELECT = "SELECT username From register Where username = ? Limit 1";
            $INSERT = "INSERT Into register (firstname, lastname, username, password, gender) values(?, ?, ?, ?, ?)";

            //Prepare statement
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if ($rnum==0) {
                $stmt->close();

                $stmt=$conn->prepare($INSERT);
                $stmt->bind_param("sssis", $firstname, $lastname, $username, $password, $gender);
                $stmt->execute();
                echo "New recod inserted successfully";
            } else {
                echo "Someone already register using this username";
            }
            $stmt->close();
            //close database connection
            $conn->close();
        }
    } else {
        echo "All field are requred";
        die();
    }
?>