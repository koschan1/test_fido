<?php
// FROM HASH: 8fdcaed5e8bd579528a95d4108a5e3e3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтвердите действие');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['user']['is_super_admin']) {
		$__compilerTemp1 .= '
				' . $__templater->formPasswordBoxRow(array(
			'name' => 'visitor_password',
		), array(
			'label' => 'Ваш пароль',
			'explain' => 'Вы должны ввести свой текущий пароль для выполнения этого запроса.',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите удаление' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('users/edit', $__vars['user'], ), true) . '">' . $__templater->escape($__vars['user']['username']) . '</a></strong>
				<div class="blockMessage blockMessage--important"><b>' . 'Примечание' . $__vars['xf']['language']['label_separator'] . '</b> ' . 'Это действие не удалит контент, созданный этим пользователем' . '</div>
			', array(
		'rowtype' => 'confirm',
	)) . '
			' . $__compilerTemp1 . '
			' . $__templater->formRadioRow(array(
		'name' => 'rename',
	), array(array(
		'value' => '0',
		'selected' => true,
		'label' => 'Не переименовывать этого пользователя',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'label' => 'Изменить имя пользователя на' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'rename_to',
		'value' => 'Удалённый пользователь' . ' ' . $__vars['user']['user_id'],
		'maxlength' => 'max_length($user, \'username\')',
	))),
		'_type' => 'option',
	)), array(
		'explain' => 'Если Вы решите переименовать этого пользователя, то его имя будет изменено во всем контенте, что может быть использовано для анонимизации его контента, чтобы соответствовать правам пользователя в соответствии с правилами общего регламента по защите данных (GDPR). Исходное имя пользователя может по-прежнему отображаться в цитируемом контенте.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
	)) . '
	</div>
	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('users/delete', $__vars['user'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);