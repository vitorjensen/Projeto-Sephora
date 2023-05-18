<?php

$con = mysqli_connect("localhost", "root", "", "sephora");
/*$url = parse_url(getenv("dblocar_DATABASE_URL"));*/

if (mysqli_connect_errno()) {
    //echo "Falha ao se conectar ao MySQL:" . mysqli_connect_erro();
} else {
    mysqli_select_db($con, "sephora");
}

?>