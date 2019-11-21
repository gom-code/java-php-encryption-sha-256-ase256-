import javax.crypto.BadPaddingException;

import javax.crypto.IllegalBlockSizeException;
import javax.crypto.NoSuchPaddingException;

import java.security.InvalidAlgorithmParameterException;
import java.security.InvalidKeyException;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;

/**
 * 암호화 테스트 코드
 */
public class encryption {
    public static final String plain_text = "안녕하세요 HelloWorld";
    public static final String secret_key = "fakecodingsecretfakecodingsecret";
    public static void main(String[] args) {
    	// ase-256
        try {
            String encrypt_text = AES256Util.aes_encode(plain_text, secret_key);
            String decrypt_text = AES256Util.aes_decode(encrypt_text, secret_key);
            System.out.println(encrypt_text);
            System.out.println(decrypt_text);
      
        } catch (NoSuchAlgorithmException | NoSuchPaddingException | InvalidKeyException | InvalidAlgorithmParameterException | IllegalBlockSizeException | BadPaddingException e) {
            e.printStackTrace();
        }
        
        // sha-256
        String encryptStr ="abcd";
        String sha = "";
        try {
        	MessageDigest sh = MessageDigest.getInstance("SHA-256");
        	sh.update(encryptStr.getBytes());
        	byte byteData[] = sh.digest();
        	StringBuffer sb = new StringBuffer();
        	for(int i=0;i<byteData.length;i++){
        	sb.append(Integer.toString((byteData[i]&0xff)+0x100,16).substring(1));

        }
        	sha = sb.toString();
        	System.out.println(sha);
        } catch (NoSuchAlgorithmException e) {
        	e.printStackTrace();
        	sha = null;
        }
       
    }
    // sha-256 php
    /*
    	$orig_pw = "abcd";
		$salt = 5f8f041b75042e56;
		$password = hash('sha256', $orig_pw . $salt);
     */
}


