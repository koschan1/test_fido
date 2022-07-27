<?php
// FROM HASH: 72d49e3753e5d759345dfdb2f6b8b1fe
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Разослать оповещения');
	$__finalCompiled .= '
';
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('Вы можете использовать эту форму для отправки оповещений пользователям, удовлетворяющим критериям, указанным ниже.');
	$__templater->pageParams['pageDescriptionMeta'] = true;
	$__finalCompiled .= '

';
	if ($__vars['sent']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--success blockMessage--iconic">
		' . 'Ваше оповещение было отправлено ' . $__templater->filter($__vars['sent'], array(array('number', array()),), true) . ' пользователям.' . '
	</div>
';
	}
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'name' => 'from_user',
		'value' => $__vars['xf']['visitor']['username'],
		'ac' => 'single',
	), array(
		'label' => 'От пользователя',
		'explain' => 'Если Вы хотите, чтобы оповещения отображались от имени определённого пользователя, введите его имя выше. Если имя не указано, оповещения будут отправлены анонимно.',
	)) . '

			<hr class="formRowSep" />

			' . $__templater->formTextBoxRow(array(
		'name' => 'link_url',
		'type' => 'url',
		'dir' => 'ltr',
	), array(
		'label' => 'Ссылка',
	)) . '

			' . $__templater->formTextBoxRow(array(
		'name' => 'link_title',
	), array(
		'label' => 'Заголовок ссылки',
		'explain' => 'Если Вы укажете URL-адрес, то его можно использовать в оповещениях. Ссылку можно вставить вручную в любом месте текста при помощи тега <b>{link}</b>  или она будет добавлена автоматически в самый конец.',
	)) . '

			' . $__templater->formCodeEditorRow(array(
		'name' => 'alert_body',
		'mode' => 'html',
		'data-line-wrapping' => 'true',
		'class' => 'codeEditor--autoSize codeEditor--proportional',
	), array(
		'label' => 'Текст оповещения',
		'hint' => 'Можно использовать HTML',
		'explain' => 'В тексте письма будут заменены следующие макросы: {name}, {id}, {link}.' . ' ' . 'Также можно использовать шаблон {phrase:имя_фразы}, в котором фраза будет заменена языком, выбранным у получателя.',
	)) . '
		</div>

		<h2 class="block-formSectionHeader"><span class="block-formSectionHeader-aligner">' . 'Критерии пользователя' . '</span></h2>
		<div class="block-body">
			' . $__templater->includeTemplate('helper_user_search_criteria', $__vars) . '
		</div>

		' . $__templater->formSubmitRow(array(
		'submit' => 'Продолжить' . $__vars['xf']['language']['ellipsis'],
		'sticky' => 'true',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('users/alert/confirm', ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);