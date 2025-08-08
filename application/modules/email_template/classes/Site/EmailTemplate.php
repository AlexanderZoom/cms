<?php defined('SYSPATH') OR die('No direct script access.');
class Site_EmailTemplate {
	public static function send(Model_Site_EmailTemplate $met, $params){
		$mail = new Util_PHPMailer();
		$mail->CharSet = 'UTF-8';
		//Set who the message is to be sent from
		$mail->setFrom($params['%sender%'], $params['%sender%']);
		//Set who the message is to be sent to
		$mail->addAddress($params['%receiver%'], $params['%receiver%']);
		//Set the subject line
		$mail->Subject = strtr($met->title, $params);
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML(strtr($met->text, $params));
		
		
		//send the message, check for errors
		if (!$mail->send()) {
			throw new Site_Exception("Mailer Error: " .$mail->ErrorInfo);
		} else {
			return true;
		}
	}
	
	public static function initParams($params){
		
		$purl = parse_url(Model_Setting::get('site.main.url'));
		$defaultParams = array(
			'%sitename%' => Model_Setting::get('site.main.name'),
			'%sitedomain%' => $purl['host'],
			'%siteurl%' => Model_Setting::get('site.main.url'),
			'%username%' => '',
			'%sender%' => 'support@'.$purl['host'],
			'%receiver%' => Model_Setting::get('site.main.feedback_email'),
			'%login%' => '',
			'%password%' => '',
			'%verification_url%' => '',
			'%current_date%' => date(Model_Setting::get('site.main.format_date'),time()),
			'%current_time%' => date(Model_Setting::get('site.main.format_time'),time()),	
		);
		
		$params = array_merge($defaultParams, $params);
		
		return $params;
	}
}