<?php
// FROM HASH: bd0ee5633679a5b5c26a13eb3c3b39a1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Настройка импортёра' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['title']));
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['importer'], 'isBeta', array())) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important">
		' . 'Этот импортёр находится в стадии бета-тестирования и может содержать ошибки. Перед началом реального импорта рекомендуется тщательно протестировать этот процесс.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	$__compilerTemp2 = '';
	$__compilerTemp2 .= '
					' . $__templater->filter($__templater->method($__vars['importer'], 'renderBaseConfigOptions', array($__vars, )), array(array('raw', array()),), true) . '
				';
	if (strlen(trim($__compilerTemp2)) > 0) {
		$__compilerTemp1 .= '
				' . $__compilerTemp2 . '
			';
	} else {
		$__compilerTemp1 .= '
				<div class="block-row">' . 'Настройка не требуется.' . '</div>
				' . $__templater->formHiddenVal('config[]', '', array(
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Продолжить' . $__vars['xf']['language']['ellipsis'],
	), array(
	)) . '
	</div>
	' . $__templater->formHiddenVal('previous_config', $__templater->filter($__vars['baseConfig'], array(array('json', array()),), false), array(
	)) . '
	' . $__templater->formHiddenVal('importer', $__vars['importerId'], array(
	)) . '
', array(
		'action' => $__templater->func('link', array('import/config', ), false),
		'class' => 'block js-importConfigForm',
		'ajax' => 'true',
		'data-replace' => '.js-importConfigForm',
	));
	return $__finalCompiled;
}
);