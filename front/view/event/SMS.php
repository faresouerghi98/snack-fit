<?php
/**
 *
 */
class SMS
{

  public static function send($from_number,$sms_text)
  {
    $key="1e36922a";
    $secret="yWs8iZL4bJCwxq7k";
    $to_number="21654855094";
    return self::cspd_send_nexmo_sms($key,$secret,$to_number,$from_number,$sms_text);
  }

  public static function cspd_send_nexmo_sms($key,$secret,$to_number,$from_number,$sms_text)
  {
    $data=[
            'api_key' => $key,
            'api_secret' => $secret,
            'to' => $to_number,
            'from' => $from_number,
            'text' => $sms_text
        ];
    $options = array(
      'http' => array(
        'method'  => 'POST',
        'content' => json_encode( $data ),
        'header'=>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
        )
    );
    $url="https://rest.nexmo.com/sms/json";

    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result );


    return $response;



  }
}

//var_dump(SMS::send("test","bla")) ;


?>
