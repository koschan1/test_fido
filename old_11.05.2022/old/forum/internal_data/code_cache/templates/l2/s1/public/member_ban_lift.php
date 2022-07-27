<?php
// FROM HASH: f3c2400baac37d29cb7f9c1278f0e8ea
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтверждение снятия блокировки' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['user']['username']));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['userBan']['end_date']) {
		$__compilerTemp1 .= '
					' . $__templater->func('date', array($__vars['userBan']['end_date'], ), true) . '
				';
	} else {
		$__compilerTemp1 .= '
					' . 'Никогда' . '
				';
	}
	$__compilerTemp2 = '';
	if ($__vars['userBan']['user_reason']) {
		$__compilerTemp2 .= '
				' . $__templater->formRow($__templater->escape($__vars['userBan']['user_reason']), array(
			'label' => 'Причина блокировки',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите снятие блокировки со следующего пользователя' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('members/ban', $__vars['user'], ), true) . '">' . $__templater->escape($__vars['user']['username']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formRow($__templater->escape($__vars['userBan']['BanUser']['username']), array(
		'label' => 'Заблокировал(а)',
	)) . '

			' . $__templater->formRow($__templater->func('date', array($__vars['userBan']['ban_date'], ), true), array(
		'label' => 'Начало блокировки',
	)) . '

			' . $__templater->formRow('
				' . $__compilerTemp1 . '
			', array(
		'label' => 'Окончание блокировки',
	)) . '

			' . $__compilerTemp2 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Снять блокировку',
	), array(
	)) . '
	</div>

	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('members/ban/lift', $__vars['user'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);