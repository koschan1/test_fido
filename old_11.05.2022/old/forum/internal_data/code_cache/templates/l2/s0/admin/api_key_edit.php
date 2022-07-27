<?php
// FROM HASH: 5a763dc1eef8e9a27a7e6bc6de2d82ef
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['apiKey'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить API-ключ');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать API-ключ');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['apiKey'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('api-keys/delete', $__vars['apiKey'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['apiKey'], 'isUpdate', array())) {
		$__compilerTemp1 .= '
				' . $__templater->formRow('
					<code>' . $__templater->escape($__vars['apiKey']['api_key_snippet']) . '</code>
					' . $__templater->button('Посмотреть весь ключ' . '
					', array(
			'href' => $__templater->func('link', array('api-keys/view-key', $__vars['apiKey'], ), false),
			'data-xf-click' => 'overlay',
			'class' => 'button--link',
		), '', array(
		)) . '

					' . $__templater->button('Cгенерировать новый ключ' . '
					', array(
			'href' => $__templater->func('link', array('api-keys/regenerate', $__vars['apiKey'], ), false),
			'data-xf-click' => 'overlay',
			'class' => 'button--link',
		), '', array(
		)) . '
				', array(
			'label' => 'API-ключ',
			'rowtype' => 'button',
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__templater->method($__vars['apiKey'], 'isUpdate', array())) {
		$__compilerTemp2 .= '
				' . $__templater->callMacro('api_key_macros', 'key_type_row', array(
			'apiKey' => $__vars['apiKey'],
		), $__vars) . '

				' . $__templater->formRow('
					' . $__templater->func('date_dynamic', array($__vars['apiKey']['creation_date'], array(
		))) . '
					&middot;
					' . 'Автор ' . ($__templater->escape($__vars['apiKey']['Creator']['username']) ?: 'Н/Д') . '' . '
				', array(
			'label' => 'Создано',
		)) . '

				';
		$__compilerTemp3 = '';
		if ($__vars['apiKey']['last_use_date']) {
			$__compilerTemp3 .= '
						' . $__templater->func('date_dynamic', array($__vars['apiKey']['last_use_date'], array(
			))) . '
					';
		} else {
			$__compilerTemp3 .= '
						' . 'Н/Д' . '
					';
		}
		$__compilerTemp2 .= $__templater->formRow('
					' . $__compilerTemp3 . '
				', array(
			'label' => 'Последнее использование',
		)) . '
			';
	} else {
		$__compilerTemp2 .= '
				' . $__templater->formRadioRow(array(
			'name' => 'key_type',
			'value' => 'guest',
		), array(array(
			'value' => 'guest',
			'label' => 'Ключ гостя',
			'_type' => 'option',
		),
		array(
			'label' => 'Ключ пользователя',
			'value' => 'user',
			'data-xf-init' => 'disabler',
			'_dependent' => array($__templater->formTextBox(array(
			'name' => 'username',
			'ac' => 'single',
			'autocomplete' => 'off',
			'value' => (($__vars['apiKey']['key_type'] == 'user') ? $__vars['apiKey']['User']['username'] : ''),
			'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
		))),
			'afterhint' => 'Введите имя пользователя, от имени которого этот ключ должен пройти аутентификацию.',
			'_type' => 'option',
		),
		array(
			'value' => 'super',
			'label' => 'Ключ суперпользователя',
			'_type' => 'option',
		)), array(
			'label' => 'Тип ключа',
			'explain' => 'Это невозможно изменить после создания. Для изменения потребуется создать новый API-ключ.',
		)) . '
			';
	}
	$__compilerTemp4 = array();
	if ($__templater->isTraversable($__vars['scopes'])) {
		foreach ($__vars['scopes'] AS $__vars['scope']) {
			$__compilerTemp4[] = array(
				'name' => 'scopes[]',
				'value' => $__vars['scope']['api_scope_id'],
				'checked' => $__vars['apiKey']['scopes'][$__vars['scope']['api_scope_id']],
				'label' => $__templater->escape($__vars['scope']['api_scope_id']),
				'hint' => $__templater->escape($__vars['scope']['description']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'maxlength' => $__templater->func('max_length', array($__vars['apiKey'], 'title', ), false),
		'value' => $__vars['apiKey']['title'],
	), array(
		'label' => 'Заголовок',
		'explain' => 'Укажите заголовок для этого ключа. Он будет отображаться в списке API-ключей.',
	)) . '

			' . $__compilerTemp2 . '

			' . $__templater->formRadioRow(array(
		'name' => 'allow_all_scopes',
		'value' => $__vars['apiKey']['allow_all_scopes'],
	), array(array(
		'value' => '0',
		'label' => 'Только выбранные области' . ':',
		'_dependent' => array($__templater->formCheckBox(array(
	), $__compilerTemp4)),
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'label' => 'Все области',
		'_type' => 'option',
	)), array(
		'label' => 'Разрешённые области',
		'explain' => 'Области позволяют ключу API получать доступ только к определённым частям API. В целях безопасности рекомендуется разрешать доступ только к необходимым областям, особенно для ключей суперпользователя или пользователей с высокими привилегиями.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'active',
		'selected' => $__vars['apiKey']['active'],
		'label' => 'API-ключ активен',
		'hint' => 'Используйте это для отключения API-ключа.',
		'_type' => 'option',
	)), array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('api-keys/save', $__vars['apiKey'], ), false),
		'ajax' => 'true',
		'data-force-flash-message' => 'on',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);