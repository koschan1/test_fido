<?php
// FROM HASH: 26a5225d574e7becc0ec01845a608fec
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Покинуть переписки');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['conversations'])) {
		foreach ($__vars['conversations'] AS $__vars['conversation']) {
			$__compilerTemp1 .= '
		' . $__templater->formHiddenVal('ids[]', $__vars['conversation']['conversation_id'], array(
			)) . '
	';
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Если покинуть переписку, она исчезнет из Вашего списка переписок.' . '
			', array(
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'recipient_state',
	), array(array(
		'value' => 'deleted',
		'checked' => 'checked',
		'label' => 'Принимать последующие сообщения',
		'hint' => 'Если появятся новые ответы, то переписка будет восстановлена у Вас во входящих.',
		'_type' => 'option',
	),
	array(
		'value' => 'deleted_ignored',
		'label' => 'Игнорировать последующие сообщения',
		'hint' => 'Вы не будете получать уведомления о новых ответах, а переписка будет оставаться удалённой.',
		'_type' => 'option',
	)), array(
		'label' => 'Обработка новых ответов',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>

	' . $__compilerTemp1 . '

	' . $__templater->formHiddenVal('type', 'conversation', array(
	)) . '
	' . $__templater->formHiddenVal('action', 'leave', array(
	)) . '
	' . $__templater->formHiddenVal('confirmed', '1', array(
	)) . '

	' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
', array(
		'action' => $__templater->func('link', array('inline-mod', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);