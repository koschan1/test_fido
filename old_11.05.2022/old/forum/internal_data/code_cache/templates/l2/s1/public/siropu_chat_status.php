<?php
// FROM HASH: 69a8ccab8f636d058ac736b5893ef69c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Обновить статус');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextAreaRow(array(
		'name' => 'status',
		'value' => $__vars['xf']['visitor']['siropu_chat_status'],
		'maxlength' => $__vars['xf']['options']['siropuChatStatusMaxLength'],
		'autosize' => 'true',
	), array(
		'label' => 'Статус',
		'explain' => 'Ваш статус будет отображаться под Вашим именем пользователя в списке участников. Максимальное количество символов ' . $__templater->escape($__vars['xf']['options']['siropuChatStatusMaxLength']) . '.',
	)) . '
		</div>
	</div>
	' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
', array(
		'action' => $__templater->func('link', array('chat/update-status', ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);