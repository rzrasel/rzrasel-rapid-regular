<?php
$ytEncryption = new YtEncryption();
$encryptedData = $ytEncryption->getEncryptedData("MNT News Network");
echo "Encrypted Data: $encryptedData";
echo "\n";
//echo "<br />";

$decryptedData = $ytEncryption->getDecryptedData($encryptedData);
echo "Decrypted Data: $decryptedData";
echo "\n";
//echo "<br />";

$encryptedData = "VGs5VklVOW1lSFFoVDJaMWVIQnpNV3c9";
$decryptedData = $ytEncryption->getDecryptedData($encryptedData);
echo "Decrypted Data: $decryptedData";
echo "\n";
//echo "<br />";
?>

<?php
class YtEncryption {
    
    public function getEncryptedData($strData) {
        //$base64Encode = base64_encode($strData);
        /*$chars = str_split($base64Encode);
        foreach ($chars as $char) {
            echo $char;
            echo "<br>";
        }*/
        $strLength = strlen($strData);
        $randValue = $this->generateRandom(1, 9);
        $resultValue = "";
        //echo "Random Value $randValue";
        //echo "\n";
        //echo "<br />";
        for ($index = 0; $index < $strLength; $index++) {
            //echo $base64Encode[$index];
            //echo "\n";
            //echo "<br />";
            $asciiValue = ord($strData[$index]);
            $asciiValue = $asciiValue + $randValue;
            $characterValue = chr($asciiValue);
            if($index >= $strLength - 1) {
                $resultValue .= $randValue;
            }
            $resultValue .= $characterValue;
            //echo $characterValu;
            //echo "\n";
            //echo "<br />";
        }
        return rtrim(base64_encode(base64_encode($resultValue)), "=");
    }
    
    public function getDecryptedData($strData) {
        $strData = base64_decode(base64_decode($strData));
        $randValue = substr($strData, -2, 1);
        $tmpStrLength = strlen($strData) - 2;
        //$strData = substr_replace($strData, "", $tmpStrLength, 2);
        $strData = str_replace(substr($strData, $tmpStrLength, 1), '', $strData);
        $strLength = strlen($strData);
        $resultValue = "";
        for ($index = 0; $index < $strLength; $index++) {
            $asciiValue = ord($strData[$index]);
            $asciiValue = $asciiValue - $randValue;
            $characterValue = chr($asciiValue);
            $resultValue .= $characterValue;
        }
        //return base64_decode($resultValue);
        return $resultValue;
    }
    
    private function generateRandom($min = 1, $max = 10) {
        if (function_exists("random_int")) {
            // More secure
            return random_int($min, $max);
        } else if (function_exists("mt_rand")) {
            // Faster
            return mt_rand($min, $max);
        } else {
            // Older
            return rand($min, $max);
        }
    }
}
?>

<?php
/*
$ytEncryption = new YtEncryption();
$encryptedData = $ytEncryption->getEncryptedData("76T-X9jao1s");
echo "Encrypted data:  $encryptedData";
echo "\n";
//echo "<br />";

$decryptedData = $ytEncryption->getDecryptedData($encryptedData);
echo "Decrypted data: $decryptedData";
echo "\n";
//echo "<br />";
*/
?>