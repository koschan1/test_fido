<?php
// FROM HASH: 63ffb2433950171006498c787743c842
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

' . $__templater->formRadioRow(array(
		'name' => 'options[style]',
		'value' => ($__vars['options']['style'] ?: 'simple'),
	), array(array(
		'value' => 'simple',
		'label' => 'Простой',
		'hint' => 'Простой вид, предназначен для узких пространств, таких как боковые панели.',
		'_type' => 'option',
	),
	array(
		'value' => 'full',
		'label' => 'Стандартный',
		'hint' => 'Полноразмерный вид, отображаемый в виде стандартного списка тем.',
		'_type' => 'option',
	)), array(
		'label' => 'Стиль отображения',
	)) . '

' . $__templater->formRadioRow(array(
		'name' => 'options[filter]',
		'value' => ($__vars['options']['filter'] ?: 'latest'),
	), array(array(
		'value' => 'latest',
		'label' => 'Последнее',
		'hint' => 'Список всех недавно созданных тем (по умолчанию для гостей).',
		'_type' => 'option',
	),
	array(
		'value' => 'unread',
		'label' => 'Непрочитанные',
		'hint' => 'Список тем с непрочитанными сообщениями.',
		'_type' => 'option',
	),
	array(
		'value' => 'watched',
		'label' => 'Отслеживаемые',
		'hint' => 'Список тем, отслеживаемых пользователем.',
		'_type' => 'option',
	)), array(
		'label' => 'Фильтровать',
	)) . '

';
	$__compilerTemp1 = array(array(
		'value' => '',
		'label' => 'Все разделы',
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__vars['nodeTree'], 'getFlattened', array(0, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['node_id'],
				'disabled' => ($__vars['treeEntry']['record']['node_type_id'] != 'Forum'),
				'label' => '
			' . $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['treeEntry']['depth'], ), false), array(array('raw', array()),), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']) . '
		',
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->formSelectRow(array(
		'name' => 'options[node_ids][]',
		'value' => ($__vars['options']['node_ids'] ?: ''),
		'multiple' => 'multiple',
		'size' => '7',
	), $__compilerTemp1, array(
		'label' => 'Ограничение разделов',
		'explain' => 'Отображать темы только из выбранных разделов.',
	));
	return $__finalCompiled;
}
);