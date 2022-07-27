<?php
// FROM HASH: c89805b0b23c767f53564cbfa9b42d21
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Ссылка на это сообщение');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'value' => $__templater->func('link', array('full:chat/conversation/message', $__vars['message'], ), false),
		'data-xf-init' => 'siropu-chat-text-select',
	), array(
		'label' => 'URL-адрес сообщения',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Ок',
		'class' => 'js-overlayClose',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
</div>';
	return $__finalCompiled;
}
);