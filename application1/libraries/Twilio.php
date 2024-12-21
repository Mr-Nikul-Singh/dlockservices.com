<?php
require_once APPPATH.'third_party/twilio/vendor/autoload.php'; // Include the Twilio PHP library

class Twilio{
    
    public function make_call($to, $from, $message){
        global $twilio;
        // Aapka Twilio Account SID aur Auth Token
        $accountSid = ACCOUNT_SID;
        $authToken = AUTH_TOKEN;

        $twilio = new Twilio\Rest\Client($accountSid, $authToken);
        try {
            // TwiML banao jo voice aur language specify kare
            $twiml = "<Response><Say voice='Polly.Kajal-Neural' language='hi-IN'>$message</Say></Response>";
    
            // Call create karo
            $call = $twilio->calls->create(
                $to, // Receiver's phone number
                $from, // Twilio phone number
                array(
                    "twiml" => $twiml
                )
            );
    
            echo "Call SID: " . $call->sid;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}