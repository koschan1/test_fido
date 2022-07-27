<?php
// FROM HASH: 7c847252271696f4d8a61e75a0045a01
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['property'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить свойство');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать свойство' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['property']['master_title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['property'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('style-properties/delete', $__vars['property'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => '',
		'label' => '&nbsp;',
		'_type' => 'option',
	));
	if ($__templater->isTraversable($__vars['groups'])) {
		foreach ($__vars['groups'] AS $__vars['group']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['group']['group_name'],
				'label' => $__templater->escape($__vars['group']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp2 = '';
	if ($__vars['style']['style_id'] == 0) {
		$__compilerTemp2 .= '
				' . $__templater->callMacro('addon_macros', 'addon_edit', array(
			'addOnId' => $__vars['property']['addon_id'],
		), $__vars) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('

				' . $__templater->escape($__vars['style']['title']) . '
				' . $__templater->formHiddenVal('style_id', $__vars['style']['style_id'], array(
	)) . '
			', array(
		'label' => 'Стиль',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'property_name',
		'value' => $__vars['property']['property_name'],
		'maxlength' => $__templater->func('max_length', array($__vars['property'], 'property_name', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Имя свойства',
		'explain' => 'Вот так Вы будете ссылаться на свойство в шаблоне.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['property']['master_title'],
		'maxlength' => $__templater->func('max_length', array($__vars['property'], 'title', ), false),
	), array(
		'label' => 'Заголовок',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'description',
		'value' => $__vars['property']['master_description'],
		'autosize' => 'true',
		'maxlength' => $__templater->func('max_length', array($__vars['property'], 'description', ), false),
	), array(
		'label' => 'Описание',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRadioRow(array(
		'name' => 'property_type',
		'value' => ($__vars['property']['property_type'] ?: 'css'),
	), array(array(
		'value' => 'css',
		'data-xf-init' => 'disabler',
		'data-container' => '.js-propertyTypeCss',
		'data-hide' => 'true',
		'label' => '
					CSS',
		'_type' => 'option',
	),
	array(
		'value' => 'value',
		'data-xf-init' => 'disabler',
		'data-container' => '.js-propertyTypeValue',
		'data-hide' => 'true',
		'label' => '
					' . 'Значение',
		'_type' => 'option',
	)), array(
		'label' => 'Тип',
	)) . '

			<div class="js-propertyTypeCss">
				' . $__templater->formCheckBoxRow(array(
		'name' => 'css_components',
		'value' => $__vars['property']['css_components'],
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'text',
		'label' => 'Текст',
		'_type' => 'option',
	),
	array(
		'value' => 'background',
		'label' => 'Фон',
		'_type' => 'option',
	),
	array(
		'value' => 'border',
		'label' => 'Рамка',
		'_type' => 'option',
	),
	array(
		'value' => 'border_radius',
		'label' => 'Радиус рамки',
		'_type' => 'option',
	),
	array(
		'value' => 'border_width_simple',
		'label' => 'Ширина простой рамки',
		'_type' => 'option',
	),
	array(
		'value' => 'border_color_simple',
		'label' => 'Цвет простой рамки',
		'_type' => 'option',
	),
	array(
		'value' => 'border_radius_simple',
		'label' => 'Радиус простой рамки',
		'_type' => 'option',
	),
	array(
		'value' => 'padding',
		'label' => 'Внутренний отступ',
		'_type' => 'option',
	),
	array(
		'value' => 'extra',
		'label' => 'Дополнительно',
		'_type' => 'option',
	)), array(
		'label' => 'Компоненты CSS',
		'explain' => 'Простые параметры рамки применяются только в том случае, если не выбраны рамка и радиус рамки.',
	)) . '
			</div>
			<div class="js-propertyTypeValue">
				' . $__templater->formRadioRow(array(
		'name' => 'value_type',
		'value' => ($__vars['property']['value_type'] ?: 'string'),
		'listclass' => 'listColumns',
	), array(array(
		'value' => 'string',
		'label' => 'Строка',
		'_type' => 'option',
	),
	array(
		'value' => 'color',
		'label' => 'Цвет',
		'_type' => 'option',
	),
	array(
		'value' => 'unit',
		'label' => 'Единица измерения',
		'_type' => 'option',
	),
	array(
		'value' => 'number',
		'label' => 'Число',
		'_type' => 'option',
	),
	array(
		'value' => 'boolean',
		'label' => 'Логическое значение',
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
		'value' => 'template',
		'label' => 'Шаблон',
		'_type' => 'option',
	)), array(
		'label' => 'Тип значения',
	)) . '

				' . $__templater->formTextAreaRow(array(
		'name' => 'value_parameters',
		'value' => $__vars['property']['value_parameters'],
		'autosize' => 'true',
		'code' => 'true',
	), array(
		'label' => 'Параметры форматирования значения',
	)) . '

				' . $__templater->formTextBoxRow(array(
		'name' => 'depends_on',
		'value' => $__vars['property']['depends_on'],
		'maxlength' => $__templater->func('max_length', array($__vars['property'], 'depends_on', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Зависит от',
		'explain' => 'Ввод имени свойства здесь отключит это свойство, если именованное свойство отключено. Именованное свойство должно быть логическим свойством в той же группе, что и это свойство.',
	)) . '

				' . $__templater->formTextBoxRow(array(
		'name' => 'value_group',
		'value' => $__vars['property']['value_group'],
		'maxlength' => $__templater->func('max_length', array($__vars['property'], 'value_group', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Группирование значений',
		'explain' => 'Если это свойство не имеет той же группы значений, что и предыдущее, то будет вставлен визуальный разделитель.',
	)) . '
			</div>

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'group_name',
		'value' => $__vars['property']['group_name'],
	), $__compilerTemp1, array(
		'label' => 'Группа',
	)) . '

			' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['property']['display_order'],
	), $__vars) . '

			' . $__compilerTemp2 . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('style-properties//save', $__vars['property'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);