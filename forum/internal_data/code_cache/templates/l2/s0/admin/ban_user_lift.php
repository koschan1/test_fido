<?php
// FROM HASH: 6c34effb1a23aca93123283a2ebe3f3d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтвердите действие');
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
				' . $__templater->formRow('
					' . $__templater->escape($__vars['userBan']['user_reason']) . '
				', array(
			'label' => 'Причина блокировки',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите снятие блокировки со следующего пользователя' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('banning/users', $__vars['userBan'], ), true) . '">' . $__templater->escape($__vars['userBan']['User']['username']) . '</a></strong>
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
		'submit' => 'Снять',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('banning/users/lift', $__vars['userBan'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);