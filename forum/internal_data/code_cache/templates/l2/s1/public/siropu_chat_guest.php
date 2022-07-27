<?php
// FROM HASH: 023b13f9a9a1802e2535ee3987dafb0a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Гость');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow($__templater->escape($__vars['guest']['nickname']), array(
		'label' => 'Гостевой ник',
	)) . '
			' . $__templater->formRow($__templater->func('date_dynamic', array($__vars['guest']['lastActivity'], array(
	))), array(
		'label' => 'Последняя активность',
	)) . '
			' . $__templater->formRow($__templater->escape($__vars['guest']['ip']), array(
		'label' => 'IP',
	)) . '
			' . $__templater->formRow('
				' . $__templater->formRadio(array(
		'name' => 'action',
		'value' => 'ban_ip',
	), array(array(
		'value' => 'ban_ip',
		'label' => 'Блокировка по IP',
		'_type' => 'option',
	),
	array(
		'value' => 'discourage_ip',
		'label' => 'Нежелательные IP-адреса',
		'_type' => 'option',
	))) . '
				<p>
					' . $__templater->formTextBox(array(
		'name' => 'reason',
		'placeholder' => 'Причина блокировки',
	)) . '
				</p>
			', array(
		'label' => 'Действие',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'submit',
		'class' => 'js-overlayClose',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('chat/guest', '', array('nickname' => $__vars['guest']['nickname'], ), ), false),
		'class' => 'block',
		'data-edit' => 'true',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);