<?php
// FROM HASH: cd10ab9f92664e1a5f21c6f978006e8c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['response'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить ответ Бота');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать ответ Бота' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['response']['response_keyword']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['response'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('chat/bot-messages/delete', $__vars['response'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['rooms'])) {
		foreach ($__vars['rooms'] AS $__vars['room']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['room']['room_id'],
				'label' => $__templater->escape($__vars['room']['room_name']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp2 = array();
	if ($__templater->isTraversable($__vars['userGroups'])) {
		foreach ($__vars['userGroups'] AS $__vars['userGroupId'] => $__vars['userGroupTitle']) {
			$__compilerTemp2[] = array(
				'value' => $__vars['userGroupId'],
				'label' => $__templater->escape($__vars['userGroupTitle']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextAreaRow(array(
		'name' => 'response_keyword',
		'value' => $__vars['response']['response_keyword'],
		'rows' => '3',
	), array(
		'label' => 'Ключевое слово',
		'explain' => 'Ключевое слово, которое вызывает ответ. Вы можете добавить несколько ключевых слов, разместив каждое в новой строке.',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'response_message',
		'value' => $__vars['response']['response_message'],
		'rows' => '3',
	), array(
		'label' => 'Ответ',
		'explain' => 'Ответ, который будет возвращен. Вы можете добавить несколько ответов, разместив каждый в новой строке.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'response_bot_name',
		'value' => $__vars['response']['response_bot_name'],
		'maxlength' => $__templater->func('max_length', array($__vars['response'], 'response_bot_name', ), false),
	), array(
		'label' => 'Имя Бота',
		'explain' => 'Имя бота, который даст ответ.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'response_rooms',
		'value' => $__vars['response']['response_rooms'],
		'multiple' => 'true',
	), $__compilerTemp1, array(
		'label' => 'Включить в выбранных комнатах',
		'explain' => 'Этот параметр не является обязательным.',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'response_user_groups',
		'value' => $__vars['response']['response_user_groups'],
		'multiple' => 'true',
	), $__compilerTemp2, array(
		'label' => 'Включить для выбранных групп пользователей',
		'explain' => 'Этот параметр не является обязательным.',
	)) . '

			<hr class="formRowSep" />
			
			' . $__templater->formNumberBoxRow(array(
		'name' => 'response_settings[interval]',
		'value' => $__vars['response']['response_settings']['interval'],
		'min' => '0',
		'step' => '1',
	), array(
		'label' => 'Минимальный интервал между ответами',
		'explain' => 'Минимальный интервал в минутах между ответами.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'response_settings[exact_match]',
		'value' => '1',
		'selected' => $__vars['response']['response_settings']['exact_match'],
		'label' => 'Точное соотношение ключевых слов',
		'_type' => 'option',
	),
	array(
		'name' => 'response_settings[mention]',
		'value' => '1',
		'selected' => $__vars['response']['response_settings']['mention'],
		'label' => 'Упомянуть пользователя',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('chat/bot-responses/save', $__vars['response'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);