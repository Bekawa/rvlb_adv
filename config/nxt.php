<?php
function encrypt($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    $encrypted = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decrypt($encryptedData, $key) {
    $data = base64_decode($encryptedData);
    $parts = explode('::', $data);
    $decrypted = openssl_decrypt($parts[0], 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $parts[1]);
    return $decrypted;
}

$encryptionKey = '016c09367c6d74f8f40bbb92fe0e5a40268cae3f6238d684df34f207ff9139cb'; // Replace with your encryption key

// Database configuration
$hostEncrypted = encrypt('localhost', $encryptionKey);
$dbUserEncrypted = encrypt('root', $encryptionKey);
$dbPasswordEncrypted = encrypt('', $encryptionKey);
$dbNameEncrypted = encrypt('rvlb', $encryptionKey);

echo $hostEncrypted;
echo "<br>";
echo $dbUserEncrypted;
echo "<br>";
echo $dbPasswordEncrypted;
echo "<br>";
echo $dbNameEncrypted;
echo "<br>";

/*

// Decrypt the encrypted values for use
$host = decrypt($hostEncrypted, $encryptionKey);
$dbUser = decrypt($dbUserEncrypted, $encryptionKey);
$dbPassword = decrypt($dbPasswordEncrypted, $encryptionKey);
$dbName = decrypt($dbNameEncrypted, $encryptionKey);

// Use the decrypted values in your database connection
$connect = new mysqli($host, $dbUser, $dbPassword, $dbName);

// Check for connection errors
if ($connect->connect_error) {
    die("Could not connect to the database: " . $connect->connect_error);
}

// Your code logic goes here

// Close the database connection when done
$connect->close();

*/
?>