<?php
/**
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @copyright 2013 2amigOS! Consultation Group LLC
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
return array(
	'components' => array(
// 		change to suit your needs
		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=guests',
			'username' => 'guests',
			'password' => 'guests',
			'enableProfiling' => true,
			'enableParamLogging' => true,
			'charset' => 'utf8',
		),
		'mailer' => array(
			'class' => 'common.extensions.mailer.EMailer',
		),
	),
);