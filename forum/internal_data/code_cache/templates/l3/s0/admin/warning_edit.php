<?php
// FROM HASH: c5cd02b450f0caddb50fa67b445a3cdb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['warning'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить предупреждение');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать предупреждение' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['warning']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['warning'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('warnings/delete', $__vars['warning'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['warning']['MasterTitle']['phrase_text'],
		'maxlength' => $__templater->func('max_length', array('XF:Warning', 'title', ), false),
	), array(
		'label' => 'Заголовок',
	)) . '

			' . $__templater->formNumberBoxRow(array(
		'name' => 'points_default',
		'value' => $__vars['warning']['points_default'],
		'min' => '0',
		'max' => '65535',
	), array(
		'label' => 'Баллы за нарушения',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'expiry_type_base',
	), array(array(
		'value' => 'never',
		'selected' => $__vars['warning']['expiry_type'] == 'never',
		'label' => 'Никогда',
		'_type' => 'option',
	),
	array(
		'value' => 'other',
		'selected' => $__vars['warning']['expiry_type'] != 'never',
		'label' => 'Через' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
						<div class="inputGroup">
							' . $__templater->formNumberBox(array(
		'name' => 'expiry_default',
		'value' => ($__vars['warning']['expiry_default'] ? $__vars['warning']['expiry_default'] : 1),
		'min' => '0',
	)) . '
							<span class="inputGroup-splitter"></span>
							' . $__templater->formSelect(array(
		'name' => 'expiry_type',
		'value' => (($__vars['warning']['expiry_type'] == 'never') ? 'months' : $__vars['warning']['expiry_type']),
		'class' => 'input--inline',
	), array(array(
		'value' => 'days',
		'label' => 'Дней',
		'_type' => 'option',
	),
	array(
		'value' => 'weeks',
		'label' => 'Недель',
		'_type' => 'option',
	),
	array(
		'value' => 'months',
		'label' => 'Месяцев',
		'_type' => 'option',
	),
	array(
		'value' => 'years',
		'label' => 'Лет',
		'_type' => 'option',
	))) . '
						</div>

					'),
		'_type' => 'option',
	)), array(
		'label' => 'Истечение баллов',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'is_editable',
		'selected' => $__vars['warning']['is_editable'],
		'label' => 'Количество баллов и время истечения можно редактировать после выдачи предупреждения',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->formCheckBoxRow(array(
		'name' => 'extra_user_group_ids',
		'value' => $__vars['warning']['extra_user_group_ids'],
	), $__compilerTemp1, array(
		'label' => 'Дополнительные группы пользователей',
		'explain' => 'Пользователь, получивший данное предупреждение, может быть добавлен в определённые группы пользователей, пока не истечёт срок предупреждения.',
	)) . '
		</div>

		<h3 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Настройки личной переписки' . '</span></h3>
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'conversation_title',
		'maxlength' => $__templater->func('max_length', array('XF:ConversationMaster', 'title', ), false),
		'value' => $__vars['warning']['MasterConversationTitle']['phrase_text'],
	), array(
		'label' => 'Заголовок по умолчанию',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'conversation_text',
		'value' => $__vars['warning']['MasterConversationText']['phrase_text'],
		'autosize' => 'true',
	), array(
		'label' => 'Текст по умолчанию',
		'explain' => 'Можно использовать следующие макросы: {title}, {content} и {url} , чтобы динамически вставлять информацию содержимого; {name} , чтобы вставлять имя пользователя, получающего предупреждение; и {staff} , чтобы вставить имя члена команды, выдающего предупреждение. Можно использовать BB-коды.',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'icon' => 'save',
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('warnings/save', $__vars['warning'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);