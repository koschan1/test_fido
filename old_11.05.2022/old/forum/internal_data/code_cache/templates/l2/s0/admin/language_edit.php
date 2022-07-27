<?php
// FROM HASH: cb457394b8fbe501bbc1b1be26496887
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['language'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить язык');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать язык' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['language']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['language'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('languages/delete', $__vars['language'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => '0',
		'label' => $__vars['xf']['language']['parenthesis_open'] . 'Нет родителя' . $__vars['xf']['language']['parenthesis_close'],
		'_type' => 'option',
	));
	$__compilerTemp2 = $__templater->method($__vars['languageTree'], 'getFlattened', array(1, ));
	if ($__templater->isTraversable($__compilerTemp2)) {
		foreach ($__compilerTemp2 AS $__vars['treeEntry']) {
			$__compilerTemp1[] = array(
				'value' => $__vars['treeEntry']['record']['language_id'],
				'label' => $__templater->func('repeat', array('--', $__vars['treeEntry']['depth'], ), true) . ' ' . $__templater->escape($__vars['treeEntry']['record']['title']),
				'_type' => 'option',
			);
		}
	}
	$__compilerTemp3 = array(array(
		'value' => '',
		'label' => '&nbsp;',
		'_type' => 'option',
	));
	$__compilerTemp3 = $__templater->mergeChoiceOptions($__compilerTemp3, $__vars['locales']);
	$__compilerTemp4 = $__templater->mergeChoiceOptions(array(), $__vars['dateFormats']);
	$__compilerTemp4[] = array(
		'value' => '',
		'selected' => !$__vars['dateFormats'][$__vars['language']['date_format']],
		'label' => 'Другое',
		'_dependent' => array('
						' . $__templater->formTextBox(array(
		'name' => 'date_format_other',
		'value' => ($__vars['dateFormats'][$__vars['language']['date_format']] ? '' : $__vars['language']['date_format']),
		'size' => '15',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'date_format', ), false),
		'dir' => 'ltr',
	)) . '
						<p class="formRow-explain">' . 'Используйте <a href="https://php.net/manual/ru/function.date.php" target="_blank">формат даты</a> PHP' . '</p>
					'),
		'_type' => 'option',
	);
	$__compilerTemp5 = $__templater->mergeChoiceOptions(array(), $__vars['timeFormats']);
	$__compilerTemp5[] = array(
		'value' => '',
		'selected' => !$__vars['timeFormats'][$__vars['language']['time_format']],
		'label' => 'Другое',
		'_dependent' => array('
						' . $__templater->formTextBox(array(
		'name' => 'time_format_other',
		'value' => ($__vars['timeFormats'][$__vars['language']['time_format']] ? '' : $__vars['language']['time_format']),
		'size' => '15',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'time_format', ), false),
		'dir' => 'ltr',
	)) . '
						<p class="formRow-explain">' . 'Используйте <a href="https://php.net/manual/ru/function.date.php" target="_blank">формат времени</a> PHP' . '</p>
					'),
		'_type' => 'option',
	);
	$__compilerTemp6 = $__templater->mergeChoiceOptions(array(), $__vars['currencyFormats']);
	$__compilerTemp6[] = array(
		'value' => '',
		'selected' => !$__vars['currencyFormats'][$__vars['language']['currency_format']],
		'label' => 'Другое',
		'_dependent' => array('
						' . $__templater->formTextBox(array(
		'name' => 'currency_format_other',
		'value' => ($__vars['currencyFormats'][$__vars['language']['currency_format']] ? '' : $__vars['language']['currency_format']),
		'size' => '15',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'currency_format', ), false),
	)) . '
						<p class="formRow-explain">' . 'Вы можете использовать {symbol} для замены на данный символ валюты и {value} для замены на данное значение.

