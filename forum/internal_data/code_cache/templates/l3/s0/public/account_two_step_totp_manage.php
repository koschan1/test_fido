<?php
// FROM HASH: 43ec4b92920dda6466b4b374b8fd2bea
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
	if ($__vars['newProviderData']) {
		$__compilerTemp1 .= '
				' . $__templater->filter($__templater->method($__vars['provider'], 'render', array('setup', $__vars['xf']['visitor'], $__vars['newProviderData'], $__vars['newTriggerData'], )), array(array('raw', array()),), true) . '

				' . $__templater->formHiddenVal('confirm', '1', array(
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'regen',
			'value' => '1',
			'label' => 'Сгенерировать секретный ключ для нового устройства',
			'hint' => 'Генерация нового секретного ключа, который будет использоваться для проверки данных на устройстве. После завершения, коды, сгенерированные с использованием старого секретного ключа, больше не будут работать.',
			'_type' => 'option',
		)), array(
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Подтвердить',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('account/two-step/manage', $__vars['provider'], ), false),
		'class' => 'block',
		'ajax' => ($__vars['newProviderData'] ? 'true' : ''),
	));
	return $__finalCompiled;
}
);