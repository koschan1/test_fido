<?php
// FROM HASH: ca05ae84e4bfefced9aecf67488d2552
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Объединить теги');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->escape($__vars['tag']['tag']) . '
			', array(
		'explain' => 'Этот тег будет удалён.',
		'label' => 'Тег-источник',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'target',
		'ac' => 'single',
		'data-acurl' => $__templater->func('link_type', array('public', 'misc/tag-auto-complete', ), false),
	), array(
		'label' => 'Целевой тег',
		'explain' => 'Весь контент с меткой ' . $__templater->escape($__vars['tag']['tag']) . ', теперь будет отмечено этой меткой.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Объеденить',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('tags/merge', $__vars['tag'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);