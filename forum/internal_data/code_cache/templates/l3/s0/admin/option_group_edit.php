<?php
// FROM HASH: a7e077e5e67950a607bf3cba8da797cf
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['group'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить группу настроек');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать группу настроек' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['group']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['group'], 'isUpdate', array())) {
		$__finalCompiled .= '
	';
		$__templater->breadcrumb($__templater->preEscaped($__templater->escape($__vars['group']['title'])), $__templater->func('link', array('options/groups', $__vars['group'], ), false), array(
		));
		$__finalCompiled .= '

	';
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
		' . $__templater->button('', array(
			'href' => $__templater->func('link', array('options/groups/delete', $__vars['group'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
	');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">

			' . $__templater->formTextBoxRow(array(
		'name' => 'group_id',
		'value' => $__vars['group']['group_id'],
		'dir' => 'ltr',
	), array(
		'label' => 'ID группы',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__templater->method($__vars['group'], 'exists', array()) ? $__vars['group']['MasterTitle']['phrase_text'] : ''),
	), array(
		'label' => 'Заголовок',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'description',
		'value' => ($__templater->method($__vars['group'], 'exists', array()) ? $__vars['group']['MasterDescription']['phrase_text'] : ''),
		'autosize' => 'true',
	), array(
		'label' => 'Описание',
		'hint' => 'Можно использовать HTML',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'icon',
		'value' => $__vars['group']['icon'],
	), array(
		'label' => 'Иконка',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['group']['display_order'],
	), $__vars) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'advanced',
		'selected' => $__vars['group']['advanced'],
		'label' => 'Показывать только в расширенном режиме',
		'_type' => 'option',
	),
	array(
		'name' => 'debug_only',
		'selected' => $__vars['group']['debug_only'],
		'label' => 'Отображать эту группу только в режиме отладки',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->callMacro('addon_macros', 'addon_edit', array(
		'addOnId' => $__vars['group']['addon_id'],
	), $__vars) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('options/groups/save', $__vars['group'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);