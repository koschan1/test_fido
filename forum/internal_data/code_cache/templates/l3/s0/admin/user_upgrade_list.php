<?php
// FROM HASH: 2d97e52458f4c4035a94b6db68d801ed
return array(
'macros' => array('upgrade_list' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'upgrades' => '!',
		'viewMoreUrl' => '',
		'active' => '1',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	
	';
	$__compilerTemp1 = '';
	if ($__templater->isTraversable($__vars['upgrades'])) {
		foreach ($__vars['upgrades'] AS $__vars['upgrade']) {
			$__compilerTemp1 .= '
			';
			$__vars['paymentProfile'] = $__vars['upgrade']['PurchaseRequest']['PaymentProfile'];
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
			$__compilerTemp3 = array(array(
				'_type' => 'cell',
				'html' => '
					' . $__templater->func('username_link', array($__vars['upgrade']['User'], false, array(
				'defaultname' => 'Неизвестный пользователь',
				'href' => $__templater->func('link', array('users/edit', $__vars['upgrade']['User'], ), false),
			))) . '
				',
			)
,array(
				'_type' => 'cell',
				'html' => '
					<a href="' . $__templater->func('link', array('user-upgrades/edit', $__vars['upgrade']['Upgrade'], ), true) . '">' . $__templater->escape($__vars['upgrade']['Upgrade']['title']) . '</a>
				',
			)
,array(
				'_type' => 'cell',
				'html' => '
					' . '' . '
					' . $__compilerTemp2 . '
				',
			)
,array(
				'_type' => 'cell',
				'html' => $__templater->func('date_dynamic', array($__vars['upgrade']['start_date'], array(
			))),
			)
,array(
				'_type' => 'cell',
				'html' => ($__vars['upgrade']['end_date'] ? $__templater->func('date', array($__vars['upgrade']['end_date'], ), true) : 'Постоянно'),
			));
			if ($__vars['active']) {
				$__compilerTemp3[] = array(
					'overlay' => 'true',
					'href' => $__templater->func('link', array('user-upgrades/edit-active', null, array('user_upgrade_record_id' => $__vars['upgrade']['user_upgrade_record_id'], ), ), false),
					'_type' => 'action',
					'html' => 'Изменить',
				);
				$__compilerTemp3[] = array(
					'overlay' => 'true',
					'href' => $__templater->func('link', array('user-upgrades/downgrade', null, array('user_upgrade_record_id' => $__vars['upgrade']['user_upgrade_record_id'], ), ), false),
					'_type' => 'action',
					'html' => 'Понизить',
				);
			}
			$__compilerTemp1 .= $__templater->dataRow(array(
				'rowclass' => 'dataList-row--noHover',
			), $__compilerTemp3) . '
		';
		}
	}
	$__finalCompiled .= $__templater->dataList('
		' . $__templater->dataRow(array(
		'rowtype' => 'header',
	), array(array(
		'_type' => 'cell',
		'html' => 'Пользователь',
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
		'html' => 'Дата начала',
	),
	array(
		'colspan' => ($__vars['active'] ? 3 : 1),
		'_type' => 'cell',
		'html' => 'Дата окончания',
	))) . '
		' . $__compilerTemp1 . '
	', array(
		'data-xf-init' => 'responsive-data-list',
	)) . '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Платное повышение прав');
	$__finalCompiled .= '

';
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Добавить повышение', array(
		'href' => $__templater->func('link', array('user-upgrades/add', ), false),
		'icon' => 'add',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

