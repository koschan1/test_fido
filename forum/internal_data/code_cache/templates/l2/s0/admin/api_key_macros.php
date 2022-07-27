<?php
// FROM HASH: ea312e6cde043da877aaacd0ac7044a2
return array(
'macros' => array('key_type' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'apiKey' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__vars['apiKey']['key_type'] == 'super') {
		$__finalCompiled .= '
		' . 'Ключ суперпользователя' . '
	';
	} else if ($__vars['apiKey']['key_type'] == 'user') {
		$__finalCompiled .= '
		' . 'Ключ пользователя' . ':
		' . $__templater->func('username_link', array($__vars['apiKey']['User'], false, array(
			'href' => '',
			'defaultname' => 'Удалённый пользователь',
		))) . '
	';
	} else {
		$__finalCompiled .= '
		' . 'Ключ гостя' . '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'key_type_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'apiKey' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formRow('
		' . $__templater->callMacro(null, 'key_type', array(
		'apiKey' => $__vars['apiKey'],
	), $__vars) . '
	', array(
		'label' => 'Тип ключа',
		'explain' => 'Это невозможно изменить после создания. Для изменения потребуется создать новый API-ключ.',
	)) . '
';
	return $__finalCompiled;
}
),
'copy_key_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'apiKey' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formRow('
		' . $__templater->callMacro(null, 'copy_key', array(
		'apiKey' => $__vars['apiKey'],
	), $__vars) . '

		<div class="formRow-explain">
			' . $__templater->callMacro(null, 'key_usage', array(
		'apiKey' => $__vars['apiKey'],
	), $__vars) . '
		</div>
	', array(
		'label' => 'API-ключ',
		'rowtype' => 'button',
	)) . '
';
	return $__finalCompiled;
}
),
'copy_key' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'apiKey' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<code class="js-copyTarget">' . $__templater->escape($__vars['apiKey']['api_key']) . '</code>
	' . $__templater->button('', array(
		'icon' => 'copy',
		'data-xf-init' => 'copy-to-clipboard',
		'data-copy-target' => '.js-copyTarget',
		'data-success' => 'API-ключ скопирован в буфер обмена.',
		'class' => 'button--link is-hidden',
	), '', array(
	)) . '
';
	return $__finalCompiled;
}
),
'key_usage' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'apiKey' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . 'Этот ключ должен предоставляться в запросах к API с помощью заголовка XF-Api-Key.' . '

	';
	if ($__vars['apiKey']['key_type'] == 'super') {
		$__finalCompiled .= '
		' . 'Так как это ключ суперпользователя, ID пользователя, от имени которого будет сделан запрос, должен быть включён в запрос с помощью заголовка <code>XF-Api-User</code>.' . '
	';
	}
	$__finalCompiled .= '
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

';
	return $__finalCompiled;
}
);