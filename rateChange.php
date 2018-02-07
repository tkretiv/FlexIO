  <?php 
  class CurlRequest {
    public $sURL = "https://api.fixer.io/latest";

    public function requestExec($sURL) {
       $ch = curl_init(); 
   // rate % = ((v2-v1)/v1)*100
   curl_setopt_array($ch, array(
    CURLOPT_URL => $sURL,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      "Content-Type: application/json"
    ),
  ));

  //Execute the request.
  $data = curl_exec($ch);

  if ($data === FALSE) {  
      echo "cURL Error: " . curl_error($ch);  
      return false;  
  } 
  $result=json_decode($data, true);
  curl_close($ch); 
  return $result;
    
  } 
  }

  if ($argv[1]) {
  $dDate = date("Y/m/d", strtotime($argv[1]));
    $sURL = 'https://api.fixer.io/'.date_format($dDate,"Y-m-d");
  }
  else {
    $dDate = date("Y/m/d");
    $sURL = 'https://api.fixer.io/latest';
  }
   print $dDate;
    print("\n");
    $cRequest = new CurlRequest();
    $data = $cRequest->requestExec($sURL);
    if (!$data) {
      print "Error !!!";
    }
  $rates = $data["rates"];
  //https://api.fixer.io/2000-01-03

  arsort($rates);
  print "\n-----RATES: ----\n";
  print "\xDA-----\xC2---------\xBF\n";
   foreach($rates as $currency => $val) {
      print "\xC3";
  print "-----";
  print "\xC5";
  print "---------";
  print "\xB4";
  print("\n");
  print "\xB3";
      printf ("%'. 5s",$currency);
  print "\xB3";
      printf("%'. 9g", $val);
  print "\xB3";
      print("\n");
      
  }
   ?>
