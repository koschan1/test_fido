<?php
// FROM HASH: 31f3472e3720a15ed893f4eeb959a13a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Журнал модификации шаблона');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['modification']['Logs'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['modification']['Logs'])) {
			foreach ($__vars['modification']['Logs'] AS $__vars['log']) {
				$__compilerTemp1 .= '
						';
				$__compilerTemp2 = '';
				if ($__vars['log']['Template']['style_id']) {
					$__compilerTemp2 .= $__templater->escape($__vars['log']['Template']['Style']['title']);
				} else {
					$__compilerTemp2 .= 'Мастер-стиль';
				}
				$__compilerTemp3 = array(array(
					'_type' => 'cell',
					'html' => $__templater->escape($__vars['log']['Template']['title']),
				)
,array(
					'_type' => 'cell',
					'html' => $__compilerTemp2,
				));
				if ($__vars['log']['status'] == 'ok') {
					$__compilerTemp3[] = array(
						'_type' => 'cell',
						'html' => 'OK',
					);
					$__compilerTemp3[] = array(
						'_type' => 'cell',
						'html' => $__templater->escape($__vars['log']['apply_count']),
					);
				} else {
					$__compilerTemp4 = '';
					if ($__vars['log']['status'] == 'error_compile') {
						$__compilerTemp4 .= 'Ошибка компилятора (может быть из-за другой модификации шаблона)' . '
										';
					} else if ($__vars['log']['status'] == 'error_invalid_regex') {
						$__compilerTemp4 .= 'Неверное регулярное выражение' . '
										';
					} else if ($__vars['log']['status'] == 'error_unknown_action') {
						$__compilerTemp4 .= 'Неизвестное действие' . '
										';
					} else if ($__vars['log']['status'] == 'error_invalid_callback') {
						$__compilerTemp4 .= 'Неверный обработчик' . '
										';
					} else if ($__vars['log']['status'] == 'error_callback_failed') {
						$__compilerTemp4 .= 'Ошибка обработчика' . '
									';
					}
					$__compilerTemp3[] = array(
						'_type' => 'cell',
						'html' => '
									' . $__compilerTemp4 . '
								',
					);
					$__compilerTemp3[] = array(
						'_type' => 'cell',
						'html' => '-',
					);
				}
				$__compilerTemp1 .= $__templater->dataRow(array(
				), $__compilerTemp3) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Шаблон',
		),
		array(
			'_type' => 'cell',
			'html' => 'Стиль',
		),
		array(
			'_type' => 'cell',
			'html' => 'Статус',
		),
		array(
			'_type' => 'cell',
			'html' => 'Количество применений',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
		</div>
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Эта модификация шаблона не совпадает ни с одним из шаблонов.' . '</div>
';
	}
	return $__finalCompiled;
}
);