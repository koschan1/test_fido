<?php
// FROM HASH: cf633db1b45026e34e73cbf2230fc693
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

';
	if (!$__templater->test($__templater->method($__vars['nodeTree'], 'getFlattened', array(0, )), 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = array(array(
			'value' => '0',
			'label' => $__vars['xf']['language']['parenthesis_open'] . 'Нет' . $__vars['xf']['language']['parenthesis_close'],
			'_type' => 'option',
		));
		$__compilerTemp2 = $__templater->method($__vars['nodeTree'], 'getFlattened', array(0, ));
		if ($__templater->isTraversable($__compilerTemp2)) {
			foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
				$__compilerTemp1[] = array(
					'value' => $__vars['treeEntry']['record']['node_id'],
					'disabled' => ($__vars['treeEntry']['record']['node_type_id'] != 'SearchForum'),
					'label' => $__templater->filter($__templater->func('repeat', array('&nbsp;&nbsp;', $__vars['treeEntry']['depth'], ), false), array(array('raw', array()),), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
					'_type' => 'option',
				);
			}
		}
		$__finalCompiled .= $__templater->formSelectRow(array(
			'name' => 'options[node_id]',
			'value' => $__vars['options']['node_id'],
		), $__compilerTemp1, array(
			'label' => 'Раздел поиска',
			'explain' => 'Будут отображаться темы из выбранного раздела поиска.',
		)) . '
';
	} else {
		$__finalCompiled .= '
	' . $__templater->formRow('
		<div class="block-rowMessage block-rowMessage--important">
			' . 'Узлы типа раздела поиска еще не добавлены. <a href="' . $__templater->func('link', array('search-forums/add', ), true) . '">Добавить</a>.' . '
		</div>
	', array(
			'label' => 'Раздел поиска',
			'rowtype' => 'button',
		)) . '
';
	}
	$__finalCompiled .= '

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
	),
	array(
		'value' => 'expanded',
		'label' => 'Расширенный',
		'hint' => 'Расширенный вид, отображаемый в виде списка первых сообщений.',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'name' => 'options[show_expanded_title]',
		'selected' => $__vars['options']['show_expanded_title'],
		'label' => '
				' . 'Отображение заголовка виджета над списком тем.' . '
			',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
		'label' => 'Стиль отображения',
	));
	return $__finalCompiled;
}
);