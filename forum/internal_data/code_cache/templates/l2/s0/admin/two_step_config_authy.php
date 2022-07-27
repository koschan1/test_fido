<?php
// FROM HASH: b9cbeb95d125dfdc0490e207d3b7a8bc
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[authy_api_key]',
		'value' => $__vars['provider']['options']['authy_api_key'],
	), array(
		'label' => 'API-ключ Authy',
		'explain' => 'Для использования Authy Вам необходимо создать API-ключ в <a href="https://www.twilio.com/console" target="_blank">панели управления Twilio</a>.',
	));
	return $__finalCompiled;
}
);