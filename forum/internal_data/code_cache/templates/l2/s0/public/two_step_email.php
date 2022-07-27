<?php
// FROM HASH: 75c9ba0a58622d79fed04d1cc4ddaceb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formInfoRow('На адрес <b>' . $__templater->escape($__vars['email']) . '</b> было отправлено электронное письмо с одноразовым кодом. Пожалуйста, введите этот код, чтобы продолжить.', array(
	)) . '

' . $__templater->formTextBoxRow(array(
		'name' => 'code',
		'autofocus' => 'autofocus',
		'inputmode' => 'numeric',
		'pattern' => '[0-9]*',
	), array(
		'label' => 'Код подтверждения адреса электронной почты',
	));
	return $__finalCompiled;
}
);