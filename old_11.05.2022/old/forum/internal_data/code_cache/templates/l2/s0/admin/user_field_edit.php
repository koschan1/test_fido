<?php
// FROM HASH: 1b96fb1a84ad330de40c8610f4cbcb7f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = $__vars;
	$__compilerTemp1['extraOptions'] = $__templater->preEscaped('
		' . $__templater->callMacro('base_custom_field_macros', 'common_options', array(
		'field' => $__vars['field'],
		'supportsUserEditable' => true,
		'supportsEditableOnce' => true,
		'supportsModeratorEditable' => true,
	), $__vars) . '

		' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'show_registration',
		'selected' => $__vars['field']['show_registration'],
		'label' => 'Показывать во время регистрации',
		'hint' => 'Обязательные поля всегда показываются во время регистрации.',
		'_type' => 'option',
	),
	array(
		'name' => 'viewable_profile',
		'selected' => $__vars['field']['viewable_profile'],
		'label' => 'Видимо на страницах профиля',
		'hint' => 'Это не относится к полям, отображаемым на странице настроек.',
		'_type' => 'option',
	),
	array(
		'name' => 'viewable_message',
		'selected' => $__vars['field']['viewable_message'],
		'label' => 'Видимо в блоке информации о пользователе в сообщениях',
		'hint' => 'Поле будет отображаться рядом с сообщением автора, только если включена опция "Дополнительные поля"  в группе настроек стиля "Элементы сообщений" в группе "Сообщения".',
		'_type' => 'option',
	)), array(
	)) . '
	');
	$__finalCompiled .= $__templater->includeTemplate('base_custom_field_edit', $__compilerTemp1);
	return $__finalCompiled;
}
);