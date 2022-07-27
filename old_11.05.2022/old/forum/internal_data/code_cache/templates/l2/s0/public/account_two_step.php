<?php
// FROM HASH: 7b2744e2aba934498d78b597e05ad27f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Двухфакторная аутентификация');
	$__finalCompiled .= '

';
	$__templater->wrapTemplate('account_wrapper', $__vars);
	$__finalCompiled .= '

';
	if ($__vars['backupAdded']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic">
		' . 'Резервные коды проверки были сгенерированы автоматически. Каждый из этих кодов может быть использован только один раз, в случае, если Вы не имеете доступа к другим средствам проверки. Эти коды должны быть сохранены в безопасном месте.' . '
		<a href="' . $__templater->func('link', array('account/two-step/manage', array('provider_id' => 'backup', ), ), true) . '">' . 'Посмотреть Ваши резервные коды.' . '</a>
		<a href="' . $__templater->func('link', array('account/two-step/backup-codes', ), true) . '" data-xf-click="overlay" data-overlay-config="' . $__templater->filter(array('backdropClose' => false, 'escapeClose' => false, ), array(array('json', array()),), true) . '" data-load-auto-click="true" style="display: none"></a>
	</div>
';
	}
	$__finalCompiled .= '

';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Двухфакторная аутентификация увеличивает безопасность учётной записи, требуя предоставления дополнительного кода, чтобы завершить процесс авторизации. Если Ваш пароль был скомпрометирован, эта проверка поможет предотвратить несанкционированный доступ к Вашей учётной записи.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			';
	if ($__templater->isTraversable($__vars['providers'])) {
		foreach ($__vars['providers'] AS $__vars['provider']) {
			if ($__templater->method($__vars['provider'], 'isEnabled', array()) OR $__templater->method($__vars['provider'], 'canEnable', array())) {
				$__finalCompiled .= '
				<div class="block-row block-row--separated">
					<div class="contentRow">
						<div class="contentRow-main contentRow-main--close">
							<div class="contentRow-extra">
								';
				if ($__templater->method($__vars['provider'], 'canEnable', array())) {
					$__finalCompiled .= '
									' . $__templater->form('
										' . $__templater->button('Включить', array(
						'type' => 'submit',
					), '', array(
					)) . '
									', array(
						'action' => $__templater->func('link', array('account/two-step/enable', $__vars['provider'], ), false),
					)) . '
								';
				}
				$__finalCompiled .= '
								';
				if ($__templater->method($__vars['provider'], 'canDisable', array())) {
					$__finalCompiled .= '
									' . $__templater->button('
										' . 'Отключить' . '
									', array(
						'href' => $__templater->func('link', array('account/two-step/disable', $__vars['provider'], ), false),
						'overlay' => 'true',
					), '', array(
					)) . '
								';
				}
				$__finalCompiled .= '
								';
				if ($__templater->method($__vars['provider'], 'canManage', array())) {
					$__finalCompiled .= '
									' . $__templater->button('
										' . 'Управление' . '
									', array(
						'href' => $__templater->func('link', array('account/two-step/manage', $__vars['provider'], ), false),
					), '', array(
					)) . '
								';
				}
				$__finalCompiled .= '
							</div>
							<h2 class="contentRow-title">' . $__templater->escape($__vars['provider']['title']) . '</h2>
							<div class="contentRow-minor">' . $__templater->escape($__vars['provider']['description']) . '</div>
						</div>
					</div>
				</div>
			';
			}
		}
	}
	$__finalCompiled .= '
		</div>
		';
	if ($__vars['xf']['visitor']['Option']['use_tfa']) {
		$__finalCompiled .= '
			<div class="block-footer">
				<span class="block-footer-controls">' . $__templater->button('
					' . 'Отключить двухфакторную аутентификацию' . '
				', array(
			'href' => $__templater->func('link', array('account/two-step/disable', ), false),
			'overlay' => 'true',
		), '', array(
		)) . '</span>
			</div>
		';
	}
	$__finalCompiled .= '
	</div>
</div>

';
	if ($__vars['currentTrustRecord'] OR $__vars['hasOtherTrusted']) {
		$__finalCompiled .= '
	<div class="block">
		<div class="block-container">
			<h2 class="block-header">' . 'Доверенные устройства' . '</h2>
			<div class="block-body">
				';
		if ($__vars['currentTrustRecord']) {
			$__finalCompiled .= '
					<div class="block-row block-row--separated">
						' . 'Это устройство в настоящее время является доверенным до ' . $__templater->func('date', array($__vars['currentTrustRecord']['trusted_until'], ), true) . '. Вам не нужно проходить двухфакторную аутентификацию до этой даты. Устройство можно удалить из списка доверенных, но тогда при следующей попытке авторизации нужно будет пройти двухфакторную аутентификацию.' . '

						' . $__templater->form('
							' . $__templater->button('Удалить это устройство из доверенных', array(
				'type' => 'submit',
			), '', array(
			)) . '
						', array(
				'action' => $__templater->func('link', array('account/two-step/trusted-disable', ), false),
			)) . '
					</div>
				';
		}
		$__finalCompiled .= '
				';
		if ($__vars['hasOtherTrusted']) {
			$__finalCompiled .= '
					<div class="block-row block-row--separated">
						' . 'Имеются другие доверенные устройства. Вам не нужно проходить двухфакторную аутентификацию для них. Если Вы утратили доступ к доверенному устройству, рекомендуется удалить его из списка доверенных.' . '
						';
			if ($__vars['currentTrustRecord']) {
				$__finalCompiled .= 'Это устройство будет оставаться доверенным.';
			}
			$__finalCompiled .= '

						' . $__templater->form('
							' . $__templater->button('Удалить другие устройства из доверенных', array(
				'type' => 'submit',
			), '', array(
			)) . '
							' . $__templater->formHiddenVal('others', '1', array(
			)) . '
						', array(
				'action' => $__templater->func('link', array('account/two-step/trusted-disable', ), false),
			)) . '
					</div>
				';
		}
		$__finalCompiled .= '
			</div>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);