<?php
// FROM HASH: 68b928903aa32a1e4d430f409342f834
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[limit]',
		'value' => $__vars['options']['limit'],
		'min' => '0',
	), array(
		'label' => 'Максимальное количество записей',
		'explain' => 'Количество аватаров пользователей, отображаемых в этом виджете. Значение 0 (ноль) отключит лимит.',
	));
	return $__finalCompiled;
}
);