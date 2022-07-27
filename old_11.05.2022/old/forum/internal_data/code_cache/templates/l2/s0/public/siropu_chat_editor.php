<?php
// FROM HASH: a1c9edeb1bd9d46b87fd1cb5b822753e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div id="siropuChatEditor">
	' . $__templater->callMacro('siropu_chat_ads_macros', 'ads', array(
		'position' => 'aboveEditor',
		'ads' => $__vars['chat']['ads']['aboveEditor'],
	), $__vars) . '
	<form data-xf-init="siropu-chat-form" data-multi-line="' . ($__vars['xf']['options']['siropuChatMultiLineMessages'] ? 'true' : 'false') . '">
		' . $__templater->formEditorRow(array(
		'name' => 'message',
		'placeholder' => (($__vars['chat']['channel'] == 'room') ? ((($__vars['xf']['visitor']['user_id'] == 0) AND ($__vars['xf']['options']['siropuChatGuestRoom'] AND (($__vars['xf']['options']['siropuChatGuestRoom'] == $__vars['chat']['roomId']) AND ($__vars['xf']['session']['siropuChatGuestNickname'] == '')))) ? 'Введите /nick, за которым следует имя, которое хотите установить, как ник.' : 'Напишите публичное сообщение...') : 'Напишите приватное сообщение...'),
		'removebuttons' => $__vars['chat']['disabledButtons'],
		'data-min-height' => '40',
	), array(
		'rowtype' => 'fullWidth noLabel',
	)) . '
		';
	if ($__vars['xf']['options']['siropuChatEditorSubmitButton']) {
		$__finalCompiled .= '
			' . $__templater->button('Отправить', array(
			'type' => 'submit',
			'class' => 'button--link',
			'fa' => 'fas fa-paper-plane',
		), '', array(
		)) . '
		';
	}
	$__finalCompiled .= '
	</form>
	' . $__templater->callMacro('siropu_chat_ads_macros', 'ads', array(
		'position' => 'belowEditor',
		'ads' => $__vars['chat']['ads']['belowEditor'],
	), $__vars) . '
</div>';
	return $__finalCompiled;
}
);