<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;


class ApiService
{
    protected $baseUrl;
    protected $apiKey;
    protected $encryptionKey;

    public function __construct()
    {
        $this->baseUrl = config('app.BASE_URL');
        $this->apiKey = config('app.API_KEY');
        $this->encryptionKey = config('app.ENCRYPTION_KEY');
    }

    public function getCatalogue($queryParams = [])
    {
        $url = 'https://staging.meribachat.in/bap/catalogue';
        $apiKey = '41bdaa1ae961d9d1ac0d388efd6edd512905da4851f561f8f17ec2fb5b16920a';
        $encryptionKey = 'fdc3306287bfcb82378f3b7b36244c91';
        // $response = Http::withHeaders([
        //     'X-API-KEY' => $this->apiKey,
        // ])->get($this->baseUrl . '/catalogue', $queryParams);
        
        $response = Http::withHeaders([
            'X-API-KEY' => $apiKey,
        ])->get($url, $queryParams);
        
        

        if ($response->successful()) {
            // Decrypt the response
            $decryptedResponse = $this->decryptResponse($response->body(), $response->json('iv'));
            return json_decode($decryptedResponse);
        }

        return null; // or handle errors
    }

    protected function decryptResponse($encryptedData, $iv)
    {
        // Assuming the use of OpenSSL for decryption
        $iv = hex2bin($iv);
        $encryptedData = hex2bin($encryptedData); // Convert hex to binary

        // Decrypting the response
        $decryptedData = openssl_decrypt($encryptedData, 'AES-256-CBC', hex2bin($encryptionKey), OPENSSL_RAW_DATA, $iv);

        return $decryptedData;
    }
    
    
// protected function decryptResponse($encryptedData, $iv)
// {
//     // Log the input values for debugging
//     \Log::info('Raw IV:', ['iv' => $iv]);
//     \Log::info('Encrypted Data:', ['encryptedData' => $encryptedData]);

//     // Validate the IV (must be a valid 32-character hexadecimal string)
//     if (!is_string($iv) || !preg_match('/^[0-9A-Fa-f]{32}$/', $iv)) {
//         throw new \InvalidArgumentException('Invalid IV: Must be a valid 32-character hexadecimal string.');
//     }

//     // Validate the encrypted data (must be a valid hexadecimal string)
//     if (!is_string($encryptedData) || !preg_match('/^[0-9A-Fa-f]+$/', $encryptedData) || strlen($encryptedData) % 2 !== 0) {
//         throw new \InvalidArgumentException('Invalid Encrypted Data: Not a valid hexadecimal string.');
//     }

//     // Convert hex to binary
//     $ivBinary = hex2bin($iv);
//     $encryptedDataBinary = hex2bin($encryptedData);

//     // Define the encryption key (convert from hex to binary)
//     $encryptionKey = hex2bin('fdc3306287bfcb82378f3b7b36244c91');

//     // Decrypting the response
//     $decryptedData = openssl_decrypt($encryptedDataBinary, 'AES-256-CBC', $encryptionKey, OPENSSL_RAW_DATA, $ivBinary);

//     // Check if decryption was successful
//     if ($decryptedData === false) {
//         throw new \RuntimeException('Decryption failed.');
//     }

//     return $decryptedData;
// }




//  protected function decryptAES($encryptedData, $hexKey, $hexIV) {
//     // Convert hex to binary
//     $key = hex2bin($hexKey);
//     $iv = hex2bin($hexIV);

//     // Decode the base64 encoded string
//     $encryptedData = base64_decode($encryptedData);

//     // Initialize the decryption
//     $decrypted = openssl_decrypt($encryptedData, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

//     return $decrypted;
// }

// Example usage
// $hexKey = 'fdc3306287bfcb82378f3b7b36244c91';
// $hexIV = '95c7359518b5df62';
// $encryptedData = 'your_base64_encrypted_data_here';

// try {
//     $decryptedData = decryptAES($encryptedData, $hexKey, $hexIV);
//     echo $decryptedData;
// } catch (\Exception $e) {
//     echo 'Decryption failed: ' . $e->getMessage();
// }





}
