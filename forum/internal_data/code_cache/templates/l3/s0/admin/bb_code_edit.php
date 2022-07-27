<?php
// FROM HASH: 9de31929f030ac68a0af4ec3102ddb65
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['bbCode'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить BB-код');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать BB-код' . $__vars['xf']['language']['label_separator'] . ' [' . $__templater->escape($__vars['bbCode']['bb_code_id']) . ']');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['bbCode'], 'isUpdate', array()) AND $__templater->method($__vars['bbCode'], 'canEdit', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('bb-codes/delete', $__vars['bbCode'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	if ((!$__templater->method($__vars['bbCode'], 'canEdit', array()))) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'В этом элементе можно отредактировать только некоторые поля.' . '
	</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">

		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'bb_code_id',
		'value' => $__vars['bbCode']['bb_code_id'],
		'maxlength' => $__templater->func('max_length', array($__vars['bbCode'], 'bb_code_id', ), false),
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
		'dir' => 'ltr',
	), array(
		'label' => 'Тег BB-кода',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'title',
		'value' => ($__templater->method($__vars['bbCode'], 'exists', array()) ? $__vars['bbCode']['MasterTitle']['phrase_text'] : ''),
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(
		'label' => 'Заголовок',
	)) . '
			' . $__templater->formTextAreaRow(array(
		'name' => 'desc',
		'value' => ($__templater->method($__vars['bbCode'], 'exists', array()) ? $__vars['bbCode']['MasterDesc']['phrase_text'] : ''),
		'autosize' => 'true',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(
		'label' => 'Описание',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'bb_code_mode',
		'value' => $__vars['bbCode']['bb_code_mode'],
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(array(
		'value' => 'replace',
		'label' => 'Простая замена',
		'_type' => 'option',
	),
	array(
		'value' => 'callback',
		'label' => 'PHP-обработчик',
		'_type' => 'option',
	)), array(
		'label' => 'Режим замены',
	)) . '

			' . $__templater->formRadioRow(array(
		'name' => 'has_option',
		'value' => $__vars['bbCode']['has_option'],
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(array(
		'value' => 'yes',
		'label' => 'Да',
		'_type' => 'option',
	),
	array(
		'value' => 'no',
		'label' => 'Нет',
		'_type' => 'option',
	),
	array(
		'value' => 'optional',
		'explain' => 'Этот тег будет работать как с указанной опцией, так и без неё. Наиболее часто используется с PHP-обработчиками.',
		'label' => '
					' . 'Не обязательно' . '
				',
		'_type' => 'option',
	)), array(
		'label' => 'Опция BB-кода',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'replace_html',
		'value' => $__vars['bbCode']['replace_html'],
		'mode' => 'html',
		'data-line-wrapping' => 'true',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
		'class' => 'codeEditor--autoSize',
	), array(
		'label' => 'Замена HTML',
		'explain' => 'Используйте {option} для содержимого внутри опции BB-кода (если указана) и {text} для внутреннего содержимого BB-кода.',
	)) . '

			' . $__templater->callMacro('helper_callback_fields', 'callback_row', array(
		'label' => 'PHP-обработчик',
		'explain' => 'Этот обработчик получит на вход следующие параметры: $tagChildren, $tagOption, $tag,  array $options, \\XF\\BbCode\\Renderer\\AbstractRenderer $renderer.',
		'data' => $__vars['bbCode'],
		'readOnly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), $__vars) . '

			<hr class="formRowSep" />

			' . $__templater->formRadioRow(array(
		'name' => 'editor_icon_type',
		'value' => $__vars['bbCode']['editor_icon_type'],
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(array(
		'value' => '',
		'label' => 'Нет',
		'_type' => 'option',
	),
	array(
		'value' => 'fa',
		'label' => 'Иконка Font Awesome',
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'editor_icon_fa',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
		'value' => (($__vars['bbCode']['editor_icon_type'] == 'fa') ? $__vars['bbCode']['editor_icon_value'] : ''),
		'maxlength' => $__templater->func('max_length', array($__vars['bbCode'], 'editor_icon_value', ), false),
		'dir' => 'ltr',
	))),
		'_type' => 'option',
	),
	array(
		'value' => 'image',
		'label' => 'Изображение',
		'_dependent' => array($__templater->formAssetUpload(array(
		'name' => 'editor_icon_image',
		'asset' => 'editor_icons',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
		'value' => (($__vars['bbCode']['editor_icon_type'] == 'image') ? $__vars['bbCode']['editor_icon_value'] : ''),
		'maxlength' => $__templater->func('max_length', array($__vars['bbCode'], 'editor_icon_value', ), false),
		'dir' => 'ltr',
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Иконка редактора',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextAreaRow(array(
		'name' => 'example',
		'value' => ($__templater->method($__vars['bbCode'], 'exists', array()) ? $__vars['bbCode']['MasterExample']['phrase_text'] : ''),
		'autosize' => 'true',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(
		'label' => 'Пример использования',
		'explain' => 'Если пример указан, то BB-код появится на странице помощи по BB-кодам.',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'output',
		'value' => ($__templater->method($__vars['bbCode'], 'exists', array()) ? $__vars['bbCode']['MasterOutput']['phrase_text'] : ''),
		'autosize' => 'true',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(
		'label' => 'Пример вывода',
		'explain' => 'Управление способом отображения примера на странице помощи по BB-кодам. Если вывод не указан, то вместо него будет отображаться пример.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'allow_signature',
		'value' => '1',
		'selected' => $__vars['bbCode']['allow_signature'],
		'label' => '
					' . 'Разрешить использование этого BB-кода в подписях' . '
				',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'active',
		'value' => '1',
		'selected' => $__vars['bbCode']['active'],
		'hint' => (($__vars['xf']['development'] AND $__vars['bbCode']['addon_id']) ? 'Значение этого поля не будет изменено при обновлении плагина.' : ''),
		'label' => '
					' . 'Включено' . '
				',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->callMacro('addon_macros', 'addon_edit', array(
		'addOnId' => $__vars['bbCode']['addon_id'],
	), $__vars) . '
		</div>

		<h3 class="block-formSectionHeader">
			<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
				<span class="block-formSectionHeader-aligner">' . 'Расширенные настройки' . '</span>
			</span>
		</h3>
		<div class="block-body block-body--collapsible">
			' . $__templater->formTextAreaRow(array(
		'name' => 'option_regex',
		'value' => $__vars['bbCode']['option_regex'],
		'code' => 'true',
		'autosize' => 'true',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(
		'label' => 'Проверка опции по регулярному выражению',
		'explain' => 'Если указано, то BB-код будет корректным только если опция будет соответствовать регулярному выражению. Регулярное выражение должно содержать разделители и модификаторы.',
	)) . '

			' . $__templater->formCheckBoxRow(array(
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(array(
		'name' => 'disable_smilies',
		'value' => '1',
		'selected' => $__vars['bbCode']['disable_smilies'],
		'label' => '
					' . 'Отключить смайлы' . '
				',
		'_type' => 'option',
	),
	array(
		'name' => 'disable_nl2br',
		'value' => '1',
		'selected' => $__vars['bbCode']['disable_nl2br'],
		'label' => '
					' . 'Отключить преобразование разрывов строк' . '
				',
		'_type' => 'option',
	),
	array(
		'name' => 'disable_autolink',
		'value' => '1',
		'selected' => $__vars['bbCode']['disable_autolink'],
		'label' => '
					' . 'Отключить авто-определение ссылок' . '
				',
		'_type' => 'option',
	),
	array(
		'name' => 'plain_children',
		'value' => '1',
		'selected' => $__vars['bbCode']['plain_children'],
		'label' => '
					' . 'Остановить обработку BB-кода' . '
				',
		'_type' => 'option',
	)), array(
		'label' => 'В этом BB-коде',
	)) . '

			' . $__templater->formCheckBoxRow(array(
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(array(
		'name' => 'allow_empty',
		'value' => '1',
		'selected' => $__vars['bbCode']['allow_empty'],
		'label' => 'Отображать замену HTML, если пусто',
		'explain' => 'Если включено, замена HTML будет отображаться, даже если внутри BB-кода не будет текста. Как правило, пустой BB-код просто игнорируется.',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->formNumberBoxRow(array(
		'name' => 'trim_lines_after',
		'value' => $__vars['bbCode']['trim_lines_after'],
		'min' => '0',
		'max' => '10',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
	), array(
		'label' => 'Очистка переводов строк после BB-кода',
		'explain' => 'Для блочного BB-кода может понадобиться игнорировать 1 или 2 перевода строк после него. Эта настройка позволяет избежать появления дополнительных переводов строки после BB-кода, если пользователь поместил его на отдельной строке.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCodeEditorRow(array(
		'name' => 'replace_html_email',
		'value' => $__vars['bbCode']['replace_html_email'],
		'mode' => 'html',
		'data-line-wrapping' => 'true',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
		'class' => 'codeEditor--autoSize',
	), array(
		'label' => 'HTML-замена для писем',
		'explain' => 'Если указано, это заменит настройку "HTML-замена" для HTML писем. Если оставить пустым, то будет использовано значение настройки "HTML-замена".',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'replace_text',
		'value' => $__vars['bbCode']['replace_text'],
		'mode' => 'text',
		'data-line-wrapping' => 'true',
		'readonly' => (!$__templater->method($__vars['bbCode'], 'canEdit', array())),
		'class' => 'codeEditor--autoSize',
	), array(
		'label' => 'Замена текста',
		'explain' => 'Если указано, этот текст замены будет использован при преобразовании BB-кода в текст. Если оставить пустым, сам BB-код будет проигнорирован, останется только текст внутри него.',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
	)) . '
	</div>

', array(
		'action' => $__templater->func('link', array('bb-codes/save', $__vars['bbCode'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);