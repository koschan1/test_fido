<?php
// FROM HASH: d1375bf7b7ad2344e0de6ad1eeff6b9e
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
		'explain' => 'ID клиента (client ID), который связан с Вашим <a href="https://portal.azure.com/#blade/Microsoft_AAD_RegisteredApps/ApplicationsListBlade" target="_blank">приложением Microsoft Azure</a> для этого домена.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[client_secret]',
		'value' => $__vars['options']['client_secret'],
	), array(
		'label' => 'Секретная фраза (Client secret)',
		'hint' => 'Обязательное поле',
		'explain' => 'Секретная фраза приложения Microsoft для этого домена.',
	));
	return $__finalCompiled;
}
);