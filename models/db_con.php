<?php 
session_start();

//connexion à la db
try {
    $db = mysqli_connect('localhost', 'djibril', 'tamou', 'db_database');
} catch (\Throwable $th) {
    die('Connexion à la bd impossible!'.$th->getMessage());
}

	