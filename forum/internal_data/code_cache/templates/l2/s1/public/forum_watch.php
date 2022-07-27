<?php
// FROM HASH: 3b5ab0ddc1f768f81611bef1b688ec5d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['isWatched']) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Перестать отслеживать раздел');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Отслеживать раздел');
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	$__templater->breadcrumbs($__templater->method($__vars['forum'], 'getBreadcrumbs', array()));
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['isWatched']) {
		$__compilerTemp1 .= '
				' . $__templater->formInfoRow('
					' . 'Вы уверены, что хотите перестать отслеживать этот раздел?' . '
				', array(
			'rowtype' => 'confirm',
		)) . '
				' . $__templater->formHiddenVal('stop', '1', array(
		)) . '
			';
	} else {
		$__compilerTemp1 .= '
				';
		if ($__vars['forum']['allowed_watch_notifications'] != 'none') {
			$__compilerTemp1 .= '
					';
			$__compilerTemp2 = array(array(
				'value' => 'thread',
				'label' => 'Новые темы',
				'_type' => 'option',
			));
			if ($__vars['forum']['allowed_watch_notifications'] == 'all') {
				$__compilerTemp2[] = array(
					'value' => 'message',
					'label' => 'Новые сообщения',
					'_type' => 'option',
				);
			}
			$__compilerTemp2[] = array(
				'value' => '',
				'hint' => 'Раздел все ещё будет отображаться на странице со списком отслеживаемых разделов, который можно использовать просто как список интересных Вам разделов.',
				'label' => 'Не отправлять уведомления',
				'_type' => 'option',
			);
			$__compilerTemp1 .= $__templater->formRadioRow(array(
				'name' => 'notify',
				'value' => 'thread',
			), $__compilerTemp2, array(
				'label' => 'Уведомлять, если есть',
			)) . '

					' . $__templater->formCheckBoxRow(array(
			), array(array(
				'name' => 'send_alert',
				'value' => '1',
				'selected' => true,
				'label' => 'Оповещения',
				'_type' => 'option',
			),
			array(
				'name' => 'send_email',
				'value' => '1',
				'label' => 'Электронная почта',
				'_type' => 'option',
			)), array(
				'label' => 'Отправлять уведомления через',
			)) . '
				';
		}
		$__compilerTemp1 .= '
			';
	}
	$__compilerTemp3 = '';
	if ($__vars['isWatched']) {
		$__compilerTemp3 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Перестать отслеживать',
			'icon' => 'notificationsOff',
		), array(
			'rowtype' => 'simple',
		)) . '
		';
	} else {
		$__compilerTemp3 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Отслеживать',
			'icon' => 'notificationsOn',
		), array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '
		</div>
		' . $__compilerTemp3 . '
	</div>
', array(
		'action' => $__templater->func('link', array('forums/watch', $__vars['forum'], ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);