<?php
// FROM HASH: f3c5f624eebb819eba98f5af1f93e285
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formNumberBoxRow(array(
		'name' => 'options[limit]',
		'value' => $__vars['options']['limit'],
		'min' => '1',
	), array(
		'label' => 'Максимальное количество записей',
	)) . '

';
	$__compilerTemp1 = $__templater->mergeChoiceOptions(array(), $__vars['memberStats']);
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'options[member_stat_key]',
		'value' => $__vars['options']['member_stat_key'],
	), $__compilerTemp1, array(
		'label' => 'Статистика пользователя для отображения',
	));
	return $__finalCompiled;
}
);