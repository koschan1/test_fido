<?php
// FROM HASH: d18f2262b8a173244232ed00935f698a
return array(
'macros' => array('step_users_config' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'config' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'step_config[users][merge_email]',
		'selected' => $__vars['config']['merge_email'],
		'label' => 'Автоматически объединять пользователей с одинаковыми адресами электронной почты',
		'_type' => 'option',
	),
	array(
		'name' => 'step_config[users][merge_name]',
		'selected' => $__vars['config']['merge_name'],
		'label' => 'Автоматически объединять пользователей с одинаковыми именами',
		'hint' => 'Обратите внимание, что имена, отличающиеся только акцентами, могут считаться одинаковыми.',
		'_type' => 'option',
	)), array(
		'label' => 'Пользователи',
	)) . '
';
	return $__finalCompiled;
}
),
'step_smilies_config' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'config' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formTextBoxRow(array(
		'name' => 'step_config[smilies][filename]',
		'value' => $__vars['config']['filename'],
		'placeholder' => $__vars['config']['filename'],
	), array(
		'label' => 'Имя XML-файла',
		'explain' => 'Смайлы из исходной системы не импортируются напрямую XenForo, но вся информация о них обрабатывается и добавляется в XML-файл, который можно импортировать с помощью <a href="' . $__templater->func('link', array('smilies/import', ), true) . '" target="_blank">Импорта смайлов</a>  позже.<br />
<br / >
XML-файл будет помещён в папку \'internal-data\' с указанным здесь именем.',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

';
	return $__finalCompiled;
}
);