<?php
// FROM HASH: 450ebaabc18c9c5046e33a92eba209ab
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Импорт данных' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['title']));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<h2 class="block-tabHeader tabs" data-xf-init="tabs" role="tablist">
			<a class="tabs-tab is-active" role="tab" tabindex="0" aria-controls="import-web">' . 'Через браузер' . '</a>
			<a class="tabs-tab" role="tab" tabindex="0" aria-controls="import-cli">' . 'Через командную строку' . '</a>
		</h2>
		<ul class="tabPanes">
			<li class="is-active" role="tabpanel" id="import-web">
				<div class="block-body block-row">
					' . 'Все готово для начала импорта. После запуска импорт будет продолжен, пока открыто окно браузера - не закрывайте его! После завершения импорта всех данных будут показаны дальнейшие инструкции.' . '
				</div>
				' . $__templater->formSubmitRow(array(
		'submit' => 'Начать импорт',
	), array(
		'rowtype' => 'simple',
	)) . '
			</li>
			<li role="tabpanel" id="import-cli">
				<div class="block-body block-row">
					' . 'Также можно выполнить импорт через командную строку. Это рекомендуется при импорте большого количества данных. Выполните следующую команду в корневом каталоге XenForo и следуйте инструкциям на экране' . $__vars['xf']['language']['label_separator'] . '
					<pre style="margin: 1em 2em">php cmd.php xf:import</pre>
					' . 'После выполнения этой команды необходимо обновить эту страницу, чтобы завершить импорт.' . '<br />
					<br />
					' . 'Есть дополнительные опции доступные при использовании командной строки. Для получения дополнительной информации выполните команду с параметром <code>--help</code>.' . '
				</div>
			</li>
		</ul>
	</div>
', array(
		'action' => $__templater->func('link', array('import/run', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);