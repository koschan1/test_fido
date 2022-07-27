<?php
// FROM HASH: 649a4c66538f457007feaff84078f613
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Действующие повышения прав' . ($__vars['userUpgrade'] ? (': ' . $__templater->escape($__vars['userUpgrade']['title'])) : ''));
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow('
				' . $__templater->formTextBox(array(
		'name' => 'username',
		'class' => 'input--inline',
		'ac' => 'single',
	)) . '
				' . $__templater->button('Фильтровать', array(
		'type' => 'submit',
	), '', array(
	)) . '
			', array(
		'label' => 'Фильтр по пользователю',
		'rowtype' => 'input',
	)) . '
		</div>
	</div>
', array(
		'action' => $__templater->func('link', array('user-upgrades/active', $__vars['userUpgrade'], ), false),
		'class' => 'block',
	)) . '

';
	if (!$__templater->test($__vars['activeUpgrades'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['activeUpgrades'])) {
			foreach ($__vars['activeUpgrades'] AS $__vars['activeUpgrade']) {
				$__compilerTemp1 .= '
						';
				$__vars['paymentProfile'] = $__vars['activeUpgrade']['PurchaseRequest']['PaymentProfile'];
				$__compilerTemp2 = '';
				if ($__vars['paymentProfile']) {
					$__compilerTemp2 .= '
									<a href="' . $__templater->func('link', array('payment-profiles/edit', $__vars['paymentProfile'], ), true) . '">' . $__templater->escape($__vars['paymentProfile']['title']) . '</a>
								';
				} else {
					$__compilerTemp2 .= '
									' . 'Н/Д' . '
								';
				}
				$__compilerTemp1 .= $__templater->dataRow(array(
					'rowclass' => 'dataList-row--noHover',
				), array(array(
					'_type' => 'cell',
					'html' => '
								' . $__templater->func('username_link', array($__vars['activeUpgrade']['User'], false, array(
					'defaultname' => 'Неизвестный пользователь',
					'href' => $__templater->func('link', array('users/edit', $__vars['activeUpgrade']['User'], ), false),
				))) . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								<a href="' . $__templater->func('link', array('user-upgrades/edit', $__vars['activeUpgrade']['Upgrade'], ), true) . '">' . $__templater->escape($__vars['activeUpgrade']['Upgrade']['title']) . '</a>
							',
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . '' . '
								' . $__compilerTemp2 . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['activeUpgrade']['start_date'], array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => ($__vars['activeUpgrade']['end_date'] ? $__templater->func('date', array($__vars['activeUpgrade']['end_date'], ), true) : 'Постоянно'),
				),
				array(
					'overlay' => 'true',
					'href' => $__templater->func('link', array('user-upgrades/edit-active', null, array('user_upgrade_record_id' => $__vars['activeUpgrade']['user_upgrade_record_id'], ), ), false),
					'_type' => 'action',
					'html' => 'Изменить',
				),
				array(
					'overlay' => 'true',
					'href' => $__templater->func('link', array('user-upgrades/downgrade', null, array('user_upgrade_record_id' => $__vars['activeUpgrade']['user_upgrade_record_id'], ), ), false),
					'_type' => 'action',
					'html' => 'Понизить',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/active', $__vars['userUpgrade'], array('order' => 'username', 'direction' => ((($__vars['linkParams']['order'] == 'username') AND ($__vars['linkParams']['direction'] == 'desc')) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'Пользователь' . '</a>',
		),
		array(
			'_type' => 'cell',
			'html' => 'Название повышения',
		),
		array(
			'_type' => 'cell',
			'html' => 'Платёжный профиль',
		),
		array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/active', $__vars['userUpgrade'], array('order' => 'start_date', 'direction' => ((($__vars['linkParams']['order'] == 'start_date') AND ($__vars['linkParams']['direction'] == 'desc')) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'Дата начала' . '</a>',
		),
		array(
			'_type' => 'cell',
			'html' => '<a href="' . $__templater->func('link', array('user-upgrades/active', $__vars['userUpgrade'], array('order' => 'end_date', 'direction' => ((($__vars['linkParams']['order'] == 'end_date') AND ($__vars['linkParams']['direction'] == 'desc')) ? 'asc' : 'desc'), ) + $__vars['linkParams'], ), true) . '">' . 'Дата окончания' . '</a>',
		),
		array(
			'colspan' => '2',
			'_type' => 'cell',
			'html' => '',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['activeUpgrades'], $__vars['totalActive'], ), true) . '</span>
			</div>
		</div>

		' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['totalActive'],
			'link' => 'user-upgrades/active',
			'data' => $__vars['userUpgrade'],
			'params' => $__vars['linkParams'],
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Результатов не найдено.' . '</div>
';
	}
	return $__finalCompiled;
}
);