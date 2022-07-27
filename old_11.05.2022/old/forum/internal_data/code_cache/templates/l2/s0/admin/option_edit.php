<?php
// FROM HASH: 204bf5d316c7a900f79f3bc0d6e5c652
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['option'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить настройку');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать настройку' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['option']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['group']) {
		$__finalCompiled .= '
	';
		$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['group']['title'])), $__templater->func('link', array('options/groups', $__vars['group'], ), false), array(
		));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['option'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('options/delete', $__vars['option'], array('_xfRedirect' => $__vars['redirect'], ), ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['groups'])) {
		foreach ($__vars['groups'] AS $__vars['group']) {
			$__compilerTemp1[] = array(
				'name' => 'relations[' . $__vars['group']['group_id'] . '][selected]',
				'selected' => $__vars['relations'][$__vars['group']['group_id']] !== null,
				'label' => $__templater->escape($__vars['group']['title']),
				'data-hide' => 'true',
				'_dependent' => array($__templater->callMacro('display_order_macros', 'input', array(
				'name' => 'relations[' . $__vars['group']['group_id'] . '][display_order]',
				'value' => $__templater->filter($__vars['relations'][$__vars['group']['group_id']], array(array('default', array(1, )),), false),
			), $__vars)),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">

			' . $__templater->formTextBoxRow(array(
		'name' => 'option_id',
		'value' => $__vars['option']['option_id'],
		'dir' => 'ltr',
	), array(
		'label' => 'ID настройки',
		'hint' => 'Только A-Z, a-z, 0-9 и и _ (символ подчёркивания)',
	)) . '

			' . $__templater->callMacro('addon_macros', 'addon_edit', array(
		'addOnId' => $__vars['option']['addon_id'],
	), $__vars) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__templater->method($__vars['option'], 'exists', array()) ? $__vars['option']['MasterTitle']['phrase_text'] : ''),
	), array(
		'label' => 'Заголовок',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'explain',
		'value' => ($__templater->method($__vars['option'], 'exists', array()) ? $__vars['option']['MasterExplain']['phrase_text'] : ''),
		'autosize' => 'true',
	), array(
		'label' => 'Пояснение',
		'hint' => 'Можно использовать HTML',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'edit_format',
		'value' => $__vars['option']['edit_format'],
	), array(array(
		'value' => 'textbox',
		'label' => 'Текстовое поле',
		'_type' => 'option',
	),
	array(
		'value' => 'spinbox',
		'label' => 'Числовое поле',
		'_type' => 'option',
	),
	array(
		'value' => 'onoff',
		'label' => 'Чекбоксы вкл/выкл',
		'_type' => 'option',
	),
	array(
		'value' => 'onofftextbox',
		'label' => 'Чекбоксы вкл/выкл с текстовым полем',
		'_type' => 'option',
	),
	array(
		'value' => 'radio',
		'label' => 'Радиокнопки',
		'_type' => 'option',
	),
	array(
		'value' => 'select',
		'label' => 'Меню выбора',
		'_type' => 'option',
	),
	array(
		'value' => 'checkbox',
		'label' => 'Чекбоксы',
		'_type' => 'option',
	),
	array(
		'value' => 'template',
		'label' => 'Именованный шаблон',
		'_type' => 'option',
	),
	array(
		'value' => 'callback',
		'label' => 'PHP-обработчик',
		'_type' => 'option',
	),
	array(
		'value' => 'username',
		'label' => 'Поле для имени пользователя',
		'_type' => 'option',
	)), array(
		'label' => 'Формат',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'edit_format_params',
		'value' => $__vars['option']['edit_format_params'],
		'autosize' => 'true',
		'code' => 'true',
	), array(
		'label' => 'Параметры формата',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'data_type',
		'value' => ($__vars['option']['data_type'] ?: 'string'),
	), array(array(
		'value' => 'boolean',
		'label' => 'Логическое значение',
		'_type' => 'option',
	),
	array(
		'value' => 'string',
		'label' => 'Строка',
		'_type' => 'option',
	),
	array(
		'value' => 'integer',
		'label' => 'Целое число',
		'_type' => 'option',
	),
	array(
		'value' => 'unsigned_integer',
		'label' => 'Беззнаковое целое число',
		'_type' => 'option',
	),
	array(
		'value' => 'positive_integer',
		'label' => 'Целое положительное',
		'_type' => 'option',
	),
	array(
		'value' => 'numeric',
		'label' => 'Число',
		'_type' => 'option',
	),
	array(
		'value' => 'unsigned_numeric',
		'label' => 'Беззнаковое число',
		'_type' => 'option',
	),
	array(
		'value' => 'array',
		'label' => 'Массив',
		'_type' => 'option',
	)), array(
		'label' => 'Тип данных',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'default_value',
		'value' => (($__vars['option']['data_type'] == 'array') ? $__templater->filter($__vars['option']['default_value'], array(array('json', array()),), false) : $__vars['option']['default_value']),
		'autosize' => 'true',
		'code' => 'true',
	), array(
		'label' => 'Значение по умолчанию',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'sub_options',
		'autosize' => 'true',
		'value' => $__templater->filter($__vars['option']['sub_options'], array(array('join', array('
', )),), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Опции массива',
	)) . '

			' . $__templater->formRow('
				' . $__templater->callMacro('helper_callback_fields', 'callback_fields', array(
		'namePrefix' => 'validation',
		'data' => $__vars['option'],
	), $__vars) . '
			', array(
		'rowtype' => 'input',
		'label' => 'Обработчик проверки',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
		'listclass' => 'listColumns',
	), $__compilerTemp1, array(
		'label' => 'Отображать в группах',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'advanced',
		'selected' => $__vars['option']['advanced'],
		'label' => 'Показывать только в расширенном режиме',
		'hint' => 'Эта опция будет скрыта по умолчанию и показана только тогда, когда администратор включит "расширенный режим".',
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
	' . $__templater->func('redirect_input', array($__vars['redirect'], null, true)) . '
', array(
		'action' => $__templater->func('link', array('options/save', $__vars['option'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);