<?php

// if ( !isset($_SESSION["email"])) {
//     echo "<script>alert('Vous devriez vous connecter...!'); window.location = '../'</script>";
// }
if (empty($_SESSION["email"])) {
    echo "<script>alert('Vous devriez vous connecter...!'); window.location = '../'</script>";
}