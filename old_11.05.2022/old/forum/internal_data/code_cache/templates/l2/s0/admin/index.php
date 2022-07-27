<?php
// FROM HASH: 13b6b83ca7aca55b29a6e751891a8092
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['upgradeCheck']) {
		$__finalCompiled .= '
	' . $__templater->callMacro('upgrade_check_macros', 'full_status', array(
			'upgradeCheck' => $__vars['upgradeCheck'],
		), $__vars) . '
';
	}
	$__finalCompiled .= '

';
	if ($__vars['showUnicodeWarning']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . 'Полная поддержка Unicode включена в файле config.php, но Ваша база данных не настроена для этого должным образом. Отключите полную поддержку Unicode или могут возникнуть ошибки.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('style', )) AND $__vars['outdatedTemplates']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		<a href="' . $__templater->func('link', array('templates/outdated', ), true) . '"> ' . 'Имеются шаблоны, которые могут быть устаревшими. Нажмите сюда, чтобы посмотреть их.' . '</a>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('viewLogs', )) AND $__vars['serverErrorLogs']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		<a href="' . $__templater->func('link', array('logs/server-errors', ), true) . '"> ' . 'В журнале ошибок сервера есть записи. Вам стоит на них посмотреть.' . '</a>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('addOn', )) AND $__vars['hasProcessingAddOn']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . 'В настоящее время один или несколько плагинов ожидают выполнения действий и могут находиться в несогласованном состоянии. Из-за этого могут возникать ошибки. Если это не изменится в ближайшее время, обратитесь за дополнительной информацией к разработчику.' . '<br />
		<br />
		<a href="' . $__templater->func('link', array('add-ons', ), true) . '">' . 'Посмотреть плагины' . $__vars['xf']['language']['ellipsis'] . '</a>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['legacyConfig']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important">
		' . 'Старый файл конфигурации (<code>library/config.php</code>) по-прежнему доступен на сервере. Если он Вам больше не нужен, удалите или переименуйте его. Теперь Ваша актуальная конфигурация находится в файле <code>src/config.php</code>.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['hasStoppedJobs']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . 'Есть невыполненные задания планировщика. Они могли быть запущены не тогда, когда это ожидалось.' . '
	</div>
';
	} else if ($__vars['hasStoppedManualJobs']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'Ожидается ручное завершение задачи перестроения. <a href="' . $__templater->func('link', array('tools/run-job', ), true) . '">Продолжить выполнение.</a>' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['isImportRunning'] AND $__vars['xf']['options']['activitySummaryEmail']['enabled']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'Во время выполнения импорта отправка пользователям email со сводкой активности отключена.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	$__vars['firstFileCheck'] = $__templater->filter($__vars['fileChecks'], array(array('first', array()),), false);
	$__finalCompiled .= '
';
	if ($__vars['firstFileCheck']['check_state'] == 'failure') {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		<a href="' . $__templater->func('link', array('tools/file-check/results', $__vars['firstFileCheck'], ), true) . '">
			' . '' . $__templater->filter($__vars['firstFileCheck']['total_missing'] + $__vars['firstFileCheck']['total_inconsistent'], array(array('number', array()),), true) . ' файл(ов) отсутствуют или имеют неожиданное содержимое. Вам следует посмотреть их.' . '
		</a>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['requirementErrors']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . 'При проверке сервера на соответствия минимальным требованиям возникли следующие ошибки' . ':
		<ul>
			';
		if ($__templater->isTraversable($__vars['requirementErrors'])) {
			foreach ($__vars['requirementErrors'] AS $__vars['error']) {
				$__finalCompiled .= '
				<li>' . $__templater->escape($__vars['error']) . '</li>
			';
			}
		}
		$__finalCompiled .= '
		</ul>
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('user', ))) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			' . $__templater->form('
				<div class="block-body">
					' . $__templater->formTextBoxRow(array(
			'name' => 'query',
			'placeholder' => 'Имя пользователя, email, IP' . $__vars['xf']['language']['ellipsis'],
			'value' => '',
		), array(
			'label' => 'Поиск пользователей',
		)) . '
					' . $__templater->formSubmitRow(array(
			'icon' => 'search',
		), array(
		)) . '
				</div>
			', array(
			'action' => $__templater->func('link', array('users/quick-search', ), false),
		)) . '
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['stats'], 'empty', array()) AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('viewStatistics', ))) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('public:chartist.css');
		$__finalCompiled .= '
	';
		$__templater->includeCss('stats.less');
		$__finalCompiled .= '

	';
		$__templater->includeJs(array(
			'prod' => 'xf/stats-compiled.js',
			'dev' => 'vendor/chartist/chartist.min.js, xf/stats.js',
		));
		$__finalCompiled .= '

	<div class="block">
		<div class="block-container">
			<h2 class="block-header"><a href="' . $__templater->func('link', array('stats', ), true) . '">' . 'Статистика' . '</a></h2>
			<div class="block-body block-row">
				<ul class="graphList">
					';
		if ($__templater->isTraversable($__vars['stats'])) {
			foreach ($__vars['stats'] AS $__vars['statsData']) {
				$__finalCompiled .= '
						<li data-xf-init="stats" data-max-ticks="4">
							<script class="js-statsData" type="application/json">
								' . $__templater->filter($__vars['statsData']['data'], array(array('json', array()),array('raw', array()),), true) . '
							</script>
							<script class="js-statsSeriesLabels" type="application/json">
								' . $__templater->filter($__vars['statsData']['phrases'], array(array('json', array()),array('raw', array()),), true) . '
							</script>
							<div class="ct-chart ct-chart--small ct-major-tenth js-statsChart"></div>
							<ul class="ct-legend js-statsLegend"></ul>
						</li>
					';
			}
		}
		$__finalCompiled .= '
				</ul>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