' . '</p>
					'),
		'_type' => 'option',
	);
	$__compilerTemp7 = '';
	if (!$__templater->test($__vars['quickPhrases'], 'empty', array())) {
		$__compilerTemp7 .= '
			<h3 class="block-formSectionHeader">
				<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
					<span class="block-formSectionHeader-aligner">' . 'Основные пользовательские фразы' . '</span>
				</span>
			</h3>
			<div class="block-body block-body--collapsible">
				' . $__templater->formTextAreaRow(array(
			'name' => 'quick_phrases[privacy_policy_text]',
			'value' => $__vars['quickPhrases']['privacy_policy_text']['phrase_text'],
			'autosize' => 'true',
			'class' => 'input--fitHeight--short',
		), array(
			'label' => 'Политика конфиденциальности',
			'hint' => 'Можно использовать HTML',
		)) . '

				' . $__templater->formTextAreaRow(array(
			'name' => 'quick_phrases[terms_rules_text]',
			'value' => $__vars['quickPhrases']['terms_rules_text']['phrase_text'],
			'autosize' => 'true',
			'class' => 'input--fitHeight--short',
		), array(
			'label' => 'Условия и правила',
			'hint' => 'Можно использовать HTML',
		)) . '

				' . $__templater->formTextAreaRow(array(
			'name' => 'quick_phrases[extra_copyright]',
			'value' => $__vars['quickPhrases']['extra_copyright']['phrase_text'],
			'autosize' => 'true',
			'class' => 'input--fitHeight--short',
		), array(
			'label' => 'Дополнительный копирайт в нижнем колонтитуле',
			'hint' => 'Можно использовать HTML',
		)) . '

				' . $__templater->formTextAreaRow(array(
			'name' => 'quick_phrases[email_footer_html]',
			'value' => $__vars['quickPhrases']['email_footer_html']['phrase_text'],
			'autosize' => 'true',
			'class' => 'input--fitHeight--short',
		), array(
			'label' => 'Дополнительный нижний колонтитул в электронных письмах (HTML)',
			'hint' => 'Можно использовать HTML',
		)) . '

				' . $__templater->formTextAreaRow(array(
			'name' => 'quick_phrases[email_footer_text]',
			'value' => $__vars['quickPhrases']['email_footer_text']['phrase_text'],
			'autosize' => 'true',
			'class' => 'input--fitHeight--short',
		), array(
			'label' => 'Дополнительный нижний колонтитул в электронных письмах (простой текст)',
		)) . '
			</div>
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => $__vars['language']['title'],
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'title', ), false),
	), array(
		'label' => 'Заголовок',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'parent_id',
		'value' => $__vars['language']['parent_id'],
	), $__compilerTemp1, array(
		'label' => 'Родительский язык',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'language_code',
		'value' => $__vars['language']['language_code'],
	), $__compilerTemp3, array(
		'label' => 'Язык',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'text_direction',
		'value' => $__vars['language']['text_direction'],
	), array(array(
		'value' => 'LTR',
		'label' => 'Слева направо',
		'_type' => 'option',
	),
	array(
		'value' => 'RTL',
		'label' => 'Cправа налево',
		'_type' => 'option',
	)), array(
		'label' => 'Направление текста',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user_selectable',
		'selected' => $__vars['language']['user_selectable'],
		'label' => '
					' . 'Разрешить выбирать пользователям' . '
				',
		'_type' => 'option',
	)), array(
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'decimal_point',
		'value' => $__vars['language']['decimal_point'],
		'size' => '5',
		'class' => 'input--autoSize',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'decimal_point', ), false),
	), array(
		'label' => 'Символ десятичной точки',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'thousands_separator',
		'value' => $__vars['language']['thousands_separator'],
		'size' => '5',
		'class' => 'input--autoSize',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'thousands_separator', ), false),
	), array(
		'label' => 'Разделитель тысяч',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'label_separator',
		'value' => $__vars['language']['label_separator'],
		'size' => '5',
		'class' => 'input--autoSize',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'label_separator', ), false),
	), array(
		'label' => 'Разделитель ярлыков',
		'explain' => 'Это используется для разделения ярлыков от их значений.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'comma_separator',
		'value' => $__vars['language']['comma_separator'],
		'size' => '5',
		'class' => 'input--autoSize',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'comma_separator', ), false),
	), array(
		'label' => 'Разделитель запятой',
		'explain' => 'Это используется как разделитель в списках значений. При необходимости укажите пробел в конце.',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'ellipsis',
		'value' => $__vars['language']['ellipsis'],
		'size' => '5',
		'class' => 'input--autoSize',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'ellipsis', ), false),
	), array(
		'label' => 'Символ многоточия',
	)) . '

			' . $__templater->formRow('

				<div class="inputGroup">
					' . $__templater->formTextBox(array(
		'name' => 'parenthesis_open',
		'value' => $__vars['language']['parenthesis_open'],
		'size' => '5',
		'class' => 'input--autoSize',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'parenthesis_open', ), false),
	)) . '
					<span class="inputGroup-splitter"></span>
					' . $__templater->formTextBox(array(
		'name' => 'parenthesis_close',
		'value' => $__vars['language']['parenthesis_close'],
		'size' => '5',
		'class' => 'input--autoSize',
		'maxlength' => $__templater->func('max_length', array($__vars['language'], 'parenthesis_close', ), false),
	)) . '
				</div>
			', array(
		'label' => 'Символы скобок',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'week_start',
		'value' => $__vars['language']['week_start'],
	), array(array(
		'value' => '0',
		'label' => 'Воскресенье',
		'_type' => 'option',
	),
	array(
		'value' => '1',
		'label' => 'Понедельник',
		'_type' => 'option',
	),
	array(
		'value' => '2',
		'label' => 'Вторник',
		'_type' => 'option',
	),
	array(
		'value' => '3',
		'label' => 'Среда',
		'_type' => 'option',
	),
	array(
		'value' => '4',
		'label' => 'Четверг',
		'_type' => 'option',
	),
	array(
		'value' => '5',
		'label' => 'Пятница',
		'_type' => 'option',
	),
	array(
		'value' => '6',
		'label' => 'Суббота',
		'_type' => 'option',
	)), array(
		'label' => 'День начала недели',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'date_format',
		'value' => $__vars['language']['date_format'],
	), $__compilerTemp4, array(
		'label' => 'Формат даты',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRadioRow(array(
		'name' => 'time_format',
		'value' => $__vars['language']['time_format'],
	), $__compilerTemp5, array(
		'label' => 'Формат времени',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRadioRow(array(
		'name' => 'currency_format',
		'value' => $__vars['language']['currency_format'],
	), $__compilerTemp6, array(
		'label' => 'Формат валюты',
	)) . '

		</div>

		' . $__compilerTemp7 . '

		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('languages/save', $__vars['language'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);