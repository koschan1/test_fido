<?php
// FROM HASH: 8a9d1f3dd3634e6f87b2cd10f1abb930
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Результат установки/обновления');
	$__finalCompiled .= '

';
	if ($__vars['hasErrors']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error">
		' . 'Один или несколько плагинов из этой группы не удалось установить/обновить. Нажмите или наведите курсор на значок, чтобы посмотреть сведения об ошибке.' . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success">
		' . 'Все плагины успешно установлены/обновлены.' . '
	</div>
';
	}
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['batch']['results'])) {
		foreach ($__vars['batch']['results'] AS $__vars['addOnId'] => $__vars['result']) {
			$__compilerTemp1 .= '
					';
			$__vars['addOn'] = ($__vars['addOns'][$__vars['addOnId']] ?: $__vars['batch']['addon_ids'][$__vars['addOnId']]);
			$__compilerTemp1 .= '
					';
			$__compilerTemp2 = '';
			if ($__vars['result']['status'] == 'error') {
				$__compilerTemp2 .= '
								<span data-xf-init="tooltip" data-trigger="hover focus click" title="' . $__templater->escape($__vars['result']['error']) . '">
									' . $__templater->fontAwesome('fas fa-exclamation-circle', array(
					'style' => 'color: #c84448;',
				)) . '
									' . 'Ошибка' . '
								</span>
							';
			} else {
				$__compilerTemp2 .= '
								<span data-xf-init="tooltip" data-trigger="hover focus click"
									title="' . $__templater->filter('Действие выполнено успешно', array(array('for_attr', array()),), true) . '">
									' . $__templater->fontAwesome('fas fa-check-circle', array(
					'style' => 'color: #63b265;',
				)) . '
									';
				if ($__vars['result']['action'] == 'install') {
					$__compilerTemp2 .= '
										' . 'Установить' . '
									';
				} else if ($__vars['result']['action'] == 'upgrade') {
					$__compilerTemp2 .= '
										' . 'Обновление' . '
									';
				} else if ($__vars['result']['action'] == 'rebuild') {
					$__compilerTemp2 .= '
										' . 'Перестроить' . '
									';
				}
				$__compilerTemp2 .= '
								</span>
							';
			}
			$__compilerTemp3 = '';
			if ($__vars['action']['action'] == 'upgrade') {
				$__compilerTemp3 .= '
								' . $__templater->escape($__vars['result']['old_version']) . ' -&gt; ' . $__templater->escape($__vars['addOn']['version_string']) . '
							';
			} else {
				$__compilerTemp3 .= '
								' . $__templater->escape($__vars['addOn']['version_string']) . '
							';
			}
			$__compilerTemp1 .= $__templater->dataRow(array(
				'rowclass' => 'dataList-row--noHover',
			), array(array(
				'_type' => 'cell',
				'html' => ($__templater->escape($__vars['addOn']['title']) ?: $__templater->escape($__vars['addOnId'])),
			),
			array(
				'_type' => 'cell',
				'html' => '
							' . $__compilerTemp2 . '
						',
			),
			array(
				'_type' => 'cell',
				'html' => '
							' . $__compilerTemp3 . '
						',
			))) . '
				';
		}
	}
	$__finalCompiled .= $__templater->dataList('
				' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => 'Плагин',
	),
	array(
		'_type' => 'cell',
		'html' => 'Действие',
	),
	array(
		'_type' => 'cell',
		'html' => 'Версия',
	))) . '
				' . $__compilerTemp1 . '
			', array(
		'data-xf-init' => 'responsive-data-list',
	)) . '
		</div>
		<div class="block-footer">
			<span class="block-footer-controls"><a
				href="' . $__templater->func('link', array('add-ons', ), true) . '">' . 'Посмотреть все плагины' . '</a></span>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);