<div class="iconicLinks">
	<ul class="iconicLinks-list">
		';
	if ($__templater->isTraversable($__vars['navigation'])) {
		foreach ($__vars['navigation'] AS $__vars['entry']) {
			$__finalCompiled .= '
			';
			$__vars['nav'] = $__vars['entry']['record'];
			$__finalCompiled .= '
			';
			if ($__vars['nav']['link']) {
				$__finalCompiled .= '
				<li><a href="' . $__templater->func('link', array($__vars['nav']['link'], ), true) . '">
					<div class="iconicLinks-icon">' . $__templater->fontAwesome('fa-fw ' . $__templater->escape($__vars['nav']['icon']), array(
				)) . '</div>
					<div class="iconicLinks-title">' . $__templater->escape($__vars['nav']['title']) . '</div>
				</a></li>
			';
			}
			$__finalCompiled .= '
		';
		}
	}
	$__finalCompiled .= '
		<li class="iconicLinks-placeholder"></li>
		<li class="iconicLinks-placeholder"></li>
		<li class="iconicLinks-placeholder"></li>
		<li class="iconicLinks-placeholder"></li>
		<li class="iconicLinks-placeholder"></li>
	</ul>
</div>

';
	if ($__vars['envReport']) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">
				<span class="collapseTrigger collapseTrigger--block ' . ((!$__templater->func('is_toggled', array('collapse_env_report', ), false)) ? 'is-active' : '') . '" data-xf-click="toggle" data-xf-init="toggle-storage" data-storage-key="collapse_env_report" data-storage-type="cookie" data-target="#js-collapse-env-report">
					' . 'Информация о серверном окружении' . '
				</span>
			</h2>
			<div class="block-body block-body--collapsible block-row ' . ((!$__templater->func('is_toggled', array('collapse_env_report', ), false)) ? 'is-active' : '') . '" id="js-collapse-env-report">
				';
		if ($__vars['envReport']['phpVersionState'] == 'not_newest') {
			$__finalCompiled .= '
					<div class="block-rowMessage block-rowMessage--warning">
						' . 'Ваша версия PHP устарела. Рекомендуемая версии 7.2.0 и выше.' . '
					</div>
				';
		} else if ($__vars['envReport']['phpVersionState'] == 'recommended') {
			$__finalCompiled .= '
					<div class="block-rowMessage block-rowMessage--success">
						' . 'У Вас установлена рекомендуемая версия PHP.' . '
					</div>
				';
		}
		$__finalCompiled .= '
				<div class="pairWrapper pairWrapper--spaced">
					<dl class="pairs pairs--columns">
						<dt>' . 'Версия PHP' . '</dt>
						<dd><a href="' . $__templater->func('link', array('tools/phpinfo', ), true) . '" target="_blank">' . $__templater->escape($__vars['envReport']['phpVersion']) . '</a></dd>
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Версия MySQL' . '</dt>
						<dd>' . $__templater->escape($__vars['envReport']['mysqlVersion']) . '</dd>
					</dl>
					';
		if ($__vars['envReport']['server_software']) {
			$__finalCompiled .= '
						<dl class="pairs pairs--columns">
							<dt>' . 'Программное обеспечение сервера' . '</dt>
							<dd>' . $__templater->escape($__vars['envReport']['server_software']) . '</dd>
						</dl>
					';
		}
		$__finalCompiled .= '
					';
		if ($__templater->isTraversable($__vars['envReport']['ini'])) {
			foreach ($__vars['envReport']['ini'] AS $__vars['ini'] => $__vars['iniVal']) {
				$__finalCompiled .= '
						<dl class="pairs pairs--columns">
							<dt>PHP <code>' . $__templater->escape($__vars['ini']) . '</code></dt>
							<dd>' . $__templater->escape($__vars['iniVal']) . '</dd>
						</dl>
					';
			}
		}
		$__finalCompiled .= '
					<dl class="pairs pairs--columns">
						<dt>' . 'Версия cURL' . '</dt>
						<dd>' . ($__templater->escape($__vars['envReport']['curl_version']) ?: 'Н/Д') . '</dd>
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Версия SSL для cURL' . '</dt>
						<dd>' . ($__templater->escape($__vars['envReport']['ssl_version']) ?: 'Н/Д') . '</dd>
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Версия OpenSSL' . '</dt>
						<dd>' . ($__templater->escape($__vars['envReport']['openssl_version']) ?: 'Н/Д') . '
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Suhosin включён' . '</dt>
						<dd>' . ($__vars['envReport']['suhosin'] ? 'Да' : 'Нет') . '</dd>
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Поддержка Imagick' . '</dt>
						<dd>' . ($__vars['envReport']['imagick'] ? 'Да' : 'Нет') . '</dd>
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Поддержка EXIF' . '</dt>
						<dd>' . ($__vars['envReport']['exif'] ? 'Да' : 'Нет') . '</dd>
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Поддержка <code>GZip</code>' . '</dt>
						<dd>' . ($__vars['envReport']['gzip'] ? 'Да' : 'Нет') . '</dd>
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Поддержка <code>mbstring</code>' . '</dt>
						<dd>' . ($__vars['envReport']['mbstring'] ? 'Да' : 'Нет') . '</dd>
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Поддержка <code>gmp</code>' . '</dt>
						<dd>' . ($__vars['envReport']['gmp'] ? 'Да' : 'Нет') . '</dd>
					</dl>
					<dl class="pairs pairs--columns">
						<dt>' . 'Поддержка <code>ZipArchive</code>' . '</dt>
						<dd>' . ($__vars['envReport']['zip'] ? 'Да' : 'Нет') . '</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['logCounts'], 'empty', array()) AND $__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('viewLogs', ))) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">
				<span class="collapseTrigger collapseTrigger--block ' . ((!$__templater->func('is_toggled', array('collapse_logged_activity', ), false)) ? 'is-active' : '') . '" data-xf-click="toggle" data-xf-init="toggle-storage" data-storage-key="collapse_logged_activity" data-storage-type="cookie" data-target="#js-collapse-logged-activity">
					' . 'Записи в журналах' . '
				</span>
			</h2>
			<div class="block-body block-body--collapsible ' . ((!$__templater->func('is_toggled', array('collapse_logged_activity', ), false)) ? 'is-active' : '') . '" id="js-collapse-logged-activity">
				' . $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Тип',
		),
		array(
			'_type' => 'cell',
			'html' => 'За последний день',
		),
		array(
			'_type' => 'cell',
			'html' => 'На прошлой неделе',
		),
		array(
			'_type' => 'cell',
			'html' => 'В прошлом месяце',
		),
		array(
			'_type' => 'cell',
			'html' => ' ',
		))) . '

					' . '
					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Действия модераторов',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['moderator']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['moderator']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['moderator']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->func('link', array('logs/moderator', ), false),
			'_type' => 'action',
			'html' => 'Посмотреть',
		))) . '

					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Спам-триггеры',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamTrigger']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamTrigger']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamTrigger']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->func('link', array('logs/spam-trigger', ), false),
			'_type' => 'action',
			'html' => 'Посмотреть',
		))) . '

					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Очистка спама',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamCleaner']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamCleaner']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['spamCleaner']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->func('link', array('logs/spam-cleaner', ), false),
			'_type' => 'action',
			'html' => 'Посмотреть',
		))) . '

					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Недоставленные письма',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['emailBounce']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['emailBounce']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['emailBounce']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->func('link', array('logs/email-bounces', ), false),
			'_type' => 'action',
			'html' => 'Посмотреть',
		))) . '

					' . $__templater->dataRow(array(
		), array(array(
			'_type' => 'cell',
			'html' => 'Полученные платежи',
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['payment']['day'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['payment']['week'], array(array('number', array()),), true),
		),
		array(
			'_type' => 'cell',
			'html' => $__templater->filter($__vars['logCounts']['payment']['month'], array(array('number', array()),), true),
		),
		array(
			'href' => $__templater->func('link', array('logs/payment-provider', ), false),
			'_type' => 'action',
			'html' => 'Посмотреть',
		))) . '
					' . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['staffOnline'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">
				<span class="collapseTrigger collapseTrigger--block ' . ((!$__templater->func('is_toggled', array('collapse_staff_online', ), false)) ? 'is-active' : '') . '" data-xf-click="toggle" data-xf-init="toggle-storage" data-storage-key="collapse_staff_online" data-storage-type="cookie" data-target="#js-collapse-staff-online">
					' . 'Команда онлайн' . '
				</span>
			</h2>
			<ul class="block-body block-body--collapsible ' . ((!$__templater->func('is_toggled', array('collapse_staff_online', ), false)) ? 'is-active' : '') . '" id="js-collapse-staff-online">
				';
		if ($__templater->isTraversable($__vars['staffOnline'])) {
			foreach ($__vars['staffOnline'] AS $__vars['user']) {
				$__finalCompiled .= '
					<li class="block-row">
						<div class="contentRow">
							<div class="contentRow-figure">
								' . $__templater->func('avatar', array($__vars['user'], 'xs', false, array(
				))) . '
							</div>
							<div class="contentRow-main contentRow-main--close">
								' . $__templater->func('username_link', array($__vars['user'], true, array(
				))) . '
								<div class="contentRow-minor">
									' . $__templater->func('user_title', array($__vars['user'], false, array(
				))) . '
								</div>
							</div>
						</div>
					</li>
				';
			}
		}
		$__finalCompiled .= '
			</ul>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['fileChecks'], 'empty', array())) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">
				<span class="collapseTrigger collapseTrigger--block ' . ((!$__templater->func('is_toggled', array('collapse_health_check', ), false)) ? 'is-active' : '') . '" data-xf-click="toggle" data-xf-init="toggle-storage" data-storage-key="collapse_health_check" data-storage-type="cookie" data-target="#js-collapse-health-check">
					' . 'Результат проверки целостности файлов' . '
				</span>
			</h2>
			<div class="block-body block-body--collapsible ' . ((!$__templater->func('is_toggled', array('collapse_health_check', ), false)) ? 'is-active' : '') . '" id="js-collapse-health-check">
				' . $__templater->callMacro('tools_file_check', 'file_check_list', array(
			'fileChecks' => $__vars['fileChecks'],
		), $__vars) . '
			</div>
		</div>
	</div>
