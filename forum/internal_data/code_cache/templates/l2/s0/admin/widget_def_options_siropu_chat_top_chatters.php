<?php
// FROM HASH: 8103c24a61825c44ea49404914c221d1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[limit]',
		'value' => ($__vars['options']['limit'] ? $__vars['options']['limit'] : 5),
		'min' => '3',
	), array(
		'label' => 'Лимит пользователей в топе',
		'explain' => 'Укажите максимальное количество пользователей, которые будут отображаться в этом виджете.',
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