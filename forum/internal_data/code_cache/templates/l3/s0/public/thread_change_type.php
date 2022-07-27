<?php
// FROM HASH: 55915d4100711268ef15e6db30c9c456
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Изменить тип темы' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('prefix', array('thread', $__vars['thread'], 'escaped', ), true) . $__templater->escape($__vars['thread']['title']));
	$__finalCompiled .= '
';
	$__templater->pageParams['pageH1'] = $__templater->preEscaped('Изменить тип темы' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->func('prefix', array('thread', $__vars['thread'], ), true) . $__templater->escape($__vars['thread']['title']));
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['thread'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['isTypeChange']) {
		$__compilerTemp1 .= '
				' . $__templater->formRow('
					' . $__templater->escape($__vars['newThreadTypeTitle']) . '
				', array(
			'label' => 'Новый тип темы',
		)) . '

				' . $__templater->filter($__templater->method($__vars['newThreadType'], 'renderExtraDataEdit', array($__vars['thread'], 'convert', 'full', )), array(array('raw', array()),), true) . '

				' . $__templater->formHiddenVal('new_thread_type_id', $__vars['newThreadTypeId'], array(
		)) . '
				' . $__templater->formHiddenVal('confirm', '1', array(
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				';
		$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['creatableThreadTypes']);
		$__compilerTemp1 .= $__templater->formRadioRow(array(
			'name' => 'new_thread_type_id',
			'value' => $__vars['currentThreadTypeId'],
		), $__compilerTemp2, array(
			'label' => 'Тип темы',
		)) . '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['newThreadTypeId']) {
		$__compilerTemp3 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Изменить тип',
		), array(
		)) . '
		';
	} else {
		$__compilerTemp3 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Продолжить' . $__vars['xf']['language']['ellipsis'],
		), array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				<div class="blockMessage blockMessage--warning">
					' . 'Изменение типа темы может привести к потере некоторых данных. Пожалуйста, убедитесь, что Вы выбрали правильные опции, прежде чем продолжить.' . '
				</div>
			', array(
	)) . '

			' . $__templater->formRow('
				' . $__templater->escape($__vars['currentThreadTypeTitle']) . '
			', array(
		'label' => 'Текущий тип темы',
	)) . '

			' . $__compilerTemp1 . '
		</div>

		' . $__compilerTemp3 . '
	</div>
', array(
		'action' => $__templater->func('link', array('threads/change-type', $__vars['thread'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);