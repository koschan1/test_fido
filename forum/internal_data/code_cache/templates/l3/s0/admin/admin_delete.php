<?php
// FROM HASH: 24b4d8f209c4bae1913dc8adf3b3dd82
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
				' . 'Пожалуйста, подтвердите, что Вы хотите убрать следующего пользователя из администраторов' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('admins/edit', $__vars['admin'], ), true) . '">' . $__templater->escape($__vars['admin']['username']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '

			' . $__templater->formPasswordBoxRow(array(
		'name' => 'visitor_password',
	), array(
		'label' => 'Ваш пароль',
		'explain' => 'Вы должны ввести свой текущий пароль для выполнения этого запроса.',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
	)) . '
	</div>

', array(
		'action' => $__templater->func('link', array('admins/delete', $__vars['admin'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);