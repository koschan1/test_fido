<?php
// FROM HASH: 4aa95d07e02e9d59fdee7f6f59f48926
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
		'explain' => 'ID клиента (client ID), который связан с Вашим <a href="https://github.com/settings/developers" target="_blank">приложением GitHub</a> для этого домена.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[client_secret]',
		'value' => $__vars['options']['client_secret'],
	), array(
		'label' => 'Секретная фраза (Client secret)',
		'hint' => 'Обязательное поле',
		'explain' => 'Секретная фраза приложения GitHub для этого домена.',
	));
	return $__finalCompiled;
}
);