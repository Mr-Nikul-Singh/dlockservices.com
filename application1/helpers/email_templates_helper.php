<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
function webhook_error_template($webhookUrl = 'Note found.', $type = null){
    // Email message (HTML)
    $message = '
    <html>
    <head>
        <title>Webhook Error</title>
    </head>
    <body>
        <h1>Webhook Error</h1>
        <p>The webhook URL you provided is not valid or inaccessible. Please check the google lead form webhook configuration.</p>
        <p>Webhook URL: <a href="' . $webhookUrl . '">' . $webhookUrl . '</a></p>
        <p>If you have any questions or need assistance, please contact our support team.</p>
        <p>Best regards,</p>
        <p>"'.bot_name().'"</p>
    </body>
    </html>
    ';
    return $message;
}

function new_lead_eamil_notification($leadName, $number, $email, $source, $reciver_name){
    $footer_text = '<hr><p style="font-size: 12px; color: #777;">This is an automated new lead notification reminder. If you believe you received this email in error, please disregard it.</p>';
    $message = "<html><body>";
    $message .= "<!DOCTYPE html>";
    $message .= "<html lang='en'>";
    $message .= "<head>";
    $message .= "<meta charset='UTF-8'>";
    $message .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    $message .= "<title>New Lead Notification</title>";
    $message .= "</head>";
    $message .= "<body style='font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;'>";
    $message .= "<div style='background-color: #ffffff; border-radius: 5px; padding: 20px;'>";
    $message .= "<h1 style='color: #333;'>New Lead Notification</h1>";
    $message .= "<p>Dear $reciver_name,</p>";
    $message .= "<p>A new lead has been received from ($source):</p>";
    $message .= "<p><strong>Lead Name:</strong> $leadName</p>";
    $message .= "<p><strong>Email:</strong> $email</p>";
    $message .= "<p><strong>Number:</strong> $number</p>";
    $message .= "<p>Please take action and follow up with the lead as soon as possible.</p>";
    $message .= "<p>Best regards,</p>";
    $message .= "<p>".bot_name()."</p>";
    $message .= $footer_text;
    $message .= "</div>";
    $message .= "</body>";
    $message .= "</html>";
    return $message;
}