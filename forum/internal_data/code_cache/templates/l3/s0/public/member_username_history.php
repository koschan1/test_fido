<?php
// FROM HASH: d768304c32b98b49718db0df3d8e5c28
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Предыдущие имена' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['user']['username']));
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			';
	$__compilerTemp1 = '';
	$__compilerTemp2 = true;
	if ($__templater->isTraversable($__vars['changes'])) {
		foreach ($__vars['changes'] AS $__vars['change']) {
			$__compilerTemp2 = false;
			$__compilerTemp1 .= '
					';
			$__compilerTemp3 = '';
			if ($__vars['change']['change_reason']) {
				$__compilerTemp3 .= '
								<a role="button"
									tabindex="0"
									data-xf-init="tooltip"
									data-trigger="hover focus click"
									title="' . 'Причина изменения' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['change']['change_reason']) . '">' . trim('
									' . $__templater->fontAwesome('fa-info-circle', array(
				)) . '
								') . '</a>
							';
			}
			$__compilerTemp1 .= $__templater->dataRow(array(
				'rowclass' => 'dataList-row--noHover',
			), array(array(
				'class' => ($__vars['change']['visible'] ? '' : 'dataList-cell--alt'),
				'_type' => 'cell',
				'html' => '
							' . $__templater->escape($__vars['change']['old_username']) . '
						',
			),
			array(
				'class' => ($__vars['change']['visible'] ? '' : 'dataList-cell--alt'),
				'_type' => 'cell',
				'html' => '
							' . $__templater->escape($__vars['change']['new_username']) . '
							' . $__compilerTemp3 . '
						',
			),
			array(
				'class' => ($__vars['change']['visible'] ? '' : 'dataList-cell--alt'),
				'_type' => 'cell',
				'html' => '
							' . $__templater->func('date_dynamic', array($__vars['change']['change_date'], array(
			))) . '
						',
			))) . '
				';
		}
	}
	if ($__compilerTemp2) {
		$__compilerTemp1 .= '
					' . $__templater->dataRow(array(
		), array(array(
			'colspan' => '4',
			'_type' => 'cell',
			'html' => 'В журнале нет записей.',
		))) . '
				';
	}
	$__finalCompiled .= $__templater->dataList('
				' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => 'Старое имя пользователя',
	),
	array(
		'_type' => 'cell',
		'html' => 'Новое имя пользователя',
	),
	array(
		'_type' => 'cell',
		'html' => 'Дата',
	))) . '

				' . $__compilerTemp1 . '
			', array(
		'data-xf-init' => 'responsive-data-list',
	)) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);