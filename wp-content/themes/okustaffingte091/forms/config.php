<?php
defined('ACCESSIBLE') or exit('No direct script access allowed');
ini_set('display_errors', 'off');
error_reporting(E_ALL);
define('COMP_EMAIL', 'Okustaffingcounsulting@gmail.com'); // clients email

define('SMTP_ENCRYPTION', 'off'); // TLS, SSL or off
define('SMTP_PORT', 587); // SMPT port number 587 or default
define('COMP_NAME', 'OKU Staffing & Consulting LLC'); // company name
define('MAIL_TYPE', 2); // 1 - html, 2 - txt
define('MAIL_DOMAIN', 'www.okustaffingandconsultingllc.com'); // company domain
define('TEMPLATE_TEST', false); //if false = launched account , true = pages account

// Update it using a working google Site key
$recaptcha_sitekey = '6LfXe3cqAAAAAMCRRs3CpRaE7uLGoqIkFfftRPu6';
// Update it using a working google Privite key
$recaptcha_privite = '6LfXe3cqAAAAACz3raodlJggJQiVrvSerMtEkoRS';

// do not edit
$subject = COMP_NAME . " [" . $formname . "]";
$template = 'template';
$to_name = NULL;
$from_email = 'noreply@link2newsite.com';
$from_name = 'Message From Your Site';
$attachments = array();

// testing here
$testform = false;
if ($testform) {
	$to_email = array('forms@proweaverforms.com');
	$cc = '';
	$bcc = '';
} else {
	$to_email = array('Okustaffingcounsulting@gmail.com');
	$cc = '';
	$bcc = '';
}