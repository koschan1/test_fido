<?php
// FROM HASH: f4c0aed96de6a6922ecc958bc9ce72ff
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['widget'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить виджет');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать виджет' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['widget']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['widget'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('widgets/delete', $__vars['widget'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['widgetPositions'])) {
		foreach ($__vars['widgetPositions'] AS $__vars['position']) {
			$__compilerTemp1[] = array(
				'selected' => $__vars['widget']['positions'][$__vars['position']['position_id']] !== null,
				'data-hide' => 'true',
				'label' => $__templater->escape($__vars['position']['title']),
				'_dependent' => array($__templater->formNumberBox(array(
				'name' => 'positions[' . $__vars['position']['position_id'] . ']',
				'value' => $__templater->filter($__vars['widget']['positions'][$__vars['position']['position_id']], array(array('default', array(1, )),), false),
				'min' => '0',
			))),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">

			' . $__templater->formRow('
				' . $__templater->escape($__vars['widgetDefinition']['title']) . '
				' . $__templater->formHiddenVal('definition_id', $__vars['widgetDefinition']['definition_id'], array(
	)) . '
			', array(
		'label' => 'Определение виджета',
		'explain' => $__templater->escape($__vars['widgetDefinition']['description']),
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'widget_key',
		'value' => $__vars['widget']['widget_key'],
		'maxlength' => $__templater->func('max_length', array($__vars['widget'], 'widget_key', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Ключ виджета',
		'hint' => 'Обязательное поле',
		'explain' => 'Укажите уникальный идентификатор для этого виджета. Это упрощает обращение к виджету, если он добавляется непосредственно в шаблон.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__vars['widget']['widget_id'] ? $__vars['widget']['MasterTitle']['phrase_text'] : ''),
	), array(
		'label' => 'Заголовок',
		'hint' => 'Не обязательно',
		'explain' => 'Вы можете указать собственный заголовок для данного виджета. Если Вы его не укажете, то для виджета будет использован заголовок по умолчанию. Примечание: не все виджеты поддерживают отображение собственного заголовка.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
		'listclass' => 'listColumns',
	), $__compilerTemp1, array(
		'label' => 'Позиции для отображения',
		'explain' => $__templater->filter('Виджеты, позиция которых не определена не будут нигде отображены, но Вы можете вызвать настраиваемый виджет непосредственно в нужных шаблонах, используя синтаксис: <code>&lt;xf:widget key="widget_key" /&gt;</code>.', array(array('raw', array()),), true),
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'display_condition',
		'value' => $__vars['widget']['display_condition'],
		'code' => 'true',
	), array(
		'label' => 'Условия отображения',
		'explain' => 'Должно быть введено как выражение шаблона стиля.',
	)) . '

			' . $__templater->filter($__templater->method($__vars['widget'], 'renderOptions', array()), array(array('raw', array()),), true) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('widgets/save', $__vars['widget'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);