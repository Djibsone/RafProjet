<?php
//session_start();
// if(isset($_SESSION['error'])){
//     echo "
//     <div class='alert alert-danger alert-dismissible'>
//         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
//         <h4><i class='icon fa fa-warning'></i> Error!</h4>
//         ".$_SESSION['error']."
//     </div>
//     ";
//     unset($_SESSION['error']);
// }
// if(isset($_SESSION['success'])){
//     echo "
//     <div class='alert alert-success alert-dismissible'>
//         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
//         <h4><i class='icon fa fa-check'></i> Success!</h4>
//         ".$_SESSION['success']."
//     </div>
//     ";
//     unset($_SESSION['success']);
// }


if (isset($_SESSION['success'])): ?>
    <div class="msg alert-dismissible'">
    <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
        ?>
    </div>
<?php endif ?>
<?php if (isset($_SESSION['error'])): ?>
    <div class="err">
        <?php 
            echo $_SESSION['error']; 
            unset($_SESSION['error']);
        ?>
    </div>
<?php endif ?>