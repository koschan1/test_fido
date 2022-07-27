<?php
// FROM HASH: 2cc2e6d01d4d56f66cf08b8521b344a6
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
	)) . '

' . $__templater->formRadioRow(array(
		'name' => 'options[condition]',
		'value' => $__vars['options']['condition'],
	), array(array(
		'value' => 'last_post_date',
		'label' => 'Обновлённые с момента последнего email',
		'_type' => 'option',
	),
	array(
		'value' => 'post_date',
		'label' => 'Созданные с момента последнего email',
		'_type' => 'option',
	)), array(
		'label' => 'Включить темы',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'label' => 'Не менее X ответов',
		'selected' => $__vars['options']['min_replies'] !== null,
		'_dependent' => array($__templater->formNumberBox(array(
		'name' => 'options[min_replies]',
		'value' => ($__vars['options']['min_replies'] ?: 0),
		'min' => '0',
	))),
		'_type' => 'option',
	),
	array(
		'label' => 'Реакций не менее X',
		'selected' => $__vars['options']['min_reaction_score'] !== null,
		'_dependent' => array($__templater->formNumberBox(array(
		'name' => 'options[min_reaction_score]',
		'value' => ($__vars['options']['min_reaction_score'] ?: 0),
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Включать только темы с' . '...',
		'rowtype' => 'noColon',
	)) . '

';
	$__compilerTemp3 = $__templater->mergeChoiceOptions(array(), $__vars['sortOrders']);
	$__finalCompiled .= $__templater->formRow('

	<div class="inputPair">
		' . $__templater->formSelect(array(
		'name' => 'options[order]',
		'value' => $__vars['options']['order'],
	), $__compilerTemp3) . '
		' . $__templater->formSelect(array(
		'name' => 'options[direction]',
		'value' => $__vars['options']['direction'],
	), array(array(
		'value' => 'ASC',
		'label' => 'По возрастанию',
		'_type' => 'option',
	),
	array(
		'value' => 'DESC',
		'label' => 'По убыванию',
		'_type' => 'option',
	))) . '
	</div>
', array(
		'rowtype' => 'input',
		'label' => 'Сортировка',
	));
	return $__finalCompiled;
}
);