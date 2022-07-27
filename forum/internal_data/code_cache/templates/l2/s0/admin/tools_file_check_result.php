<?php
// FROM HASH: 471e948edbaa15cbd31d2019e2f8258b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Результат проверки целостности файлов');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	<form action="' . $__templater->func('link', array('tools/file-check', ), true) . '" method="post" class="u-pullRight">
		' . $__templater->button('Повторная проверка', array(
		'type' => 'submit',
	), '', array(
	)) . '
		' . $__templater->func('csrf_input') . '
	</form>
');
	$__finalCompiled .= '

';
	if ($__vars['fileCheck']['check_state'] == 'success') {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">
		' . 'Все проверенные файлы (' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), true) . ') присутствуют и корректны.' . ' ' . $__templater->func('smilie', array(':)', ), true) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . $__templater->filter('Проверка ' . $__templater->filter($__vars['fileCheck']['total_checked'], array(array('number', array()),), false) . ' файлов завершена. Мы обнаружили некоторые проблемы со следующими файлами. Пожалуйста, устраните эти проблемы как можно скорее.

Если Вы редактировали эти файлы самостоятельно, то можете проигнорировать это предупреждение. В противном случае необходимо проверить эти файлы более детально, поскольку это может быть свидетельством повреждения файла или потенциально вредоносного изменения.', array(array('nl2br', array()),), true) . '
	</div>

	';
		if ($__vars['results']) {
			$__finalCompiled .= '
		<div class="block">
			<div class="block-container">
				<div class="block-body">
					';
			$__compilerTemp1 = '';
			if ($__templater->isTraversable($__vars['addOns'])) {
				foreach ($__vars['addOns'] AS $__vars['addOnId'] => $__vars['addOn']) {
					$__compilerTemp1 .= '
							';
					if ($__vars['results']['missing'][$__vars['addOnId']] OR $__vars['results']['inconsistent'][$__vars['addOnId']]) {
						$__compilerTemp1 .= '
								' . $__templater->dataRow(array(
							'rowtype' => 'subsection',
							'rowclass' => 'dataList-row--noHover',
						), array(array(
							'_type' => 'cell',
							'html' => $__templater->escape($__vars['addOn']['title']),
						))) . '

								';
						if ($__templater->isTraversable($__vars['results']['missing'][$__vars['addOnId']])) {
							foreach ($__vars['results']['missing'][$__vars['addOnId']] AS $__vars['path']) {
								$__compilerTemp1 .= '
									' . $__templater->dataRow(array(
									'rowclass' => 'dataList-row--noHover',
								), array(array(
									'dir' => 'auto',
									'_type' => 'cell',
									'html' => '
											' . $__templater->escape($__vars['path']) . '
											<span class="label label--primary label--smallest" title="' . $__templater->filter('Файл не найден.', array(array('for_attr', array()),), true) . '" data-xf-init="tooltip">
												' . 'Отсутствует' . '
											</span>
										',
								))) . '
								';
							}
						}
						$__compilerTemp1 .= '

								';
						if ($__templater->isTraversable($__vars['results']['inconsistent'][$__vars['addOnId']])) {
							foreach ($__vars['results']['inconsistent'][$__vars['addOnId']] AS $__vars['path']) {
								$__compilerTemp1 .= '
									' . $__templater->dataRow(array(
									'rowclass' => 'dataList-row--noHover',
								), array(array(
									'dir' => 'auto',
									'_type' => 'cell',
									'html' => '
											' . $__templater->escape($__vars['path']) . '
											<span class="label label--primary label--smallest" title="' . $__templater->filter('Файл не содержит ожидаемого содержимого.', array(array('for_attr', array()),), true) . '" data-xf-init="tooltip">
												' . 'Неожиданное содержимое' . '
											</span>
										',
								))) . '
								';
							}
						}
						$__compilerTemp1 .= '
							';
					}
					$__compilerTemp1 .= '
						';
				}
			}
			$__finalCompiled .= $__templater->dataList('
						' . $__compilerTemp1 . '
					', array(
			)) . '
				</div>
			</div>
		</div>
	';
		} else {
			$__finalCompiled .= '
		<div class="blockMessage">' . 'Файл результатов проверки не найден. Повторите эту проверку ещё раз.' . '</div>
	';
		}
		$__finalCompiled .= '
';
	}
	return $__finalCompiled;
}
);