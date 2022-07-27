<?php
// FROM HASH: 9288567774ba4ddf91c220eb7bc25e60
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Сводка активности' . $__vars['xf']['language']['label_separator'] . ' ' . 'Отправить тестовое письмо');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Вы уверены, что хотите сгенерировать и получить тестовый email со сводкой активности? Это письмо будет отправлено на адрес ' . $__templater->escape($__vars['xf']['visitor']['email']) . '.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Отправить тестовое письмо',
		'fa' => 'fa-envelope',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('activity-summary/send-test-email', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);