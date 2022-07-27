<?php
// FROM HASH: dd16f693df1a880f646e887d4002d07d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['upgrade'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить повышение');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать повышение пользователей' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['upgrade']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['upgrade'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('user-upgrades/delete', $__vars['upgrade'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array();
	if ($__templater->isTraversable($__vars['profiles'])) {
		foreach ($__vars['profiles'] AS $__vars['profileId'] => $__vars['profile']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['profileId'],
				'label' => (($__vars['profile']['Provider']['title'] !== $__vars['profile']['title']) ? (($__templater->escape($__vars['profile']['Provider']['title']) . ' - ') . $__templater->escape($__vars['profile']['title'])) : $__templater->escape($__vars['profile']['Provider']['title'])),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['userGroups']);
	$__compilerTemp3 = '';
	if (!$__templater->test($__vars['upgrades'], 'empty', array())) {
		$__compilerTemp3 .= '
				';
		$__compilerTemp4 = $__templater->mergeChoiceOptions(array(), $__vars['upgrades']);
		$__compilerTemp3 .= $__templater->formCheckBoxRow(array(
			'name' => 'disabled_upgrade_ids',
			'value' => $__vars['upgrade']['disabled_upgrade_ids'],
			'listclass' => 'listColumns',
		), $__compilerTemp4, array(
			'label' => 'Отключить другие повышения прав',
			'explain' => 'Отключает выбранные повышения, если активно данное. Полезно в случае многоуровневых повышений.',
		)) . '
			';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['upgrade']['title'],
		'maxlength' => $__templater->func('max_length', array($__vars['upgrade'], 'title', ), false),
	), array(
		'label' => 'Заголовок',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'description',
		'value' => $__vars['upgrade']['description'],
		'autosize' => 'true',
	), array(
		'label' => 'Описание',
		'hint' => 'Можно использовать HTML',
	)) . '

			' . $__templater->callMacro('display_order_macros', 'row', array(
		'value' => ($__vars['upgrade']['display_order'] ?: 1),
	), $__vars) . '

			' . $__templater->formRow('

				<div class="inputGroup">
					' . $__templater->formTextBox(array(
		'name' => 'cost_amount',
		'value' => ($__vars['upgrade']['cost_amount'] ?: 5),
		'style' => 'width: 120px',
	)) . '
					<span class="inputGroup-splitter"></span>
					' . $__templater->callMacro('public:currency_macros', 'currency_list', array(
		'value' => ($__vars['upgrade']['cost_currency'] ?: 'USD'),
		'class' => 'input--autoSize',
	), $__vars) . '
				</div>

				<div class="formRow-explain">' . '<strong>Примечание:</strong> убедитесь, что Ваш аккаунт в выбранной платёжной системе поддерживает указанные выше валюты. Поддержка валют может варьироваться в зависимости от региона.' . '</div>
			', array(
		'rowtype' => 'input',
		'label' => 'Цена',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'length_type',
	), array(array(
		'value' => 'permanent',
		'selected' => $__vars['upgrade']['length_unit'] == '',
		'label' => 'Постоянно',
		'_type' => 'option',
	),
	array(
		'value' => 'timed',
		'selected' => $__vars['upgrade']['length_unit'] != '',
		'label' => 'На указанное время' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
						<div class="inputGroup">
							' . $__templater->formNumberBox(array(
		'name' => 'length_amount',
		'value' => ($__vars['upgrade']['length_amount'] ?: 1),
		'min' => '1',
	)) . '
							<span class="inputGroup-splitter"></span>
							' . $__templater->formSelect(array(
		'name' => 'length_unit',
		'value' => ((($__vars['upgrade']['length_unit'] == 'permanent') OR (!$__vars['upgrade']['length_amount'])) ? 'months' : $__vars['upgrade']['length_unit']),
		'class' => 'input--inline',
	), array(array(
		'value' => 'day',
		'label' => 'Дней',
		'_type' => 'option',
	),
	array(
		'value' => 'month',
		'label' => 'Месяцев',
		'_type' => 'option',
	),
	array(
		'value' => 'year',
		'label' => 'Лет',
		'_type' => 'option',
	))) . '
						</div>

					', '
						' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'recurring',
		'value' => '1',
		'selected' => $__vars['upgrade']['recurring'],
		'label' => 'Регулярный платёж',
		'hint' => 'Для поддержания повышения дополнительных прав доступа плата будет взиматься автоматически.<br />
<br />
<strong>Примечание:</strong> если включено, то все платёжные системы, назначенные этому платному повышению, должны поддерживать регулярные платежи.',
		'_type' => 'option',
	))) . '
					'),
		'_type' => 'option',
	)), array(
		'label' => 'Длительность',
	)) . '

			' . $__templater->formCheckBoxRow(array(
		'name' => 'payment_profile_ids',
		'value' => $__vars['upgrade']['payment_profile_ids'],
	), $__compilerTemp1, array(
		'label' => 'Платёжный профиль',
	)) . '

			' . $__templater->formCheckBoxRow(array(
		'name' => 'extra_group_ids',
		'value' => $__vars['upgrade']['extra_group_ids'],
		'listclass' => 'listColumns',
	), $__compilerTemp2, array(
		'label' => 'Дополнительные группы пользователей',
		'explain' => 'Поместить пользователя в выбранные группы, пока действует это повышение.',
	)) . '

			' . $__compilerTemp3 . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'can_purchase',
		'selected' => $__vars['upgrade']['can_purchase'],
		'label' => 'Можно купить',
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
		'action' => $__templater->func('link', array('user-upgrades/save', $__vars['upgrade'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);