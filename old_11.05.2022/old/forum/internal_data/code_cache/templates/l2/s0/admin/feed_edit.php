<?php
// FROM HASH: 414fc5394d597d10245c255491623a7e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__templater->method($__vars['feed'], 'isInsert', array())) {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Добавить ленту');
		$__finalCompiled .= '
';
	} else {
		$__finalCompiled .= '
	';
		$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Редактировать ленту' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['feed']['title']));
		$__finalCompiled .= '
';
	}
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['feed'], 'isUpdate', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('', array(
			'href' => $__templater->func('link', array('feeds/delete', $__vars['feed'], ), false),
			'icon' => 'delete',
			'overlay' => 'true',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['feed']['feed_id']) {
		$__compilerTemp1 .= '
				' . $__templater->formTextBoxRow(array(
			'name' => 'title',
			'value' => $__vars['feed']['title'],
			'maxlength' => $__templater->func('max_length', array($__vars['feed'], 'title', ), false),
		), array(
			'label' => 'Заголовок',
		)) . '
			';
	}
	$__compilerTemp2 = '';
	if ($__vars['feed']['feed_id']) {
		$__compilerTemp2 .= '
				' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'active',
			'selected' => $__vars['feed']['active'],
			'label' => 'Лента активна',
			'hint' => 'Вы можете отключить эту опцию, чтобы временно остановить импорт записей из данной RSS-ленты.',
			'_type' => 'option',
		)), array(
		)) . '
			';
	} else {
		$__compilerTemp2 .= '
				' . $__templater->formHiddenVal('active', '1', array(
		)) . '
			';
	}
	$__compilerTemp3 = array();
	if ($__templater->isTraversable($__vars['forums'])) {
		foreach ($__vars['forums'] AS $__vars['forum']) {
			$__compilerTemp3[] = array(
				'value' => $__vars['forum']['value'],
				'disabled' => $__vars['forum']['disabled'],
				'label' => $__templater->escape($__vars['forum']['label']),
				'_type' => 'option',
			);
		}
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'url',
		'value' => $__vars['feed']['url'],
		'maxlength' => $__templater->func('max_length', array($__vars['feed'], 'url', ), false),
		'type' => 'url',
		'dir' => 'ltr',
	), array(
		'label' => 'URL-адрес',
	)) . '

			' . $__templater->formSelectRow(array(
		'name' => 'frequency',
		'value' => $__vars['feed']['frequency'],
	), array(array(
		'value' => '600',
		'label' => '' . '10' . ' мин.',
		'_type' => 'option',
	),
	array(
		'value' => '1200',
		'label' => '' . '20' . ' мин.',
		'_type' => 'option',
	),
	array(
		'value' => '1800',
		'label' => '' . '30' . ' мин.',
		'_type' => 'option',
	),
	array(
		'value' => '3600',
		'label' => '' . '60' . ' мин.',
		'_type' => 'option',
	),
	array(
		'value' => '7200',
		'label' => '' . '2' . ' час.',
		'_type' => 'option',
	),
	array(
		'value' => '14400',
		'label' => '' . '4' . ' час.',
		'_type' => 'option',
	),
	array(
		'value' => '21600',
		'label' => '' . '6' . ' час.',
		'_type' => 'option',
	),
	array(
		'value' => '43200',
		'label' => '' . '12' . ' час.',
		'_type' => 'option',
	)), array(
		'label' => 'Забирать новые записи каждые',
	)) . '

			' . $__compilerTemp2 . '

			<hr class="formRowSep" />

			' . $__templater->formRadioRow(array(
		'name' => 'user_id',
		'value' => $__vars['feed']['user_id'],
	), array(array(
		'value' => '0',
		'label' => 'Размещать от гостя, используя имя из ленты сообщений.',
		'_type' => 'option',
	),
	array(
		'value' => '-1',
		'label' => 'Размещать от имени этого пользователя:',
		'selected' => $__vars['feed']['User'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'username',
		'value' => $__vars['feed']['User']['username'],
		'placeholder' => 'Имя пользователя' . $__vars['xf']['language']['ellipsis'],
		'ac' => 'single',
	))),
		'_type' => 'option',
	)), array(
		'label' => 'Автор сообщений',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formSelectRow(array(
		'name' => 'node_id',
		'value' => $__vars['feed']['node_id'],
		'id' => 'js-nodeList',
	), $__compilerTemp3, array(
		'label' => 'Раздел назначения',
		'explain' => '
					' . 'Выберите раздел, в котором должны создаваться новые темы из этой ленты.' . '
				',
	)) . '

			' . $__templater->formPrefixInputRow($__vars['prefixes'], array(
		'textbox-name' => 'title_template',
		'textbox-value' => $__vars['feed']['title_template'],
		'maxlength' => $__templater->func('max_length', array($__vars['feed'], 'title_template', ), false),
		'prefix-value' => $__vars['feed']['prefix_id'],
		'type' => 'thread',
		'href' => $__templater->func('link', array('forums/prefixes', ), false),
		'listen-to' => '#js-nodeList',
	), array(
		'label' => 'Шаблон заголовка',
		'hint' => 'Не обязательно',
	)) . '

			' . $__templater->formTextAreaRow(array(
		'name' => 'message_template',
		'value' => $__vars['feed']['message_template'],
		'rows' => '5',
		'autosize' => 'true',
	), array(
		'label' => 'Шаблон сообщения',
		'hint' => 'Можно использовать BB-код',
		'explain' => 'Вы можете оставить это поле пустым, чтобы добавить контент из RSS-ленты или ввести собственный текст. Можно использовать следующие макросы, ролучающие соответствующие данные из ленты:
<br />{title} {description} {content} {author} {link}',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'discussion_visible',
		'selected' => $__vars['feed']['discussion_visible'],
		'label' => 'Размещать сразу',
		'hint' => 'В противном случае сообщения будут помещены в очередь на модерацию.',
		'_type' => 'option',
	),
	array(
		'name' => 'discussion_open',
		'selected' => $__vars['feed']['discussion_open'],
		'label' => 'Открыта',
		'hint' => 'Пользователи смогут оставлять свои ответы в этой теме',
		'_type' => 'option',
	),
	array(
		'name' => 'discussion_sticky',
		'selected' => $__vars['feed']['discussion_sticky'],
		'label' => 'Закреплено',
		'hint' => 'Важные темы всегда находятся вверху первой страницы списка тем своего раздела',
		'_type' => 'option',
	)), array(
		'label' => 'Настройки',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'sticky' => 'true',
		'icon' => 'save',
	), array(
		'html' => '
			' . $__templater->button('', array(
		'type' => 'submit',
		'name' => 'preview',
		'icon' => 'preview',
	), '', array(
	)) . '
		',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('feeds/save', $__vars['feed'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);