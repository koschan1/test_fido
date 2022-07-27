<?php
// FROM HASH: a9ec2f3361ff296027c826f521f41306
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['site'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить медиа-сайт');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать медиа-сайт' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['site']['site_title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['site'], 'isUpdate', array()) AND $__templater->method($__vars['site'], 'canEdit', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('bb-code-media-sites/delete', $__vars['site'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	if (!$__templater->method($__vars['site'], 'canEdit', array())) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'В этом элементе можно отредактировать только некоторые поля.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['site'], 'canEdit', array())) {
		$__compilerTemp1 .= '
						' . 'В настоящее время Вы редактируете мастер-версию этого шаблона. Изменения не будут отображаться в модифицированных дочерних стилях.' . '
					';
	} else {
		$__compilerTemp1 .= '
						' . 'Вы не можете изменить мастер-версию этого шаблона. Чтобы внести изменения, Вы должны отредактировать соответствующий шаблон в каждом стиле.' . '
					';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'media_site_id',
		'value' => $__vars['site']['media_site_id'],
		'readonly' => ($__templater->method($__vars['site'], 'exists', array()) ? true : false),
		'maxlength' => $__templater->func('max_length', array($__vars['site'], 'media_site_id', ), false),
		'dir' => 'ltr',
	), array(
		'label' => 'ID медиа-сайта',
		'explain' => 'Используется в BB-коде media для идентификации сайта при загрузке. Нельзя изменить после установки.',
	)) . '

			' . $__templater->callMacro('addon_macros', 'addon_edit', array(
		'addOnId' => $__vars['site']['addon_id'],
	), $__vars) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'site_title',
		'value' => $__vars['site']['site_title'],
		'maxlength' => $__templater->func('max_length', array($__vars['site'], 'site_title', ), false),
		'readonly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
	), array(
		'label' => 'Название сайта',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'site_url',
		'value' => $__vars['site']['site_url'],
		'type' => 'url',
		'maxlength' => $__templater->func('max_length', array($__vars['site'], 'site_url', ), false),
		'readonly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
		'dir' => 'ltr',
	), array(
		'label' => 'URL-адрес сайта',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'supported',
		'value' => '1',
		'selected' => $__vars['site']['supported'],
		'label' => '
					' . 'Показывать этот сайт пользователям в списке поддерживаемых' . '
				',
		'_type' => 'option',
	)), array(
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'active',
		'value' => '1',
		'selected' => $__vars['site']['active'],
		'hint' => (($__vars['xf']['development'] AND $__vars['site']['addon_id']) ? 'Значение этого поля не будет изменено при обновлении плагина.' : ''),
		'label' => '
					' . 'Включено' . '
				',
		'_type' => 'option',
	)), array(
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextAreaRow(array(
		'name' => 'match_urls',
		'value' => $__vars['site']['match_urls'],
		'autosize' => 'true',
		'code' => 'true',
		'readonly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
		'dir' => 'ltr',
	), array(
		'label' => 'Совпадения URL-адресов',
		'explain' => 'Можно использовать * в качестве маски и {$id} в качестве указателя для ID медиа. Этот ID будет использоваться в коде встраивания. Вводите каждый URL-адрес с новой строки.',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'embed_html',
		'value' => ($__templater->method($__vars['site'], 'exists', array()) ? $__vars['site']['MasterTemplate']['template'] : ''),
		'mode' => 'html',
		'readonly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
		'class' => 'codeEditor--short',
	), array(
		'hint' => ($__templater->method($__vars['site'], 'isUpdate', array()) ? $__templater->escape($__templater->method($__vars['site'], 'getTemplateName', array())) : ''),
		'label' => 'Вставить шаблон',
		'explain' => '
					' . 'Введите {$id} там, где будет использоваться введённый пользователем ID медиа.' . '<br />
					<br />
					' . $__compilerTemp1 . '
				',
	)) . '
		</div>

		<h3 class="block-formSectionHeader">
			<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
				<span class="block-formSectionHeader-aligner">' . 'Настройки oEmbed' . '</span>
			</span>
		</h3>
		<div class="block-body block-body--collapsible">
			' . $__templater->formCheckBoxRow(array(
		'readonly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
	), array(array(
		'name' => 'oembed_enabled',
		'selected' => $__vars['site']['oembed_enabled'],
		'label' => 'Использовать oEmbed',
		'_type' => 'option',
	)), array(
		'explain' => 'oEmbed - открытый формат, созданный с целью упрощения внедрения содержимого одной веб-страницы в другую. В роли контента могут выступать фотографии, видеоролики, ссылки или другие типы данных. Если источник медиа предоставляет опцию oEmbed, то Вы можете получить расширенную информацию о запрошенном ресурсе и визуализировать HTML-код с ним.<br />
<br />
Примечание: если oEmbed включён, то любой HTML-код, указанный в поле \'HTML-код для вставки\' - будет проигнорирован, как и в поле \'Обработчик вставки HTML-кода\'. Кроме того, XenForo будет обрабатывать только ответы JSON от источников oEmbed.<br />
<br />
<a href="https://oembed.com" target="_blank">Больше информации и примеры на сайте oEmbed.com</a>',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'oembed_api_endpoint',
		'value' => $__vars['site']['oembed_api_endpoint'],
		'type' => 'url',
		'maxlength' => $__templater->func('max_length', array($__vars['site'], 'oembed_api_endpoint', ), false),
		'readonly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
		'dir' => 'ltr',
	), array(
		'label' => 'Конечная точка API oEmbed',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'oembed_url_scheme',
		'value' => $__vars['site']['oembed_url_scheme'],
		'type' => 'url',
		'maxlength' => $__templater->func('max_length', array($__vars['site'], 'oembed_url_scheme', ), false),
		'readonly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
		'dir' => 'ltr',
	), array(
		'label' => 'Схема URL oEmbed',
		'explain' => 'Введите URL-адрес, который можно запросить через oEmbed, включая {$id}, чтобы представить сопоставленный идентификатор медиа',
	)) . '

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'oembed_retain_scripts',
		'selected' => $__vars['site']['oembed_retain_scripts'],
		'readonly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
		'label' => 'Сохранять javascript в возвращённом oEmbed HTML',
		'_type' => 'option',
	)), array(
		'explain' => 'Выбрав этот параметр, Вы оставите любые теги &lt;script&gt; в возвращённом oEmbed HTML на месте. Если Вы отмените выбор этого параметра, то любая инициализация Javascript, требуемая возвращения HTML, должна будет обрабатываться с помощью Ваших собственных методов.',
	)) . '
		</div>

		<h3 class="block-formSectionHeader">
			<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up:next">
				<span class="block-formSectionHeader-aligner">' . 'Расширенные настройки' . '</span>
			</span>
		</h3>
		<div class="block-body block-body--collapsible">
			' . $__templater->formCheckBoxRow(array(
		'readonly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
	), array(array(
		'name' => 'match_is_regex',
		'selected' => $__vars['site']['match_is_regex'],
		'label' => 'Обрабатывать \'Совпадения URL-адреса\' как регулярные выражения PCRE',
		'_type' => 'option',
	)), array(
		'label' => 'Соответствие регулярному выражению',
		'explain' => 'Можно выбрать эту опцию и задать одно или несколько регулярных выражений вместо совпадающих URL-адресов. ID медиа должен быть определtн с помощью именованного шаблона \'id\'.<br />
<br />
Пример регулярного выражения, использующего именованный шаблон \'id\':<br />
<code>#https://www\\.example\\.com/video/(?P&lt;id&gt;\\d+/[a-z0-9_]+)/#siU</code>',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRow('
				' . $__templater->callMacro('helper_callback_fields', 'callback_fields', array(
		'namePrefix' => 'match_callback',
		'data' => $__vars['site'],
		'readOnly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
	), $__vars) . '
			', array(
		'rowtype' => 'input',
		'label' => 'Обработчик совпадений URL-адреса',
		'explain' => 'Некоторые сайты требуют дополнительных работ на странице по извлечению ID медиа, который потом используется во вставляемом HTML-коде.<br />
<br />
Обработчик должен возвращать уникальный ID медиа и иметь следующую сигнатуру::<br />
<br />
<code>public static function matchCallback($url, $matchedId, array $site, $siteId)</code>',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formRow('
				' . $__templater->callMacro('helper_callback_fields', 'callback_fields', array(
		'namePrefix' => 'embed_html_callback',
		'data' => $__vars['site'],
		'readOnly' => (!$__templater->method($__vars['site'], 'canEdit', array())),
	), $__vars) . '
			', array(
		'rowtype' => 'input',
		'label' => 'Обработчик вставки HTML-кода',
		'explain' => 'Этот необязательный обработчик полностью переопределяет стандартный метод embedHTML, предоставляя дополнительные возможности по управлению выводом.<br />
<br />
Обработчик должен возвращать HTML-строку и иметь следующую сигнатуру:<br />
<br />
<code>public static function myCallback($mediaKey, array $site, $siteId)</code>',
	)) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
		'html' => '
				' . $__templater->button('Сохранить и выйти', array(
		'type' => 'submit',
		'icon' => 'save',
		'name' => 'exit',
	), '', array(
	)) . '
			',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('bb-code-media-sites/save', $__vars['site'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);