';
	if (!$__vars['xf']['livePayments']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'Платежи в реальном времени были отключены, поэтому, если они доступны, запросы на покупку будут производиться в тестовой среде платёжных систем. Чтобы исправить это, отредактируйте файл config.php.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['upgrades'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['upgrades'])) {
			foreach ($__vars['upgrades'] AS $__vars['upgrade']) {
				$__compilerTemp1 .= '
						' . $__templater->dataRow(array(
					'label' => $__templater->escape($__vars['upgrade']['title']),
					'hint' => $__templater->escape($__vars['upgrade']['cost_phrase']),
					'href' => $__templater->func('link', array('user-upgrades/edit', $__vars['upgrade'], ), false),
					'delete' => $__templater->func('link', array('user-upgrades/delete', $__vars['upgrade'], ), false),
				), array(array(
					'name' => 'can_purchase[' . $__vars['upgrade']['user_upgrade_id'] . ']',
					'selected' => $__vars['upgrade']['can_purchase'],
					'class' => 'dataList-cell--separated',
					'submit' => 'true',
					'tooltip' => 'Включить/отключить \'' . $__vars['upgrade']['title'] . '\'',
					'_type' => 'toggle',
					'html' => '',
				),
				array(
					'class' => 'dataList-cell--action',
					'_type' => 'popup',
					'html' => '
								<div class="menu" data-menu="menu" aria-hidden="true">
									<div class="menu-content">
										<h3 class="menu-header">' . 'Действия' . '</h3>
										<a href="' . $__templater->func('link', array('user-upgrades/active', $__vars['upgrade'], ), true) . '" class="menu-linkRow">' . 'Просмотр пользователей' . '</a>
										<a href="' . $__templater->func('link', array('user-upgrades/expired', $__vars['upgrade'], ), true) . '" class="menu-linkRow">' . 'Просмотр истёкших повышений прав' . '</a>
										<a href="' . $__templater->func('link', array('user-upgrades/manual', $__vars['upgrade'], ), true) . '" class="menu-linkRow">' . 'Повышение прав пользователя вручную' . '</a>
									</div>
								</div>
							',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-outer">
			' . $__templater->callMacro('filter_macros', 'quick_filter', array(
			'key' => 'user-upgrades',
			'class' => 'block-outer-opposite',
		), $__vars) . '
		</div>
		<div class="block-container">
			<div class="block-body">
				' . $__templater->dataList('
					' . $__compilerTemp1 . '
				', array(
		)) . '
			</div>
			<div class="block-footer">
				<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['upgrades'], ), true) . '</span>
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('user-upgrades/toggle', ), false),
			'class' => 'block',
			'ajax' => 'true',
		)) . '

	<div class="block">
		<div class="block-container">
			<h2 class="block-header"><a href="' . $__templater->func('link', array('user-upgrades/active', ), true) . '">' . 'Действующие повышения прав' . '</a></h2>
			';
		if (!$__templater->test($__vars['activeUpgrades'], 'empty', array())) {
			$__finalCompiled .= '
				<div class="block-body">
					' . $__templater->callMacro(null, 'upgrade_list', array(
				'upgrades' => $__vars['activeUpgrades'],
				'active' => '1',
			), $__vars) . '
				</div>
				<div class="block-footer block-footer--split">
					<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['activeUpgrades'], $__vars['totalActiveUpgrades'], ), true) . '</span>
					<span class="block-footer-controls">' . $__templater->button('Посмотреть ещё' . $__vars['xf']['language']['ellipsis'], array(
				'href' => $__templater->func('link', array('user-upgrades/active', ), false),
			), '', array(
			)) . '</span>
				</div>
			';
		} else {
			$__finalCompiled .= '
				<div class="block-body block-row">' . 'Результатов не найдено.' . '</div>
			';
		}
		$__finalCompiled .= '
		</div>
	</div>

	<div class="block">
		<div class="block-container">
			<h2 class="block-header"><a href="' . $__templater->func('link', array('user-upgrades/expired', ), true) . '">' . 'Истёкшие повышения прав' . '</a></h2>
			';
		if (!$__templater->test($__vars['expiredUpgrades'], 'empty', array())) {
			$__finalCompiled .= '
				<div class="block-body">
					' . $__templater->callMacro(null, 'upgrade_list', array(
				'upgrades' => $__vars['expiredUpgrades'],
				'active' => '0',
			), $__vars) . '
				</div>
				<div class="block-footer block-footer--split">
					<span class="block-footer-counter">' . $__templater->func('display_totals', array($__vars['expiredUpgrades'], $__vars['totalExpiredUpgrades'], ), true) . '</span>
					<span class="block-footer-controls">' . $__templater->button('Посмотреть ещё' . $__vars['xf']['language']['ellipsis'], array(
				'href' => $__templater->func('link', array('user-upgrades/expired', ), false),
			), '', array(
			)) . '</span>
				</div>
			';
		} else {
			$__finalCompiled .= '
				<div class="block-body block-row">' . 'Результатов не найдено.' . '</div>
			';
		}
		$__finalCompiled .= '
		</div>
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Пока не создано ни одного элемента.' . '</div>
';
	}
	$__finalCompiled .= '

';
	return $__finalCompiled;
}
);