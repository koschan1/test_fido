<?php
// FROM HASH: 70e0edbcb70ea4e442d46d39a8068652
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Настройка двухфакторной аутентификации' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['provider']['title']));
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['xf']['visitor']['email']) {
		$__compilerTemp1 .= '
				' . $__templater->formRow('
					' . $__templater->escape($__vars['xf']['visitor']['email']) . '
				', array(
			'label' => 'Электронная почта',
			'explain' => 'Мы создадим Authy ID, используя email  из Вашей учётной записи.',
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'email',
		), array(
			'label' => 'Электронная почта',
			'explain' => 'Мы создадим для Вас Authy ID, используя указанный здесь email.',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__templater->formTelBoxRow(array(
		'name' => 'user_number',
		'dialcodename' => 'dial_code',
		'intlnumbername' => 'intl_numb',
	), array(
		'label' => 'Номер мобильного телефона',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>

	' . $__templater->formHiddenVal('setup', '1', array(
	)) . '
', array(
		'action' => $__templater->func('link', array('account/two-step/enable', $__vars['provider'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);