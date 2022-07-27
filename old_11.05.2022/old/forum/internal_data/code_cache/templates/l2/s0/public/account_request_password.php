<?php
// FROM HASH: b4053615a564df33a527fcc72f9a80bb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Запросить пароль');
	$__finalCompiled .= '

' . $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'На данный момент Ваша учётная запись не имеет пароля. Вы уверены, что хотите сгенерировать новый пароль? Он будет отправлен на адрес: ' . $__templater->escape($__vars['xf']['visitor']['email']) . '.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'submit' => 'Запросить пароль',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>

', array(
		'action' => $__templater->func('link', array('account/request-password', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);