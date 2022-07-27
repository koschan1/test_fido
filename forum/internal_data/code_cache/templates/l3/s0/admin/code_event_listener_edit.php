<?php
// FROM HASH: db2ac1d5fd6331b1524063ba8cc0eee9
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['listener'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить обработчик события');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать обработчик событий' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['listener']['event_id']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['listener'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('code-events/listeners/delete', $__vars['listener'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__templater->includeCss('code_event.less');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'_type' => 'option',
	));
	$__compilerTemp1 = $__templater->mergeChoiceOptions($__compilerTemp1, $__vars['events']);
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		<div class="block-body">
			' . $__templater->formSelectRow(array(
		'name' => 'event_id',
		'value' => $__vars['listener']['event_id'],
		'data-xf-init' => 'desc-loader',
		'data-desc-url' => $__templater->func('link', array('code-events/get-description', ), false),
	), $__compilerTemp1, array(
		'label' => 'Обрабатывать событие',
		'html' => '
					<div class="js-descTarget eventDescription" dir="ltr">' . $__templater->filter($__vars['listener']['Event']['description'], array(array('raw', array()),), true) . '</div>
				',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'hint',
		'value' => $__vars['listener']['hint'],
		'maxlength' => $__templater->func('max_length', array($__vars['listener'], 'hint', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'Подсказка события',
		'explain' => 'Когда срабатывают определённые события, они будут срабатывать с подсказкой. Эта подсказка может быть использована на ограничение обработчика, чтобы он выполнялся только когда это необходимо, увеличивая производительность.<br />
<br />
Если событие срабатывает с подсказкой, выше в описании события будут перечислены потенциальные значения подсказки. Если указать здесь подсказку, Ваш обработчик будет выполняться, только если она соответствует подсказке, указанной при срабатывании события.<br />
<br />
<strong>Примечание:</strong> если подсказка - это имя класса, то Вы должны опустить первый символ \\.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRow('
				' . $__templater->callMacro('helper_callback_fields', 'callback_fields', array(
		'data' => $__vars['listener'],
	), $__vars) . '
			', array(
		'rowtype' => 'input',
		'label' => 'Выполнить обработчик',
	)) . '

			' . $__templater->formNumberBoxRow(array(
		'name' => 'execute_order',
		'value' => $__vars['listener']['execute_order'],
		'min' => '0',
	), array(
		'label' => 'Порядок выполнения обработчика',
		'explain' => 'Меньший порядок выполнения будет работать в первую очередь. Обратите внимание, что обработчики, у которых определена подсказка события, всегда будут работать после обработчиков, у которых её нет.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'active',
		'selected' => $__vars['listener']['active'],
		'label' => 'Разрешить выполнение обработчика',
		'_type' => 'option',
	)), array(
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'description',
		'value' => $__vars['listener']['description'],
	), array(
		'label' => 'Описание',
	)) . '

			' . $__templater->callMacro('addon_macros', 'addon_edit', array(
		'addOnId' => $__vars['listener']['addon_id'],
	), $__vars) . '

			' . $__templater->formHiddenVal('event_listener_id', $__vars['listener']['event_listener_id'], array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('code-events/listeners/save', $__vars['listener'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);