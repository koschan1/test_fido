<?php
// FROM HASH: ec8c2c152c5fef69473ef38b430ae222
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Link to this message');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'value' => $__templater->func('link', array('full:chat/message/view', $__vars['message'], ), false),
		'data-xf-init' => 'siropu-chat-text-select',
	), array(
		'label' => 'Message URL',
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