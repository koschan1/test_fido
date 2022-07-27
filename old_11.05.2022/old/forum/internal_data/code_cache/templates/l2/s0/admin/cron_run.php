<?php
// FROM HASH: f7b3ae892ce5cba3a124daf66c696385
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
				' . 'Пожалуйста, подтвердите запуск следующего задания планировщика' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('cron/edit', $__vars['entry'], ), true) . '">' . $__templater->escape($__vars['entry']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Выполнить сейчас',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('cron/run', $__vars['entry'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);