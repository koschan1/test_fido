<?php
// FROM HASH: 151e038c0569cbf64d7d956306cddeb2
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__vars['newUnreadStatus']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Отметить оповещение как прочитанное');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Отметить оповещение как непрочитанное');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['newUnreadStatus']) {
		$__compilerTemp1 .= '
					' . 'Пожалуйста, подтвердите, что Вы хотите отметить это оповещение прочитанным.' . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Пожалуйста, подтвердите, что Вы хотите отметить это оповещение непрочитанным.' . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . $__compilerTemp1 . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => ((!$__vars['newUnreadStatus']) ? 'Отметить прочитанным' : 'Отметить как непрочитанное'),
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>

	' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
	' . $__templater->formHiddenVal('unread', ($__vars['newUnreadStatus'] ? 1 : 0), array(
	)) . '
', array(
		'action' => $__templater->func('link', array('account/alert-toggle', null, array('alert_id' => $__vars['alert']['alert_id'], ), ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);