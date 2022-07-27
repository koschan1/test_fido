<?php
// FROM HASH: 2aed4e9192474946e8c188a6bc1b5ed7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formTextBoxRow(array(
		'name' => 'options[app_id]',
		'value' => $__vars['options']['app_id'],
	), array(
		'label' => 'ID приложения',
		'hint' => 'Обязательное поле',
		'explain' => 'ID <a href="https://developers.facebook.com/apps" target="_blank"> приложения Facebook</a> для этого домена.',
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'options[app_secret]',
		'value' => $__vars['options']['app_secret'],
	), array(
		'label' => 'Секрет приложения',
		'hint' => 'Обязательное поле',
		'explain' => 'Секретная фраза приложения Facebook для этого домена.',
	));
	return $__finalCompiled;
}
);