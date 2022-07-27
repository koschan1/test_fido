<?php
// FROM HASH: 7a9c5dfa99a3ef6f3c66064362e5c539
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Перестать получать уведомления по электронной почте');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['actions']) {
		$__compilerTemp1 .= '
			<div class="block-body">
				';
		$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['actions']);
		$__compilerTemp2[] = array(
			'value' => 'all',
			'label' => 'Перестать получать все уведомления по электронной почте о ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '',
			'_type' => 'option',
		);
		$__compilerTemp1 .= $__templater->formRadioRow(array(
			'name' => 'stop',
			'value' => ($__vars['defaultAction'] ?: 'all'),
		), $__compilerTemp2, array(
			'label' => 'Подтвердите действие',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'submit' => 'Перестать получать электронные письма',
		), array(
		)) . '
		';
	} else {
		$__compilerTemp1 .= '
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Вы уверены, что хотите отказаться от получения всех сообщений на электронную почту от ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '?' . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'submit' => 'Перестать получать электронные письма',
			'icon' => 'notificationsOff',
		), array(
			'rowtype' => 'simple',
		)) . '
			' . $__templater->formHiddenVal('stop', 'all', array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		' . $__compilerTemp1 . '
	</div>

	' . $__templater->formHiddenVal('c', $__vars['confirmKey'], array(
	)) . '
', array(
		'action' => $__templater->func('link', array('email-stop', $__vars['user'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);