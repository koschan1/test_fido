<?php
// FROM HASH: 6819f77ef9a559fbd530368a914794ec
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('

	' . $__templater->formCheckBox(array(
	), array(array(
		'name' => $__vars['inputName'] . '[visible]',
		'selected' => $__vars['option']['option_value']['visible'],
		'label' => 'Показывать онлайн-статус',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[activity_visible]',
		'selected' => $__vars['option']['option_value']['activity_visible'],
		'label' => 'Показывать текущую активность',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[content_show_signature]',
		'selected' => $__vars['option']['option_value']['content_show_signature'],
		'label' => 'Показывать подписи вместе с сообщениями',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[show_dob_date]',
		'selected' => $__vars['option']['option_value']['show_dob_date'],
		'label' => 'Показывать день и месяц рождения',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[show_dob_year]',
		'selected' => $__vars['option']['option_value']['show_dob_year'],
		'label' => 'Показывать год рождения',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[receive_admin_email]',
		'selected' => $__vars['option']['option_value']['receive_admin_email'],
		'label' => 'Получать электронные письма о новостях и обновлениях',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[email_on_conversation]',
		'selected' => $__vars['option']['option_value']['email_on_conversation'],
		'label' => 'Получать уведомления на электронную почту, если появилось новое сообщение в личной переписке',
		'_type' => 'option',
	),
	array(
		'name' => $__vars['inputName'] . '[push_on_conversation]',
		'selected' => $__vars['option']['option_value']['push_on_conversation'],
		'label' => 'Получать push-уведомления о появлении новых сообщений в переписках',
		'_type' => 'option',
	))) . '
	<div class="u-inputSpacer">
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_dws">' . 'Отслеживать контент при создании' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[creation_watch_state]',
		'value' => $__vars['option']['option_value']['creation_watch_state'],
		'id' => $__vars['inputName'] . '_dws',
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Да',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Да, с электронной почтой',
		'_type' => 'option',
	),
	array(
		'label' => 'Нет',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_dws">' . 'Отслеживать контент при взаимодействии' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[interaction_watch_state]',
		'value' => $__vars['option']['option_value']['interaction_watch_state'],
		'id' => $__vars['inputName'] . '_dws',
	), array(array(
		'value' => 'watch_no_email',
		'label' => 'Да',
		'_type' => 'option',
	),
	array(
		'value' => 'watch_email',
		'label' => 'Да, с электронной почтой',
		'_type' => 'option',
	),
	array(
		'label' => 'Нет',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_avp">' . 'Просматривать страницу профиля пользователя' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_view_profile]',
		'value' => $__vars['option']['option_value']['allow_view_profile'],
		'id' => $__vars['inputName'] . '_avp',
	), array(array(
		'value' => 'everyone',
		'label' => 'Все посетители',
		'_type' => 'option',
	),
	array(
		'value' => 'members',
		'label' => 'Только зарегистрированные пользователи',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Только подписчики',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Никто',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_app">' . 'Оставлять сообщения в профиле этого пользователя' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_post_profile]',
		'value' => $__vars['option']['option_value']['allow_post_profile'],
		'id' => $__vars['inputName'] . '_app',
	), array(array(
		'value' => 'members',
		'label' => 'Только зарегистрированные пользователи',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Только подписчики',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Никто',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_arnf">' . 'Просматривать ленту новостей этого пользователя' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_receive_news_feed]',
		'value' => $__vars['option']['option_value']['allow_receive_news_feed'],
		'id' => $__vars['inputName'] . '_arnf',
	), array(array(
		'value' => 'everyone',
		'label' => 'Все посетители',
		'_type' => 'option',
	),
	array(
		'value' => 'members',
		'label' => 'Только зарегистрированные пользователи',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Только подписчики',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Никто',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_aspc">' . 'Начинать переписку с этим пользователем' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_send_personal_conversation]',
		'value' => $__vars['option']['option_value']['allow_send_personal_conversation'],
		'id' => $__vars['inputName'] . '_aspc',
	), array(array(
		'value' => 'members',
		'label' => 'Только зарегистрированные пользователи',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Только подписчики',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Никто',
		'_type' => 'option',
	))) . '</dd>
		</dl>
		<dl class="inputLabelPair">
			<dt><label for="' . $__templater->escape($__vars['inputName']) . '_avi">' . 'Просматривать идентификационные данные этого пользователя' . '</label></dt>
			<dd>' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[allow_view_identities]',
		'id' => $__vars['inputName'] . '_avi',
		'value' => $__vars['option']['option_value']['allow_view_identities'],
	), array(array(
		'value' => 'everyone',
		'label' => 'Все посетители',
		'_type' => 'option',
	),
	array(
		'value' => 'members',
		'label' => 'Только зарегистрированные пользователи',
		'_type' => 'option',
	),
	array(
		'value' => 'followed',
		'label' => 'Только подписчики',
		'_type' => 'option',
	),
	array(
		'value' => 'none',
		'label' => 'Никто',
		'_type' => 'option',
	))) . '</dd>
		</dl>
	</div>
', array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);