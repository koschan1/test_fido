<?php
// FROM HASH: d3affddd15f03625550e7ce062ec95a8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Управление пользователями с повышениями');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Учитывать все' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp1 = $__templater->mergeChoiceOptions($__compilerTemp1, $__vars['userGroupPromotions']);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Поиск истории повышений' . '</h2>
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'ac' => 'single',
	), array(
		'hint' => 'Поле можно оставить пустым.',
		'label' => 'Имя пользователя',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'promotion_id',
	), $__compilerTemp1, array(
		'label' => 'Повышение',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'search',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('user-group-promotions/history', ), false),
		'class' => 'block',
	)) . '

';
	$__compilerTemp2 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Учитывать все' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->mergeChoiceOptions($__compilerTemp2, $__vars['userGroupPromotions']);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<h2 class="block-header">' . 'Ручное повышение пользователя' . '</h2>
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'ac' => 'single',
	), array(
		'label' => 'Имя пользователя',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'promotion_id',
	), $__compilerTemp2, array(
		'label' => 'Повышение',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'action',
	), array(array(
		'value' => 'promote',
		'selected' => true,
		'label' => 'Повысить этого пользователя',
		'_type' => 'option',
	),
	array(
		'value' => 'demote',
		'label' => 'Не допускать этого пользователя к автоматическому получению данного повышения',
		'_type' => 'option',
	)), array(
		'label' => 'Действие',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('user-group-promotions/manual', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);