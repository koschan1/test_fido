<?php
// FROM HASH: 45b86e18794d70f8389682ef1a55e563
return array(
'macros' => array('db_host' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => 'localhost',
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'host',
		'label' => 'Сервер MySQL',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_dbname' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'dbname',
		'label' => 'Имя базы данных MySQL',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_username' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'username',
		'label' => 'Имя пользователя MySQL',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_password' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'password',
		'label' => 'Пароль MySQL',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'autocomplete' => 'off',
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_port' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => '3306',
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'port',
		'label' => 'Порт MySQL',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_tablePrefix' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'tablePrefix',
		'label' => 'Префикс таблицы MySQL',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_charset' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'value' => null,
		'placeholder' => null,
		'explain' => 'Если в конфигурации импортируемой системы указана конкретная кодировка базы данных, то здесь следует указать эту кодировку.',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->callMacro(null, 'db_textbox', array(
		'name' => 'charset',
		'label' => 'Кодировка',
		'value' => $__vars['value'],
		'placeholder' => $__vars['placeholder'],
		'explain' => $__vars['explain'],
	), $__vars) . '
';
	return $__finalCompiled;
}
),
'db_textbox' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => '!',
		'label' => '!',
		'value' => null,
		'placeholder' => null,
		'autocomplete' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->formTextBoxRow(array(
		'name' => 'config[db][' . $__vars['name'] . ']',
		'value' => $__vars['value'],
		'autocomplete' => $__vars['autocomplete'],
		'placeholder' => $__vars['placeholder'],
	), array(
		'label' => $__templater->escape($__vars['label']),
		'explain' => $__templater->escape($__vars['explain']),
	)) . '
';
	return $__finalCompiled;
}
),
'language_charset' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'name' => 'charset',
		'label' => 'xfi_default_language_character_set',
		'value' => null,
		'placeholder' => null,
		'autocomplete' => null,
		'explain' => null,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	' . $__templater->formTextBoxRow(array(
		'name' => 'config[' . $__vars['name'] . ']',
		'value' => $__vars['value'],
		'autocomplete' => $__vars['autocomplete'],
		'placeholder' => $__vars['placeholder'],
	), array(
		'label' => $__templater->escape($__vars['label']),
		'explain' => $__templater->escape($__vars['explain']),
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

' . '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);