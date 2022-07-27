<?php
// FROM HASH: e49b88a098de1c5a3833dea966b52c9e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Импорт' . $__vars['xf']['language']['ellipsis']);
	$__finalCompiled .= '
';
	$__templater->setPageParam('template', 'PAGE_RUN_JOB');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['stepTitle']) {
		$__compilerTemp1 .= '
		';
		if ($__vars['stepComplete']) {
			$__compilerTemp1 .= '
			' . 'Шаг ' . $__templater->escape($__vars['importCompletion']['current']) . ' из ' . $__templater->escape($__vars['importCompletion']['total']) . '' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['stepTitle']) . ' - 100%
		';
		} else {
			$__compilerTemp1 .= '
			' . 'Шаг ' . $__templater->escape($__vars['importCompletion']['current']) . ' из ' . $__templater->escape($__vars['importCompletion']['total']) . '' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['stepTitle']) . ' - ' . $__templater->escape($__vars['stepCompletion']) . '
		';
		}
		$__compilerTemp1 .= '
	';
	} else if ($__vars['importCompletion']['current']) {
		$__compilerTemp1 .= '
		' . 'Шаг ' . $__templater->escape($__vars['importCompletion']['current']) . ' из ' . $__templater->escape($__vars['importCompletion']['total']) . '' . $__vars['xf']['language']['label_separator'] . ' ' . 'Обработка' . $__vars['xf']['language']['ellipsis'] . '
	';
	} else {
		$__compilerTemp1 .= '
		' . 'Обработка' . $__vars['xf']['language']['ellipsis'] . '
	';
	}
	$__finalCompiled .= $__templater->form('

	' . $__compilerTemp1 . '

	<div class="u-noJsOnly">
		' . $__templater->button('Продолжить' . $__vars['xf']['language']['ellipsis'], array(
		'type' => 'submit',
	), '', array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('import/run', ), false),
		'method' => 'post',
		'class' => 'blockMessage',
		'data-xf-init' => 'auto-submit',
	));
	return $__finalCompiled;
}
);