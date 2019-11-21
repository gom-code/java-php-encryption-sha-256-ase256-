<?php
    error_reporting(E_ALL);	// 모든 오류보기
    ini_set("display_errors", 1);
    
    $plain_text = '안녕하세요 HelloWorld';
$secret_key = 'fakecodingsecretfakecodingsecret';
function aes_encode($plain_text, $secret_key) {
    // iv 값은 16 바이트로 설정합니다.
    // $ivBytes = chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00);
    $ivBytes = chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0);
    // $ivBytes = chr(1).chr(2).chr(3).chr(4).chr(1).chr(2).chr(3).chr(4).chr(1).chr(2).chr(3).chr(4).chr(1).chr(2).chr(3).chr(4);
    return base64_encode(openssl_encrypt($plain_text, "AES-256-CBC", $secret_key, true, $ivBytes));
}
function aes_decode($encrypt_text, $secret_key) {
    // iv 값은 16 바이트로 설정합니다.
    // $ivBytes = chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00).chr(0x00);
    $ivBytes = chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0).chr(0);
    // $ivBytes = chr(1).chr(2).chr(3).chr(4).chr(1).chr(2).chr(3).chr(4).chr(1).chr(2).chr(3).chr(4).chr(1).chr(2).chr(3).chr(4);
    return openssl_decrypt(base64_decode($encrypt_text), "AES-256-CBC", $secret_key, true, $ivBytes);
}
$encrypt_text = aes_encode($plain_text, $secret_key);
$decrypt_text = aes_decode($encrypt_text, $secret_key);
echo "encrypt_text = ".$encrypt_text;
echo '<br>';
echo "decrypt_text = ".$decrypt_text;
echo '<br>';
echo "sha-256-> " .hash("sha256", "abcd");
echo '<br>';
echo "(java)sha-256-> ".'88d4266fd4e6338d13b845fcf289579d209c897823b9217da3e161936f031589';
?>