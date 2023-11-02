<?php
function encrypt($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decrypt($data, $key) {
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'AES-256-CBC', $key, 0, $iv);
}

$encryption_key = "016c09367c6d74f8f40bbb92fe0e5a40268cae3f6238d684df34f207ff9139cb"; // Replace with a strong encryption key
$encrypted_host = "TdwSsvh/7qkbZoB6h6VTPjo6Vgk7z+vITo9+Eav0ipa6PA=="; // Replace with the encrypted value of localhost
$encrypted_user = "Lf1YdFMZ6ojKN550z5+ytjo6vJ+RRTtYOXJqBTQSRtvl8g=="; // Replace with the encrypted value of database username
$encrypted_pass = "DuUavvBQeZdFRuk6F+IVJjo6JU6ePuP9bS4I9HeVvJCLyQ=="; // Replace with the encrypted value of database password
$encrypted_db = "4JuYVu37yyyV15h5huGxUjo6YkEFDJRszNViW9T7QzOuWw=="; // Replace with the encrypted value of database name

$host = decrypt($encrypted_host, $encryption_key);
$user = decrypt($encrypted_user, $encryption_key);
$pass = decrypt($encrypted_pass, $encryption_key);
$db = decrypt($encrypted_db, $encryption_key);

//echo "<br>". $host ."<br>". $user ."<br>". $pass ;

$connect = new mysqli($host, $user, $pass, $db);
if ($connect->connect_error) {
    die("Could not connect to the database: " . $connect->connect_error);
}
else {
    echo "Connection Successfull";
}
// Rest of your code...



?>