<?php
// FROM HASH: 5209945d5cbee67fc77f04e97a743808
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтвердите действие');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['sanction']['Room']) {
		$__compilerTemp1 .= '
					' . $__templater->escape($__vars['sanction']['Room']['room_name']) . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Все комнаты' . '
				';
	}
	$__compilerTemp2 = '';
	if ($__vars['sanction']['sanction_end']) {
		$__compilerTemp2 .= '
					' . $__templater->func('date_dynamic', array($__vars['sanction']['sanction_end'], array(
		))) . '
				';
	} else {
		$__compilerTemp2 .= '
					' . 'Никогда' . '
				';
	}
	$__compilerTemp3 = '';
	if ($__vars['sanction']['sanction_reason']) {
		$__compilerTemp3 .= '
				' . $__templater->formRow('
					' . $__templater->escape($__vars['sanction']['sanction_reason']) . '
				', array(
			'label' => 'Причина наказания',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите, что Вы хотите, снять наказание со следующего пользователя' . $__vars['xf']['language']['label_separator'] . '
				<strong>' . $__templater->func('username_link', array($__vars['sanction']['User'], false, array(
	))) . '</strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
			' . $__templater->formRow('
				' . $__compilerTemp1 . '
			', array(
		'label' => 'Комната',
	)) . '
			' . $__templater->formRow($__templater->escape($__templater->method($__vars['sanction'], 'getTypePhrase', array())), array(
		'label' => 'Тип наказания',
	)) . '
			' . $__templater->formRow($__templater->func('date_dynamic', array($__vars['sanction']['sanction_start'], array(
	))), array(
		'label' => 'Наказание началось',
	)) . '
			' . $__templater->formRow('
				' . $__compilerTemp2 . '
			', array(
		'label' => 'Наказание заканчивается',
	)) . '
			' . $__templater->formRow($__templater->func('username_link', array($__vars['sanction']['Author'], false, array(
	))), array(
		'label' => 'Наказание за',
	)) . '
			' . $__compilerTemp3 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Снять наказание',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('chat/sanction/lift', $__vars['sanction'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);