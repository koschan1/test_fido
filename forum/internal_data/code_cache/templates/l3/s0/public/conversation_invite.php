<?php
// FROM HASH: 27aede3ece3af8c82aca96635792249a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Пригласить пользователей в переписку');
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Переписки'), $__templater->func('link', array('conversations', ), false), array(
	));
	$__finalCompiled .= '
';
	$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['conversation']['title'])), $__templater->func('link', array('conversations', $__vars['conversation'], ), false), array(
	));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['remainingRecipients'] > 1) {
		$__compilerTemp1 .= 'Здесь можно ввести несколько имён.';
	}
	$__compilerTemp2 = '';
	if ($__vars['remainingRecipients'] > 0) {
		$__compilerTemp2 .= 'Вы можете пригласить следующее количество пользователей: ' . $__templater->filter($__vars['remainingRecipients'], array(array('number', array()),), true) . '';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTokenInputRow(array(
		'name' => 'recipients',
		'href' => $__templater->func('link', array('members/find', ), false),
		'min-length' => '1',
		'max-tokens' => (($__vars['remainingRecipients'] > -1) ? $__vars['remainingRecipients'] : null),
	), array(
		'label' => 'Пригласить пользователей',
		'explain' => '
					' . $__compilerTemp1 . ' ' . 'Приглашённые пользователи смогут видеть всю переписку с самого начала.' . '
					' . $__compilerTemp2 . '
				',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Пригласить',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('conversations/invite', $__vars['conversation'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);