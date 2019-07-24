# kampil-client
Kampil PHP client library

##	Installation
`composer require mbah-dhaim/kampil-client`

##	Usage
1.	Instantiate \CSI\Kampil\Client\ClientProcessor  
   ```php
   $processor = \CSI\Kampil\Client\ClientProcessor::of();
   ```
2.	Setup your configuration  
   ```php
   $processor->getSetting()->setApiUrl(KAMPIL-API-URL)->setIssuerSecret(YOUR-SECRET-KEY)->setIssuerCode(YOUR-CODE)->setIssuerApiKey(YOUR-API-KEY);
   ```
3.	Create payload, send then parse response from server
   ```php
   $data = new \CSI\Kampil\Client\Request\BaseRequest();
   $trackingNumber = 123456;
   $requestPayload = $processor->initRequest($trackingNumber)->withData($data)->buildPayload();
   $responsePayload = $processor->send($requestPayload);
   $response = $processor->parsePayload($responsePayload);   
   ```

###	Payloads
-	Create Virtual Account  
   ```php
   $data = new \CSI\Kampil\Client\Request\CreateVARequest();
   // required fields
   $data->vaNo = VA-NUMBER;
   $data->custName = CUSTOMER-NAME;
   ```