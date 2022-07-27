<?php
// FROM HASH: d1f648e47b5b83c8dee3fdc0659271db
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтвердите действие');
	$__finalCompiled .= '

' . $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите, что Вы хотите пересоздать следующий API-ключ' . ':
				<strong><a href="' . $__templater->func('link', array('api-keys/edit', $__vars['apiKey'], ), true) . '">' . $__templater->escape($__vars['apiKey']['title']) . '</a></strong>
				<span>' . 'Все приложения, использующие старый ключ, будут работать неправильно, пока не будут обновлены новым ключом.' . '</span>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'submit' => 'Cгенерировать новый ключ',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>

', array(
		'action' => $__templater->func('link', array('api-keys/regenerate', $__vars['apiKey'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);