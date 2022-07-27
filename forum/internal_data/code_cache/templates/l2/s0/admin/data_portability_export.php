<?php
// FROM HASH: 169626308cbf7f702be43b88efcb2c62
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Экспорт пользователя');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'На данной странице Вы можете скачать стандартную личную информацию пользователя в формате XML для переноса её в другую систему.' . '
			', array(
	)) . '
			' . $__templater->formTextBoxRow(array(
		'name' => 'username',
		'value' => $__vars['user']['username'],
		'required' => 'required',
		'ac' => 'single',
	), array(
		'label' => 'Имя пользователя',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'export',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('data-portability/export', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);