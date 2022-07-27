<?php
// FROM HASH: bba9ddd24964d585566ba9cccd17f85f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Объединить пользователей');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->escape($__vars['user']['username']) . '
			', array(
		'label' => 'Пользователь-источник',
		'explain' => 'Этот пользователь будет удалён.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'ac' => 'single',
	), array(
		'label' => 'Целевой пользователь',
		'explain' => '' . $__templater->escape($__vars['user']['username']) . ' будет объединён с этим пользователем и весь контент ' . $__templater->escape($__vars['user']['username']) . ' теперь будет принадлежать данному пользователю.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Объеденить',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('users/merge', $__vars['user'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);