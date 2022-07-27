<?php
// FROM HASH: 5d383b611c10a9f314bbf05a958c65a5
return array(
'macros' => array('serious_errors' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'upgradeCheck' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
				';
	if ($__vars['upgradeCheck']['error_code']) {
		$__compilerTemp1 .= '
					<li>' . $__templater->escape($__vars['upgradeCheck']['error_message']) . '</li>
				';
	} else {
		$__compilerTemp1 .= '
					';
		if (!$__vars['upgradeCheck']['branding_valid']) {
			$__compilerTemp1 .= '
						<li>' . 'Копирайт разработчиков был удалён, но Ваша лицензия не позволяет этого делать.' . '</li>
					';
		}
		$__compilerTemp1 .= '
					';
		if ($__templater->isTraversable($__vars['upgradeCheck']['invalid_add_ons'])) {
			foreach ($__vars['upgradeCheck']['invalid_add_ons'] AS $__vars['addOnId'] => $__vars['reason']) {
				$__compilerTemp1 .= '
						';
				if ($__vars['reason'] == 'using_newer') {
					$__compilerTemp1 .= '
							<li>' . 'Вы используете версию ' . $__templater->escape($__vars['upgradeCheck']['RelevantAddOns'][$__vars['addOnId']]['title']) . ', которая является более новой, чем позволяет Ваша лицензия.' . '
							</li>
						';
				} else if ($__vars['reason'] == 'no_license') {
					$__compilerTemp1 .= '
							<li>' . 'Вы используете ' . $__templater->escape($__vars['upgradeCheck']['RelevantAddOns'][$__vars['addOnId']]['title']) . ', однако это не разрешено Вашей лицензией.' . '
							</li>
						';
				}
				$__compilerTemp1 .= '
					';
			}
		}
		$__compilerTemp1 .= '
				';
	}
	$__compilerTemp1 .= '
			';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
		<div class="blockMessage blockMessage--error blockMessage--iconic">
			' . 'Следующие ошибки должны быть устранены как можно скорее. После этого <a href="' . $__templater->func('link', array('tools/upgrade-check', ), true) . '">проверьте обновления ещё раз</a>.' . '
			<ul>
			' . $__compilerTemp1 . '
			</ul>
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'warnings' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'upgradeCheck' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if (!$__templater->method($__vars['upgradeCheck'], 'hasLicenseErrors', array())) {
		$__finalCompiled .= '
		';
		$__compilerTemp1 = '';
		$__compilerTemp1 .= '
					';
		if (!$__vars['upgradeCheck']['board_url_valid']) {
			$__compilerTemp1 .= '
						<li>' . '<a href="' . ($__templater->func('link', array('options/groups/basicBoard/', ), true) . '#boardUrl') . '">URL-адрес форума</a> не соответствует адресу, указанному для Вашей лицензии.' . '
						</li>
					';
		}
		$__compilerTemp1 .= '
					';
		if ($__vars['upgradeCheck']['license_expired']) {
			$__compilerTemp1 .= '
						<li>' . 'Срок действия лицензии истёк. У Вас не будет доступа к новым версиям и поддержке. Чтобы продолжить получать обновления и поддержку, Вы должны <a href="https://xenforo.com/customers" target="_blank">продлить</a> лицензию.' . '</li>
					';
		}
		$__compilerTemp1 .= '
				';
		if (strlen(trim($__compilerTemp1)) > 0) {
			$__finalCompiled .= '
			<div class="blockMessage blockMessage--warning blockMessage--iconic">
				' . 'Должны быть устранены следующие предупреждения. После этого <a href="' . $__templater->func('link', array('tools/upgrade-check', ), true) . '">проверьте обновления ещё раз</a>.' . '
				<ul>
				' . $__compilerTemp1 . '
				</ul>
			</div>
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'updates' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'upgradeCheck' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('upgradeXenForo', )) AND ($__vars['upgradeCheck']['available_updates'] AND (!$__templater->method($__vars['upgradeCheck'], 'hasLicenseErrors', array())))) {
		$__finalCompiled .= '
		';
		$__compilerTemp1 = '';
		$__compilerTemp1 .= '
					';
		if ($__templater->method($__vars['upgradeCheck'], 'hasAvailableUpdate', array('XF', ))) {
			$__compilerTemp1 .= '
						' . 'Доступно обновление XenForo: ' . $__templater->escape($__vars['upgradeCheck']['available_updates']['XF']['version_string']) . '' . '
						<div style="margin-top: .5em">
							' . $__templater->button('Обновить сейчас' . '
							', array(
				'href' => $__templater->func('link', array('tools/upgrade-xf', ), false),
				'class' => 'button--link',
			), '', array(
			)) . '
						</div>
					';
		} else if ($__templater->method($__vars['upgradeCheck'], 'hasAvailableAddOnUpdate', array())) {
			$__compilerTemp1 .= '
						' . 'Доступны обновления для официальных плагинов:' . '
						<ul class="listInline listInline--comma listInline--selfInline">
							';
			if ($__templater->isTraversable($__vars['upgradeCheck']['available_updates'])) {
				foreach ($__vars['upgradeCheck']['available_updates'] AS $__vars['addOnId'] => $__vars['update']) {
					if ($__templater->method($__vars['upgradeCheck'], 'hasAvailableUpdate', array($__vars['addOnId'], ))) {
						$__compilerTemp1 .= '
								<li>' . $__templater->escape($__vars['upgradeCheck']['RelevantAddOns'][$__vars['addOnId']]['title']) . ' ' . $__templater->escape($__vars['update']['version_string']) . '</li>
							';
					}
				}
			}
			$__compilerTemp1 .= '
						</ul>
						<div style="margin-top: .5em">
							' . $__templater->button('
								' . 'Обновить сейчас' . '
							', array(
				'href' => $__templater->func('link', array('tools/upgrade-xf-add-on', ), false),
				'class' => 'button--link',
			), '', array(
			)) . '
						</div>
					';
		}
		$__compilerTemp1 .= '
				';
		if (strlen(trim($__compilerTemp1)) > 0) {
			$__finalCompiled .= '
			<div class="blockMessage blockMessage--highlight blockMessage--iconic">
				' . $__compilerTemp1 . '
			</div>
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'installable_add_ons' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'upgradeCheck' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('upgradeXenForo', )) AND ($__vars['upgradeCheck']['installable_add_ons'] AND (!$__templater->method($__vars['upgradeCheck'], 'hasLicenseErrors', array())))) {
		$__finalCompiled .= '
		';
		$__compilerTemp1 = '';
		$__compilerTemp1 .= '
					';
		if ($__vars['upgradeCheck']['installable_add_ons']) {
			$__compilerTemp1 .= '
						' . 'Официальные плагины, доступные для установки:' . '
						<ul class="listInline listInline--comma listInline--selfInline">
							';
			if ($__templater->isTraversable($__vars['upgradeCheck']['installable_add_ons'])) {
				foreach ($__vars['upgradeCheck']['installable_add_ons'] AS $__vars['addOnId'] => $__vars['install']) {
					$__compilerTemp1 .= '
								<li>' . $__templater->escape($__vars['install']['title']) . ' ' . $__templater->escape($__vars['install']['version_string']) . '</li>
							';
				}
			}
			$__compilerTemp1 .= '
						</ul>
						<div style="margin-top: .5em">
							' . $__templater->button('
								' . 'Установить сейчас' . '
							', array(
				'href' => $__templater->func('link', array('tools/install-xf-add-on', ), false),
				'class' => 'button--link',
			), '', array(
			)) . '
						</div>
					';
		}
		$__compilerTemp1 .= '
				';
		if (strlen(trim($__compilerTemp1)) > 0) {
			$__finalCompiled .= '
			<div class="blockMessage blockMessage--highlight blockMessage--iconic">
				' . $__compilerTemp1 . '
			</div>
		';
		}
		$__finalCompiled .= '
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
),
'full_status' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'upgradeCheck' => '!',
		'showSeriousErrors' => false,
		'showWarnings' => true,
		'showUpdates' => true,
		'showInstalls' => false,
		'showSuccess' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

	';
	if ($__vars['showSeriousErrors']) {
		$__finalCompiled .= '
		' . $__templater->callMacro(null, 'serious_errors', array(
			'upgradeCheck' => $__vars['upgradeCheck'],
		), $__vars) . '
	';
	}
	$__finalCompiled .= '
	';
	if ($__vars['showWarnings']) {
		$__finalCompiled .= '
		' . $__templater->callMacro(null, 'warnings', array(
			'upgradeCheck' => $__vars['upgradeCheck'],
		), $__vars) . '
	';
	}
	$__finalCompiled .= '
	';
	if ($__vars['showUpdates']) {
		$__finalCompiled .= '
		' . $__templater->callMacro(null, 'updates', array(
			'upgradeCheck' => $__vars['upgradeCheck'],
		), $__vars) . '
	';
	}
	$__finalCompiled .= '
	';
	if ($__vars['showInstalls']) {
		$__finalCompiled .= '
		' . $__templater->callMacro(null, 'installs', array(
			'upgradeCheck' => $__vars['upgradeCheck'],
		), $__vars) . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__vars['showSuccess'] AND (!$__templater->method($__vars['upgradeCheck'], 'hasNotice', array()))) {
		$__finalCompiled .= '
		<div class="blockMessage blockMessage--success">
			' . 'Ваши версии XenForo и официальных плагинов актуальны. Проблем с Вашей лицензией не выявлено.' . '
		</div>
	';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

' . '

' . '

' . '

';
	return $__finalCompiled;
}
);