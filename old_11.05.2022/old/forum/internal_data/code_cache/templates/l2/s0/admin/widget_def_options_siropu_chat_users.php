<?php
// FROM HASH: 31c45022d8d25d9149c783d9e2ce4bf2
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[search]',
		'value' => $__vars['options']['search'],
		'min' => '0',
	), array(
		'label' => 'Включить поиск',
		'explain' => 'Включить поиск, если есть больше чем Х результатов.',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[avatar]',
		'selected' => $__vars['options']['avatar'],
		'label' => 'Отображать аватар',
		'_type' => 'option',
	)), array(
		'explain' => 'Если включено, аватар пользователя будет отображаться перед именем пользователя.',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[grid]',
		'selected' => $__vars['options']['grid'],
		'label' => 'Включить режим сетки',
		'_type' => 'option',
	)), array(
		'explain' => 'Позволяет отображать только аватар пользователя в режиме сетки.',
	));
	return $__finalCompiled;
}
);