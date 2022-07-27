<?php
// FROM HASH: 0eb4ed50a5a57d07c825811e46e0ff8a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтвердите действие');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['entry']['User']) {
		$__compilerTemp1 .= '
					' . 'Пожалуйста, подтвердите восстановление данных и статуса следующего пользователя' . $__vars['xf']['language']['label_separator'] . '
					<strong><a href="' . $__templater->func('link', array('users/edit', $__vars['entry']['User'], ), true) . '">' . $__templater->escape($__vars['entry']['User']['username']) . '</a></strong>
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Пожалуйста, подтвердите, что Вы хотите восстановить данные следующего пользователя' . $__vars['xf']['language']['label_separator'] . '
					<strong>' . $__templater->escape($__vars['entry']['username']) . '</strong>
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
		'submit' => 'Восстановить',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('logs/spam-cleaner/restore', $__vars['entry'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);