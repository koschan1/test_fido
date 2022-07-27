<?php
// FROM HASH: 8310c469f68961dc73543ea8c1561a1b
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
				' . 'Пожалуйста, подтвердите удаление' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array($__vars['groupLinkPrefix'] . '/edit', $__vars['promptGroup'], ), true) . '" data-xf-click="overlay">' . $__templater->escape($__vars['promptGroup']['title']) . '</a></strong>
				' . 'Подсказки из этой группы будут исключены из неё, а не удалены.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array($__vars['groupLinkPrefix'] . '/delete', $__vars['promptGroup'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);