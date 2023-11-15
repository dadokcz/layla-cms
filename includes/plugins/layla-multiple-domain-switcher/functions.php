<?php

// START / CUSTOMIZE GENERAL OPTIONS OF PLUGIN

global $settings;

if(isset($_POST['sitename']) && strpos($_SERVER['REQUEST_URI'], 'admin')){
	// die('x');
	// die($_POST['currency']);
	// die($_POST['invoice-prefix']);

	$fname = ROOT_ABSOLUTE_PATH."data/settings.csv";
	file_put_contents($fname, "domains-to-switch;".str_replace(' ', '', $_POST['domains-to-switch']).";\n", FILE_APPEND | LOCK_EX);
}



$settings['multiple-domain-switcher']['plugin-title'] = '{{Domains switcher}}';
$settings['multiple-domain-switcher'][0]['title'] = '{{Domains switcher}}';
$settings['multiple-domain-switcher'][0]['name'] = 'domains-to-switch';
$settings['multiple-domain-switcher'][0]['type'] = 'input-text';
$settings['multiple-domain-switcher'][0]['values'] = $domainstoswitch;
$settings['multiple-domain-switcher'][0]['selected'] = get_settings('domains-to-switch');

$addtosettings = $settings;