';
	}
	$__finalCompiled .= '

';
	if (($__templater->method($__vars['xf']['visitor'], 'hasAdminPermission', array('addOn', )) AND !$__templater->test($__vars['installedAddOns'], 'empty', array()))) {
		$__finalCompiled .= '
	';
		$__templater->includeCss('addon_list.less');
		$__finalCompiled .= '
	<div class="addOnList">
		<div class="block">
			<div class="block-container">
				<h2 class="block-header">
					<span class="collapseTrigger collapseTrigger--block ' . ((!$__templater->func('is_toggled', array('collapse_add_ons', ), false)) ? 'is-active' : '') . '" data-xf-click="toggle" data-xf-init="toggle-storage" data-storage-key="collapse_add_ons" data-storage-type="cookie" data-target="#js-collapse-add-ons">
						' . 'Установленные плагины' . '
					</span>
				</h2>
				<ul class="block-body block-body--collapsible ' . ((!$__templater->func('is_toggled', array('collapse_add_ons', ), false)) ? 'is-active' : '') . '" id="js-collapse-add-ons">
					';
		if ($__templater->isTraversable($__vars['installedAddOns'])) {
			foreach ($__vars['installedAddOns'] AS $__vars['addOn']) {
				$__finalCompiled .= '
						' . $__templater->callMacro('addon_list_macros', 'addon_list_item', array(
					'addOn' => $__vars['addOn'],
				), $__vars) . '
					';
			}
		}
		$__finalCompiled .= '
				</ul>
			</div>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);