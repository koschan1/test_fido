<?php
// FROM HASH: ab518efcd7601ba60aed6bbc7ee74af9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Обратная связь');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__vars['xf']['visitor']['user_id']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'username',
			'autofocus' => 'autofocus',
			'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
			'required' => 'required',
		), array(
			'label' => 'Ваше имя',
			'hint' => 'Обязательное поле',
		)) . '

				' . $__templater->formTextBoxRow(array(
			'name' => 'email',
			'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'email', ), false),
			'type' => 'email',
			'required' => 'required',
		), array(
			'label' => 'Ваш email',
			'hint' => 'Обязательное поле',
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				' . $__templater->formRow($__templater->escape($__vars['xf']['visitor']['username']), array(
			'label' => 'Ваше имя',
		)) . '
				';
		if ($__vars['xf']['visitor']['email']) {
			$__compilerTemp1 .= '

					' . $__templater->formRow($__templater->escape($__vars['xf']['visitor']['email']), array(
				'label' => 'Ваш email',
			)) . '

				';
		} else {
			$__compilerTemp1 .= '

					' . $__templater->formTextBoxRow(array(
				'name' => 'email',
				'type' => 'email',
				'required' => 'required',
			), array(
				'label' => 'Ваш email',
				'hint' => 'Обязательное поле',
			)) . '

				';
		}
		$__compilerTemp1 .= '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__templater->formRowIfContent($__templater->func('captcha', array($__vars['forceCaptcha'], false)), array(
		'label' => 'Проверка',
		'hint' => 'Обязательное поле',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'subject',
		'required' => 'required',
	), array(
		'label' => 'Тема',
		'hint' => 'Обязательное поле',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'message',
		'rows' => '5',
		'autosize' => 'true',
		'required' => 'required',
	), array(
		'label' => 'Сообщение',
		'hint' => 'Обязательное поле',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Отправить',
	), array(
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('misc/contact', ), false),
		'class' => 'block',
		'ajax' => 'true',
		'data-force-flash-message' => 'true',
	));
	return $__finalCompiled;
}
);