<?php
// FROM HASH: d7c714c06134cd903c803ddcbce2e054
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if (!$__vars['options']['poll_id']) {
		$__finalCompiled .= '

	' . $__templater->formTextBoxRow(array(
			'name' => 'options[content_url]',
			'type' => 'url',
		), array(
			'label' => 'Ссылка на тему с опросом',
			'explain' => 'Укажите ссылку на тему, в которой в данный момент проходит опрос.',
		)) . '

';
	} else if ($__vars['poll']) {
		$__finalCompiled .= '

	' . $__templater->formRow('
		<a href="' . $__templater->escape($__vars['contentLink']) . '" target="_blank">' . $__templater->escape($__vars['contentTitle']) . '</a>
	', array(
			'label' => 'Опрос для отображения',
		)) . '

	' . $__templater->formHiddenVal('options[poll_id]', $__vars['poll']['poll_id'], array(
		)) . '

	' . $__templater->formCheckBoxRow(array(
		), array(array(
			'name' => 'options[change_url]',
			'label' => 'Изменить URL-адрес контента' . $__vars['xf']['language']['label_separator'],
			'_dependent' => array('
				' . $__templater->formTextBox(array(
			'name' => 'options[content_url]',
			'type' => 'url',
		)) . '
			'),
			'_type' => 'option',
		)), array(
			'explain' => 'Если Вы хотите изменить текущий опрос, введите ссылку на тему, в которой в данный момент проходит опрос.',
		)) . '

';
	} else {
		$__finalCompiled .= '

	' . $__templater->formRow('
		<div class="blockMessage blockMessage--error blockMessage--iconic">' . 'Опрос для отображения не найден. Возможно, он был удалён. Пожалуйста, укажите новую ссылку ниже.' . '</div>
	', array(
		)) . '

	' . $__templater->formTextBoxRow(array(
			'name' => 'options[content_url]',
			'type' => 'url',
		), array(
			'label' => 'Ссылка на тему с опросом',
			'explain' => 'Укажите ссылку на тему, в которой в данный момент проходит опрос.',
		)) . '

';
	}
	return $__finalCompiled;
}
);