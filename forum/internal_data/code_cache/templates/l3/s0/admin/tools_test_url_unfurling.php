<?php
// FROM HASH: 2aeb31caf8e083094018bc7ec877255a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Тест предпросмотра URL-адресов');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Используйте этот инструмент для диагностики проблем с системой предпросмотра URL-адресов.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['error']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error">
		' . 'При получении метаданных из URL ' . $__templater->escape($__vars['url']) . ' произошла следующая ошибка' . '<br />
		<pre class="u-preWrap">' . $__templater->escape($__vars['error']) . '</pre>
	</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'url',
		'type' => 'url',
		'value' => $__vars['url'],
	), array(
		'label' => 'URL-адрес',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Запустить тест',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('tools/test-url-unfurling', ), false),
		'class' => 'block',
	)) . '

';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
			';
	if ($__vars['results']) {
		$__compilerTemp1 .= '
				<h2 class="block-header">' . 'Результаты' . '</h2>
				<div class="block-body">
					' . $__templater->formRow('
						' . ($__templater->escape($__vars['results']['title']) ?: 'Н/Д') . '
					', array(
			'label' => 'Заголовок',
		)) . '

					' . $__templater->formRow('
						' . ($__templater->escape($__vars['results']['description']) ?: 'Н/Д') . '
					', array(
			'label' => 'Описание',
		)) . '

					';
		$__compilerTemp2 = '';
		if ($__vars['results']['image_url']) {
			$__compilerTemp2 .= '
							<img src="' . $__templater->escape($__vars['results']['image_url']) . '" style="width: 100px" />
							<div class="formRow-explain">
								' . 'URL-адрес' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->escape($__vars['results']['image_url']) . '" target="_blank">' . $__templater->escape($__vars['results']['image_url']) . '</a>
							</div>
						';
		} else {
			$__compilerTemp2 .= '
							' . 'Н/Д' . '
						';
		}
		$__compilerTemp1 .= $__templater->formRow('
						' . $__compilerTemp2 . '
					', array(
			'label' => 'Изображение',
		)) . '

					';
		$__compilerTemp3 = '';
		if ($__vars['results']['favicon_url']) {
			$__compilerTemp3 .= '
							<img src="' . $__templater->escape($__vars['results']['favicon_url']) . '" style="width: 32px" />
							<div class="formRow-explain">
								' . 'URL-адрес' . $__vars['xf']['language']['label_separator'] . ' <a href="' . $__templater->escape($__vars['results']['favicon_url']) . '" target="_blank">' . $__templater->escape($__vars['results']['favicon_url']) . '</a>
							</div>
						';
		} else {
			$__compilerTemp3 .= '
							' . 'Н/Д' . '
						';
		}
		$__compilerTemp1 .= $__templater->formRow('
						' . $__compilerTemp3 . '
					', array(
			'label' => 'Иконка',
		)) . '
				</div>
			';
	}
	$__compilerTemp1 .= '

			';
	if ($__vars['body']) {
		$__compilerTemp1 .= '
				';
		if ($__vars['results']) {
			$__compilerTemp1 .= '
					<h2 class="block-minorHeader">
						<span class="collapseTrigger collapseTrigger--block" data-xf-click="toggle" data-target="< :up :next">
							' . 'Необработанный ответ' . '
						</span>
					</h2>
				';
		} else {
			$__compilerTemp1 .= '
					<h2 class="block-header">' . 'Необработанный ответ' . '</h2>
				';
		}
		$__compilerTemp1 .= '
				<div class="block-body ' . ($__vars['results'] ? 'block-body--collapsible' : '') . '">
					' . $__templater->callMacro('public:prism_macros', 'setup', array(), $__vars) . '

					' . $__templater->formRow('
						' . 'Следующий код HTML получен в соответствии с ограничениями по времени и размеру по умолчанию. Если некоторые или все данные в результатах выше отсутствуют, значит в ответе отсутствуют все или некоторые метаданные.' . '

						<div class="bbCodeBlock bbCodeBlock--screenLimited bbCodeBlock--code">
							<div class="bbCodeBlock-content" dir="ltr">
								<pre class="bbCodeCode" dir="ltr"><code>' . $__templater->escape($__vars['body']) . '</code></pre>
							</div>
						</div>
					', array(
			'label' => 'HTML',
			'rowtype' => 'fullWidth noLabel',
		)) . '
				</div>
			';
	}
	$__compilerTemp1 .= '
		';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
		' . $__compilerTemp1 . '
		</div>
	</div>
';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
);