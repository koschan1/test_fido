<?php
// FROM HASH: 498e7853c3a6e5a071e6942d3dba8ef4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[client_id]',
		'value' => $__vars['options']['client_id'],
	), array(
		'label' => 'ID клиента (Client ID)',
		'hint' => 'Обязательное поле',
		'explain' => 'ID клиента (client ID), который связан с Вашим <a href="https://developer.yahoo.com/apps" target="_blank">приложением Yahoo</a> для этого домена.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[client_secret]',
		'value' => $__vars['options']['client_secret'],
	), array(
		'label' => 'Секретная фраза (Client secret)',
		'hint' => 'Обязательное поле',
		'explain' => 'Секретная фраза приложения Yahoo для этого домена.',
	));
	return $__finalCompiled;
}
);