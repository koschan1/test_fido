<?php
// FROM HASH: 000b1b7f336fa40bdf33242254459012
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Одобрить тему');
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['thread'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите одобрение' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('threads', $__vars['thread'], ), true) . '">' . $__templater->escape($__vars['thread']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('threads/approve', $__vars['thread'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);