<?php
// FROM HASH: 7435ca9856475cebae83a90d715d01e7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Восстановление пароля');
	$__finalCompiled .= '

';
	$__templater->setPageParam('head.' . 'robots', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['xf']['options']['lostPasswordCaptcha']) {
		$__compilerTemp1 .= '
				' . $__templater->formRowIfContent($__templater->func('captcha', array(false, false)), array(
			'label' => 'Проверка',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('Если Вы забыли пароль, то воспользуйтесь этой формой для его восстановления. Вы получите письмо на электронную почту с соответствующими инструкциями.
<!-- v220.1 -->', array(
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'email',
		'type' => 'email',
		'autofocus' => 'autofocus',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'email', ), false),
	), array(
		'label' => 'Электронная почта',
		'explain' => 'Укажите email, который Вы использовали при регистрации.',
	)) . '

			' . $__compilerTemp1 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Сбросить',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('lost-password', ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);