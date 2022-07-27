<?php
// FROM HASH: a7bf856494ff92c9b4899fd742284339
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
		'explain' => 'ID клиента (client ID), который связан с Вашим <a href="https://www.linkedin.com/developer/apps/" target="_blank">приложением Linkedin</a> для этого домена.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[client_secret]',
		'value' => $__vars['options']['client_secret'],
	), array(
		'label' => 'Секретная фраза (Client secret)',
		'hint' => 'Обязательное поле',
		'explain' => 'Секретная фраза приложения Linkedin для этого домена.',
	));
	return $__finalCompiled;
}
);