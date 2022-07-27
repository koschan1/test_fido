<?php
// FROM HASH: d87d678750da3a051872bd03820e296b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Выйти');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Вы уверены, что хотите выйти из чата? Это действие выбросит Вас из всех комнат.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Выйти',
		'class' => 'js-overlayClose',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('chat/logout', ), false),
		'class' => 'block',
		'data-xf-init' => 'siropu-chat-logout',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);