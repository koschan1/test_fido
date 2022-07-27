<?php
// FROM HASH: e49bbbc0a87a1e529a09384bb3c715d4
return array(
'macros' => array('editor_setup' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'modeConfig' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<script class="js-codeEditorLanguage" type="application/json">
		{
			"All": "' . $__templater->filter('Все', array(array('escape', array('json', )),), true) . '",
			"Identical text collapsed. Click to expand.": "' . $__templater->filter('Идентичный текст свернут. Нажмите, чтобы развернуть.', array(array('escape', array('json', )),), true) . '",
			"Jump to line:": "' . $__templater->filter('Перейти к строке' . $__vars['xf']['language']['label_separator'], array(array('escape', array('json', )),), true) . '",
			"No": "' . $__templater->filter('Нет', array(array('escape', array('json', )),), true) . '",
			"Push to left": "' . $__templater->filter('Нажмите влево', array(array('escape', array('json', )),), true) . '",
			"Replace all:": "' . $__templater->filter('Заменить все' . $__vars['xf']['language']['label_separator'], array(array('escape', array('json', )),), true) . '",
			"Replace with:": "' . $__templater->filter('Заменить на' . $__vars['xf']['language']['label_separator'], array(array('escape', array('json', )),), true) . '",
			"Replace:": "' . $__templater->filter('Заменить' . $__vars['xf']['language']['label_separator'], array(array('escape', array('json', )),), true) . '",
			"Replace?": "' . $__templater->filter('Заменить?', array(array('escape', array('json', )),), true) . '",
			"Revert chunk": "' . $__templater->filter('Вернуть кусок', array(array('escape', array('json', )),), true) . '",
			"Search:": "' . $__templater->filter('Поиск' . $__vars['xf']['language']['label_separator'], array(array('escape', array('json', )),), true) . '",
			"Stop": "' . $__templater->filter('Остановить', array(array('escape', array('json', )),), true) . '",
			"Toggle locked scrolling": "' . $__templater->filter('Переключить заблокированную прокрутку', array(array('escape', array('json', )),), true) . '",
			"(Use /re/ syntax for regexp search)": "' . $__templater->filter('(Используйте синтаксис /re/ для поиска по регулярному выражению)', array(array('escape', array('json', )),), true) . '",
			"(Use line:column or scroll% syntax)": "' . $__templater->filter('(Используйте синтаксис строки:столбца или прокрутки%)', array(array('escape', array('json', )),), true) . '",
			"With:": "' . $__templater->filter('С' . $__vars['xf']['language']['label_separator'], array(array('escape', array('json', )),), true) . '",
			"Yes": "' . $__templater->filter('Да', array(array('escape', array('json', )),), true) . '"
		}
	</script>
	';
	$__templater->includeJs(array(
		'src' => 'vendor/codemirror/codemirror.min.js',
	));
	$__finalCompiled .= '

	';
	if ($__vars['modeConfig']['addons']) {
		$__finalCompiled .= '
		';
		if ($__templater->func('is_array', array($__vars['modeConfig']['addons'], ), false)) {
			$__finalCompiled .= '
			';
			if ($__templater->isTraversable($__vars['modeConfig']['addons'])) {
				foreach ($__vars['modeConfig']['addons'] AS $__vars['addon']) {
					$__finalCompiled .= '
				';
					$__templater->includeJs(array(
						'src' => 'vendor/codemirror/addon/' . $__vars['addon'] . '.min.js',
					));
					$__finalCompiled .= '
			';
				}
			}
			$__finalCompiled .= '
		';
		} else {
			$__finalCompiled .= '
			';
			$__templater->includeJs(array(
				'src' => 'vendor/codemirror/addon/' . $__vars['modeConfig']['addons'] . '.min.js',
			));
			$__finalCompiled .= '
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	if ($__vars['modeConfig']['modes']) {
		$__finalCompiled .= '
		';
		if ($__templater->func('is_array', array($__vars['modeConfig']['modes'], ), false)) {
			$__finalCompiled .= '
			';
			if ($__templater->isTraversable($__vars['modeConfig']['modes'])) {
				foreach ($__vars['modeConfig']['modes'] AS $__vars['mode']) {
					$__finalCompiled .= '
				';
					$__templater->includeJs(array(
						'src' => 'vendor/codemirror/mode/' . $__vars['mode'] . '/' . $__vars['mode'] . '.min.js',
					));
					$__finalCompiled .= '
			';
				}
			}
			$__finalCompiled .= '
		';
		} else {
			$__finalCompiled .= '
			';
			$__templater->includeJs(array(
				'src' => 'vendor/codemirror/mode/' . $__vars['modeConfig']['modes'] . '/' . $__vars['modeConfig']['modes'] . '.min.js',
			));
			$__finalCompiled .= '
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '

	';
	$__templater->includeJs(array(
		'src' => 'xf/code_editor.js',
		'min' => '1',
	));
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->includeCss('code_editor.less');
	$__finalCompiled .= '

' . $__templater->callMacro(null, 'editor_setup', array(
		'modeConfig' => $__vars['modeConfig'],
	), $__vars) . '

<textarea name="' . $__templater->escape($__vars['name']) . '"
	class="input input--code codeEditor' . ($__vars['extraClasses'] ? (' ' . $__templater->escape($__vars['extraClasses'])) : '') . ' js-codeEditor u-jsOnly"
	dir="ltr"
	rows="' . $__templater->escape($__vars['rows']) . '"
	data-xf-init="code-editor"
	data-mode="' . ($__templater->escape($__vars['modeConfig']['mime']) ?: $__templater->filter($__vars['modeConfig']['modes'], array(array('first', array()),), true)) . '"
	data-lang="' . $__templater->escape($__vars['lang']) . '"
	data-config="' . $__templater->filter($__vars['modeConfig']['config'], array(array('json', array()),), true) . '"
	' . ($__vars['readOnly'] ? 'readonly="readonly"' : '') . '
	style="display: none;" ' . $__templater->filter($__vars['attrsHtml'], array(array('raw', array()),), true) . '>' . $__templater->escape($__vars['value']) . '</textarea>
<noscript>
	<textarea name="' . $__templater->escape($__vars['name']) . '" class="input input--code" dir="ltr" rows="' . $__templater->escape($__vars['rows']) . '" ' . ($__vars['readOnly'] ? 'readonly="readonly"' : '') . '>' . $__templater->escape($__vars['value']) . '</textarea>
</noscript>

';
	return $__finalCompiled;
}
);