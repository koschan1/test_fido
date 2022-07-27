<?php
// FROM HASH: 609e7a68968b4e6b269c5e0637388b2f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Отправить подтверждение учётной записи ещё раз');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['needsCaptcha']) {
		$__compilerTemp1 .= '
				' . $__templater->formRowIfContent($__templater->func('captcha', array(true, false)), array(
			'label' => 'Проверка',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Вы уверены, что хотите повторить отправку письма для активации учётной записи? Ссылки во всех предыдущих письмах перестанут работать. Это письмо будет отправлено на адрес ' . $__templater->escape($__vars['user']['email']) . '.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__compilerTemp1 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Отправить письмо ещё раз',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__vars['confirmUrl'],
		'class' => 'block',
		'ajax' => 'true',
		'data-redirect' => 'off',
		'data-reset-complete' => 'true',
	));
	return $__finalCompiled;
}
);