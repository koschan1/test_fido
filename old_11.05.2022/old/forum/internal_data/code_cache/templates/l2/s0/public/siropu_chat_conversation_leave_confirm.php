<?php
// FROM HASH: 70354af13d2c59b39195d8bffc120b21
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Покинуть приватный разговор' . ' (' . $__templater->func('username_link', array($__vars['conversation']['Contact'], true, array(
		'defaultname' => 'Неизвестно',
		'href' => '',
	))) . ')');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		' . $__templater->formInfoRow('
			' . 'Если Вы покините приватный разговор, Вы больше не будете получать новых сообщений от <b>' . $__templater->escape($__vars['conversation']['Contact']['username']) . '</b>. Вы можете создать приватный разговор в любое время, но если <b>' . $__templater->escape($__vars['conversation']['Contact']['username']) . '</b> также покинет приватный разговор, все сообщения будут удалены из истории.' . '
		', array(
		'rowtype' => 'confirm',
	)) . '
		' . $__templater->formSubmitRow(array(
		'submit' => 'Покинуть приватный разговор',
		'class' => 'js-overlayClose',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('chat/conversation/leave', $__vars['conversation'], ), false),
		'class' => 'block',
		'data-xf-init' => 'siropu-chat-leave-conversation',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);