<?php
// FROM HASH: 1357ffdb245356d57b9710fbbd52484b
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
				' . 'Эта функция попытается автоматически объединить Ваши изменения с основными изменениями в шаблоне. Поскольку этот процесс автоматизирован, рекомендуется, после объединения, проверить шаблоны, чтобы убедиться, что они в порядке.' . '
				<strong>' . 'Если при попытке объединения будет обнаружен конфликт, то автоматического объединения не произойдёт. Конфликт нужно будет разрешить вручную.' . '</strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Объеденить',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('templates/auto-merge', ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);