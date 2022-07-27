<?php
// FROM HASH: b3e8cb97946be81cc15231d72c6185e5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['dropdown'], 'isInsert', array())) {
		$__compilerTemp1 .= '
		' . 'Добавить выпадающее меню' . '
	';
	} else {
		$__compilerTemp1 .= '
		' . 'Редактировать выпадающее меню' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['dropdown']['title']) . '
	';
	}
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('
	' . $__compilerTemp1 . '
');
	$__finalCompiled .= '

' . $__templater->callMacro('bb_code_button_manager_editor', 'setup', array(), $__vars) . '

';
	$__compilerTemp2 = '';
	if ($__templater->method($__vars['dropdown'], 'isInsert', array())) {
		$__compilerTemp2 .= '
					' . $__templater->formTextBoxRow(array(
			'name' => 'cmd',
		), array(
			'label' => 'ID команды',
		)) . '
				';
	} else {
		$__compilerTemp2 .= '
					' . $__templater->formRow($__templater->escape($__vars['dropdown']['cmd']), array(
			'label' => 'ID команды',
		)) . '
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				' . $__compilerTemp2 . '

				' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__templater->method($__vars['dropdown'], 'isUpdate', array()) ? $__vars['dropdown']['MasterTitle']['phrase_text'] : ''),
	), array(
		'label' => 'Заголовок',
	)) . '

				' . $__templater->formTextBoxRow(array(
		'name' => 'icon',
		'value' => $__vars['dropdown']['icon'],
	), array(
		'label' => 'Иконка',
		'explain' => 'Вы можете посмотреть иконки и их имена <a href="https://fontawesome.com/icons?d=gallery" target="_blank">здесь</a>.',
	)) . '

				' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => $__vars['dropdown']['display_order'],
	), $__vars) . '

				' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'active',
		'selected' => $__vars['dropdown']['active'],
		'label' => 'Выпадающее меню активно',
		'_type' => 'option',
	)), array(
		'label' => '',
	)) . '
			</div>
		</div>
	</div>

	<div class="block">
		<div class="block-container">
			<h2 class="block-header">
				' . 'Доступные кнопки' . '
			</h2>
			' . $__templater->callMacro('bb_code_button_manager_editor', 'toolbar_block', array(
		'buttons' => $__templater->func('array_keys', array($__vars['buttonData'], ), false),
		'buttonData' => $__vars['buttonData'],
		'toolbarType' => 'commandTrayDropdown',
		'displayTooltips' => true,
	), $__vars) . '

			<div class="block-row block-row--minor u-muted">
				' . 'Примечание: не все кнопки поддерживаются внутри выпадающих меню.' . '
			</div>
		</div>
	</div>

	<div class="block">
		<div class="block-container">
			<h2 class="block-header">
				' . 'Кнопки в выпадающем меню' . '
			</h2>

			' . $__templater->callMacro('bb_code_button_manager_editor', 'toolbar_block', array(
		'name' => 'buttons',
		'buttons' => $__vars['dropdown']['buttons'],
		'buttonData' => $__vars['buttonData'],
		'toolbarType' => 'toolbarDropdown',
	), $__vars) . '

			' . $__templater->formSubmitRow(array(
		'icon' => 'save',
	), array(
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('button-manager/dropdown/save', $__vars['dropdown'], ), false),
		'ajax' => 'true',
		'data-xf-init' => 'editor-manager',
		'data-command-tray-class' => '.js-dragList-commandTrayDropdown',
	));
	return $__finalCompiled;
}
);