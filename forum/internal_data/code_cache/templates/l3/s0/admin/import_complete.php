<?php
// FROM HASH: cdeb753af1c1bbf8dc49945637e19bd7
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Импорт завершён!');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Импорт завершён. Все необходимые кэши перестроены.' . '
			', array(
	)) . '
			' . $__templater->callMacro('import_finalize', 'notes', array(
		'notes' => $__vars['notes'],
	), $__vars) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Завершить импорт',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('import/complete', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);