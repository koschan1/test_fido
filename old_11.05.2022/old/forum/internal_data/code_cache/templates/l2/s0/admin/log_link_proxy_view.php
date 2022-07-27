<?php
// FROM HASH: 2d32cd725b2fa0d584c90b371df8a38d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Детали проксированной ссылки');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('<a href="' . $__templater->escape($__vars['link']['url']) . '" target="_blank">' . $__templater->escape($__vars['link']['url']) . '</a>', array(
		'label' => 'URL-адрес',
	)) . '
			' . $__templater->formRow($__templater->filter($__vars['link']['hits'], array(array('number', array()),), true), array(
		'label' => 'Просмотры',
	)) . '
			' . $__templater->formRow($__templater->func('date_dynamic', array($__vars['link']['first_request_date'], array(
	))), array(
		'label' => 'Первый запрос',
	)) . '
			' . $__templater->formRow($__templater->func('date_dynamic', array($__vars['link']['last_request_date'], array(
	))), array(
		'label' => 'Последний запрос',
	)) . '

			';
	if ($__vars['xf']['options']['imageLinkProxyReferrer']['enabled'] AND !$__templater->test($__vars['link']['Referrers'], 'empty', array())) {
		$__finalCompiled .= '
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['link']['Referrers'])) {
			foreach ($__vars['link']['Referrers'] AS $__vars['referrer']) {
				$__compilerTemp1 .= '
						' . $__templater->dataRow(array(
					'rowclass' => 'dataList-row--noHover',
				), array(array(
					'dir' => 'auto',
					'_type' => 'cell',
					'html' => '<a href="' . $__templater->escape($__vars['referrer']['referrer_url']) . '" target="_blank">' . $__templater->escape($__vars['referrer']['referrer_url']) . '</a>',
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->filter($__vars['referrer']['hits'], array(array('number', array()),), true),
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['referrer']['first_date'], array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['referrer']['last_date'], array(
				))),
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Источник перехода',
		),
		array(
			'_type' => 'cell',
			'html' => 'Просмотры',
		),
		array(
			'_type' => 'cell',
			'html' => 'Первый просмотр',
		),
		array(
			'_type' => 'cell',
			'html' => 'Последняя активность',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'class' => 'dataList--separatedTop',
			'data-xf-init' => 'responsive-data-list',
		)) . '
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);