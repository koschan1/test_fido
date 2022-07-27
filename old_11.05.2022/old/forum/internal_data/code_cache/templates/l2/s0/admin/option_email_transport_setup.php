<?php
// FROM HASH: 21021be04e3d75df81cd4606c5a9fb96
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Настройка системы отправки электронной почты');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	$__compilerTemp2 = '';
	if ($__vars['option']['option_value']['smtpHost']) {
		$__compilerTemp2 .= '
							<li>' . $__templater->escape($__vars['option']['option_value']['smtpHost']) . ':' . $__templater->escape($__vars['option']['option_value']['smtpPort']) . '</li>
						';
	}
	$__compilerTemp3 = '';
	if ($__vars['option']['option_value']['smtpLoginUsername']) {
		$__compilerTemp3 .= '
							<li>' . $__templater->escape($__vars['option']['option_value']['smtpLoginUsername']) . '</li>
						';
	}
	$__compilerTemp4 = '';
	if ($__vars['option']['option_value']['oauth'] AND ($__vars['option']['option_value']['oauth']['provider'] == 'Google')) {
		$__compilerTemp4 .= '
							<li>' . 'Google OAuth' . '</li>
						';
	}
	$__vars['unchangedHint'] = $__templater->preEscaped('
					<ul class="listInline listInline--bullet listInline--selfInline">
						<li>' . (($__vars['option']['option_value']['emailTransport'] == 'sendmail') ? 'Встроенная почтовая система PHP' : $__templater->filter($__vars['option']['option_value']['emailTransport'], array(array('to_upper', array()),), true)) . '</li>
						' . $__compilerTemp2 . '
						' . $__compilerTemp3 . '
						' . $__compilerTemp4 . '
					</ul>
				');
	$__compilerTemp1[] = array(
		'value' => 'unchanged',
		'label' => 'Не изменять',
		'hint' => $__templater->escape($__vars['unchangedHint']),
		'_type' => 'option',
	);
	$__compilerTemp1[] = array(
		'value' => 'sendmail',
		'label' => 'Встроенная почтовая система PHP',
		'_type' => 'option',
	);
	$__compilerTemp1[] = array(
		'value' => 'smtp',
		'label' => 'SMTP',
		'_type' => 'option',
	);
	$__compilerTemp1[] = array(
		'value' => 'google',
		'label' => 'Google OAuth',
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRadioRow(array(
		'name' => 'new_type',
		'value' => 'unchanged',
	), $__compilerTemp1, array(
		'label' => $__templater->escape($__vars['option']['title']),
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Продолжить',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('options/email-transport-setup', $__vars['option'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);