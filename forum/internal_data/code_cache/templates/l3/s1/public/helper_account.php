<?php
// FROM HASH: 6957d26f484a95fc214375383cfdf884
return array(
'macros' => array('dob_privacy_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'hint' => '',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'value' => '1',
		'name' => 'option[show_dob_date]',
		'checked' => $__vars['xf']['visitor']['Option']['show_dob_date'],
		'label' => 'Показывать день и месяц рождения',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'value' => '1',
		'name' => 'option[show_dob_year]',
		'checked' => $__vars['xf']['visitor']['Option']['show_dob_year'],
		'label' => 'Показывать год рождения',
		'hint' => 'Это позволит пользователям видеть Ваш возраст.',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
		'hint' => ($__vars['hint'] ? $__templater->escape($__vars['hint']) : ''),
	)) . '
';
	return $__finalCompiled;
}
),
'activity_privacy_row' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'user[visible]',
		'checked' => $__vars['xf']['visitor']['visible'],
		'label' => 'Показывать Ваш онлайн статус',
		'hint' => 'Это позволит другим пользователям видеть, когда Вы онлайн',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'name' => 'user[activity_visible]',
		'checked' => $__vars['xf']['visitor']['activity_visible'],
		'label' => 'Показывать Вашу текущую активность',
		'hint' => 'Это позволит другим пользователям видеть, какую страницу Вы просматриваете в данный момент.',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
		'label' => 'Настройки конфиденциальности',
	)) . '
';
	return $__finalCompiled;
}
),
'email_options_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'showExplain' => false,
		'showConversationOption' => false,
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	$__compilerTemp1 = array(array(
		'name' => 'option[receive_admin_email]',
		'selected' => $__vars['xf']['visitor']['Option']['receive_admin_email'],
		'label' => 'Получать электронные письма о новостях и обновлениях',
		'hint' => '',
		'_type' => 'option',
	));
	if ($__vars['xf']['options']['activitySummaryEmail']['enabled']) {
		$__compilerTemp1[] = array(
			'name' => 'enable_activity_summary_email',
			'selected' => $__vars['xf']['visitor']['last_summary_email_date'] !== null,
			'label' => 'Получать электронные письма со сводкой активности',
			'hint' => 'Мы будем информировать Вас о новом контенте, если заметим Ваше отсутствие в течение некоторого времени.',
			'_type' => 'option',
		);
	}
	if ($__vars['showConversationOption']) {
		$__compilerTemp1[] = array(
			'name' => 'option[email_on_conversation]',
			'selected' => $__vars['xf']['visitor']['Option']['email_on_conversation'],
			'label' => 'Получать уведомления на электронную почту, если появилось новое сообщение в личной переписке',
			'_type' => 'option',
		);
	}
	$__compilerTemp2 = '';
	if ($__vars['showExplain']) {
		$__compilerTemp2 .= 'Дополнительные параметры электронной почты Вы можете найти в <a href="' . $__templater->func('link', array('account/preferences', ), true) . '">настройках</a>.';
	}
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), $__compilerTemp1, array(
		'label' => 'Параметры электронной почты',
		'explain' => $__compilerTemp2,
	)) . '

	';
	if (!$__vars['xf']['options']['activitySummaryEmail']['enabled']) {
		$__finalCompiled .= '
		';
		if ($__vars['xf']['visitor']['last_summary_email_date'] !== null) {
			$__finalCompiled .= '
			' . $__templater->formHiddenVal('enable_activity_summary_email', '1', array(
			)) . '
		';
		}
		$__finalCompiled .= '
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

';
	return $__finalCompiled;
}
);