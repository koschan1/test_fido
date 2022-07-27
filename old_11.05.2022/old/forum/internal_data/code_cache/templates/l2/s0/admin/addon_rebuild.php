<?php
// FROM HASH: 98b3b8fce2eb254af9a96e2c70aca057
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтвердите действие');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['errors']) {
		$__compilerTemp1 .= '
					' . 'Мы обнаружили некоторые ошибки при попытке перестроения мастер-данных следующих плагинов' . $__vars['xf']['language']['label_separator'] . '
				';
	} else if ($__vars['warnings']) {
		$__compilerTemp1 .= '
					' . 'Пожалуйста, ознакомьтесь с предупреждениями и подтвердите, что Вы хотите продолжить перестроение мастер-данных следующих плагинов' . $__vars['xf']['language']['label_separator'] . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Пожалуйста, подтвердите, что Вы хотите перестроить мастер-данные следующих плагинов' . $__vars['xf']['language']['label_separator'] . '
				';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . $__compilerTemp1 . '
				<strong>' . $__templater->escape($__vars['addOn']['title']) . ' ' . $__templater->escape($__vars['addOn']['version_string']) . '</strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>

		' . $__templater->callMacro('addon_action_macros', 'summary', array(
		'errors' => $__vars['errors'],
		'warnings' => $__vars['warnings'],
	), $__vars) . '

		' . $__templater->callMacro('addon_action_macros', 'action', array(
		'errors' => $__vars['errors'],
		'warnings' => $__vars['warnings'],
		'submit' => 'Перестроить',
	), $__vars) . '
	</div>

	' . $__templater->func('redirect_input', array(null, null, true)) . '

', array(
		'action' => $__templater->func('link', array('add-ons/rebuild', $__vars['addOn'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);