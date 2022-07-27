<?php
// FROM HASH: 850111f06b31765318db94c46824bc1c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->func('is_editor_capable', array(), false)) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('editor.less');
		$__finalCompiled .= '

	';
		if ($__vars['fullEditorJs']) {
			$__finalCompiled .= '
		';
			$__templater->includeJs(array(
				'src' => 'vendor/froala/froala-compiled.full.js, xf/editor.js',
			));
			$__finalCompiled .= '
	';
		} else {
			$__finalCompiled .= '
		';
			$__templater->includeJs(array(
				'prod' => 'xf/editor-compiled.js',
				'dev' => 'vendor/froala/froala-compiled.js, xf/editor.js',
			));
			$__finalCompiled .= '
	';
		}
		$__finalCompiled .= '
	' . '

	<script class="js-editorToolbars" type="application/json">' . $__templater->filter($__vars['editorToolbars'], array(array('json', array()),array('raw', array()),), true) . '</script>
	<script class="js-editorToolbarSizes" type="application/json">' . $__templater->filter($__vars['editorToolbarSizes'], array(array('json', array()),array('raw', array()),), true) . '</script>
	<script class="js-editorDropdowns" type="application/json">' . $__templater->filter($__vars['editorDropdowns'], array(array('json', array()),array('raw', array()),), true) . '</script>
	<script class="js-editorLanguage" type="application/json">
		{
			"Align Center": "' . $__templater->filter('По центру', array(array('escape', array('json', )),), true) . '",
			"Align Left": "' . $__templater->filter('По левому краю', array(array('escape', array('json', )),), true) . '",
			"Align Right": "' . $__templater->filter('По правому краю', array(array('escape', array('json', )),), true) . '",
			"Align Justify": "' . $__templater->filter('Выравнивание текста', array(array('escape', array('json', )),), true) . '",
			"Align": "' . $__templater->filter('Выравнивание', array(array('escape', array('json', )),), true) . '",
			"Alignment": "' . $__templater->filter('Выравнивание', array(array('escape', array('json', )),), true) . '",
			"Back": "' . $__templater->filter('Назад', array(array('escape', array('json', )),), true) . '",
			"Bold": "' . $__templater->filter('Полужирный', array(array('escape', array('json', )),), true) . '",
			"By URL": "' . $__templater->filter('По URL', array(array('escape', array('json', )),), true) . '",
			"Clear Formatting": "' . $__templater->filter('Удалить форматирование', array(array('escape', array('json', )),), true) . '",
			"Code": "' . $__templater->filter('Код', array(array('escape', array('json', )),), true) . '",
			"Text Color": "' . $__templater->filter('Цвет текста', array(array('escape', array('json', )),), true) . '",
			"Decrease Indent": "' . $__templater->filter('Уменьшить отступ', array(array('escape', array('json', )),), true) . '",
			"Delete Draft": "' . $__templater->filter('Удалить черновик', array(array('escape', array('json', )),), true) . '",
			"Drafts": "' . $__templater->filter('Черновики', array(array('escape', array('json', )),), true) . '",
			"Drop image": "' . $__templater->filter('Перетащите изображение', array(array('escape', array('json', )),), true) . '",
			"Drop video": "' . $__templater->filter('Перетащите видео', array(array('escape', array('json', )),), true) . '",
			"Edit Link": "' . $__templater->filter('Редактировать ссылку', array(array('escape', array('json', )),), true) . '",
			"Font Family": "' . $__templater->filter('Шрифт', array(array('escape', array('json', )),), true) . '",
			"Font Size": "' . $__templater->filter('Размер шрифта', array(array('escape', array('json', )),), true) . '",
			"Normal": "' . $__templater->filter('Обычный', array(array('escape', array('json', )),), true) . '",
			"Heading 1": "' . $__templater->filter('Заголовок 1', array(array('escape', array('json', )),), true) . '",
			"Heading 2": "' . $__templater->filter('Заголовок 2', array(array('escape', array('json', )),), true) . '",
			"Heading 3": "' . $__templater->filter('Заголовок 3', array(array('escape', array('json', )),), true) . '",
			"Increase Indent": "' . $__templater->filter('Увеличить отступ', array(array('escape', array('json', )),), true) . '",
			"Inline Code": "' . $__templater->filter('Однострочный код', array(array('escape', array('json', )),), true) . '",
			"Insert GIF": "' . 'Вставить GIF' . '",
			"Insert Horizontal Line": "' . $__templater->filter('Вставить горизонтальную линию', array(array('escape', array('json', )),), true) . '",
			"Inline Spoiler": "' . $__templater->filter('Размытый текст', array(array('escape', array('json', )),), true) . '",
			"Insert Image": "' . $__templater->filter('Изображение', array(array('escape', array('json', )),), true) . '",
			"Insert Link": "' . $__templater->filter('Ссылка', array(array('escape', array('json', )),), true) . '",
			"Insert": "' . $__templater->filter('Вставить', array(array('escape', array('json', )),), true) . '",
			"Italic": "' . $__templater->filter('Курсив', array(array('escape', array('json', )),), true) . '",
			"List": "' . $__templater->filter('Список', array(array('escape', array('json', )),), true) . '",
			"Loading image": "' . $__templater->filter('Загрузка изображения', array(array('escape', array('json', )),), true) . '",
			"Media": "' . $__templater->filter('Медиа', array(array('escape', array('json', )),), true) . '",
			"More Text": "' . $__templater->filter('Дополнительные параметры' . $__vars['xf']['language']['ellipsis'], array(array('escape', array('json', )),), true) . '",
			"More Paragraph": "' . $__templater->filter('Дополнительные параметры' . $__vars['xf']['language']['ellipsis'], array(array('escape', array('json', )),), true) . '",
			"More Rich": "' . $__templater->filter('Дополнительные параметры' . $__vars['xf']['language']['ellipsis'], array(array('escape', array('json', )),), true) . '",
			"More Misc": "' . $__templater->filter('Дополнительные параметры' . $__vars['xf']['language']['ellipsis'], array(array('escape', array('json', )),), true) . '",
			"Open Link": "' . $__templater->filter('Перейти по ссылке', array(array('escape', array('json', )),), true) . '",
			"or click": "' . $__templater->filter('Или нажмите здесь', array(array('escape', array('json', )),), true) . '",
			"Ordered List": "' . $__templater->filter('Нумерованный список', array(array('escape', array('json', )),), true) . '",
			"Paragraph Format": "' . $__templater->filter('Формат абзаца', array(array('escape', array('json', )),), true) . '",
			"Preview": "' . $__templater->filter('Предварительный просмотр', array(array('escape', array('json', )),), true) . '",
			"Quote": "' . $__templater->filter('Цитата', array(array('escape', array('json', )),), true) . '",
			"Redo": "' . $__templater->filter('Повторить', array(array('escape', array('json', )),), true) . '",
			"Remove": "' . $__templater->filter('Удалить', array(array('escape', array('json', )),), true) . '",
			"Replace": "' . $__templater->filter('Заменить', array(array('escape', array('json', )),), true) . '",
			"Save Draft": "' . $__templater->filter('Сохранить черновик', array(array('escape', array('json', )),), true) . '",
			"Smilies": "' . $__templater->filter('Смайлы', array(array('escape', array('json', )),), true) . '",
			"Something went wrong. Please try again.": "' . $__templater->filter('Что-то пошло не так. Попробуйте ещё раз или обратитесь к администратору.', array(array('escape', array('json', )),), true) . '",
			"Spoiler": "' . $__templater->filter('Спойлер', array(array('escape', array('json', )),), true) . '",
			"Strikethrough": "' . $__templater->filter('Зачёркнутый', array(array('escape', array('json', )),), true) . '",
			"Text": "' . $__templater->filter('Текст', array(array('escape', array('json', )),), true) . '",
			"Toggle BB Code": "' . $__templater->filter('Переключение BB-кодов', array(array('escape', array('json', )),), true) . '",
			"Underline": "' . $__templater->filter('Подчёркнутый', array(array('escape', array('json', )),), true) . '",
			"Undo": "' . $__templater->filter('Отменить', array(array('escape', array('json', )),), true) . '",
			"Unlink": "' . $__templater->filter('Удалить ссылку', array(array('escape', array('json', )),), true) . '",
			"Unordered List": "' . $__templater->filter('Маркированный список', array(array('escape', array('json', )),), true) . '",
			"Update": "' . $__templater->filter('Обновить', array(array('escape', array('json', )),), true) . '",
			"Upload Image": "' . $__templater->filter('Загрузить изображение', array(array('escape', array('json', )),), true) . '",
			"Uploading": "' . $__templater->filter('Загрузка', array(array('escape', array('json', )),), true) . '",
			"URL": "' . $__templater->filter('URL-адрес', array(array('escape', array('json', )),), true) . '",
			"Insert Table": "' . $__templater->filter('Вставить таблицу', array(array('escape', array('json', )),), true) . '",
			"Table Header": "' . $__templater->filter('Заголовок таблицы', array(array('escape', array('json', )),), true) . '",
			"Remove Table": "' . $__templater->filter('Удалить таблицу', array(array('escape', array('json', )),), true) . '",
			"Row": "' . $__templater->filter('Строка', array(array('escape', array('json', )),), true) . '",
			"Column": "' . $__templater->filter('Колонка', array(array('escape', array('json', )),), true) . '",
			"Insert row above": "' . $__templater->filter('Вставить строку выше', array(array('escape', array('json', )),), true) . '",
			"Insert row below": "' . $__templater->filter('Вставить строку ниже', array(array('escape', array('json', )),), true) . '",
			"Delete row": "' . $__templater->filter('Удалить строку', array(array('escape', array('json', )),), true) . '",
			"Insert column before": "' . $__templater->filter('Вставить столбец до', array(array('escape', array('json', )),), true) . '",
			"Insert column after": "' . $__templater->filter('Вставить столбец после', array(array('escape', array('json', )),), true) . '",
			"Delete column": "' . $__templater->filter('Удалить колонку', array(array('escape', array('json', )),), true) . '",
			"Ctrl": "' . $__templater->filter('Ctrl', array(array('escape', array('json', )),), true) . '",
			"Shift": "' . $__templater->filter('Shift', array(array('escape', array('json', )),), true) . '",
			"Alt": "' . $__templater->filter('Alt', array(array('escape', array('json', )),), true) . '",
			"Insert Video": "' . $__templater->filter('Вставить видео', array(array('escape', array('json', )),), true) . '",
			"Upload Video": "' . $__templater->filter('Загрузить видео', array(array('escape', array('json', )),), true) . '",
			"Width": "' . $__templater->filter('Ширина', array(array('escape', array('json', )),), true) . '",
			"Height": "' . $__templater->filter('Высота', array(array('escape', array('json', )),), true) . '",
			"Change Size": "' . $__templater->filter('Изменить размер', array(array('escape', array('json', )),), true) . '",
			"None": "' . $__templater->filter('Нет', array(array('escape', array('json', )),), true) . '",
			"Alternative Text": "' . $__templater->filter('Альтернативный текст', array(array('escape', array('json', )),), true) . '",
			"__lang end__": ""
		}
	</script>

	<script class="js-editorCustom" type="application/json">
		' . $__templater->filter($__vars['customIcons'], array(array('json', array()),array('raw', array()),), true) . '
	</script>

	<script class="js-xfEditorMenu" type="text/template">
		<div class="menu" data-menu="menu" aria-hidden="true"
			data-href="' . $__templater->func('mustache', array('href', ), true) . '"
			data-load-target=".js-xfEditorMenuBody">
			<div class="menu-content">
				<div class="js-xfEditorMenuBody">
					<div class="menu-row">' . 'Загрузка' . $__vars['xf']['language']['ellipsis'] . '</div>
				</div>
			</div>
		</div>
	</script>

	<textarea name="' . $__templater->escape($__vars['htmlName']) . '"
		class="input js-editor u-jsOnly"
		data-xf-init="editor"
		data-original-name="' . $__templater->escape($__vars['name']) . '"
		data-buttons-remove="' . $__templater->filter($__vars['removeButtons'], array(array('join', array(',', )),), true) . '"
		style="visibility: hidden; height: ' . ($__vars['height'] + 37) . 'px; ' . $__templater->escape($__vars['styleAttr']) . '"
		aria-label="' . $__templater->filter('Текстовое поле с поддержкой форматирования', array(array('for_attr', array()),), true) . '"
		' . $__templater->filter($__vars['attrsHtml'], array(array('raw', array()),), true) . '>' . $__templater->escape($__vars['htmlValue']) . '</textarea>

	' . '

	<input type="hidden" value="' . $__templater->escape($__vars['value']) . '" data-bb-code="' . $__templater->escape($__vars['name']) . '" />

	<noscript>
		<textarea name="' . $__templater->escape($__vars['name']) . '" class="input" aria-label="' . $__templater->filter('Текстовое поле с поддержкой форматирования', array(array('for_attr', array()),), true) . '">' . $__templater->escape($__vars['value']) . '</textarea>
	</noscript>

';
	} else {
		$__finalCompiled .= '

	<textarea name="' . $__templater->escape($__vars['name']) . '" class="input input--fitHeight js-editor" style="min-height: ' . $__templater->escape($__vars['height']) . 'px; ' . $__templater->escape($__vars['styleAttr']) . '" data-xf-init="textarea-handler user-mentioner emoji-completer draft-trigger" aria-label="' . $__templater->filter('Текстовое поле с поддержкой форматирования', array(array('for_attr', array()),), true) . '" ' . $__templater->filter($__vars['attrsHtml'], array(array('raw', array()),), true) . '>' . $__templater->escape($__vars['value']) . '</textarea>

';
	}
	return $__finalCompiled;
}
);