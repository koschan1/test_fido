<?php
// FROM HASH: dfd3259b96212e03fe46e1546da82a86
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => $__vars['inputName'] . '[enabled]',
		'selected' => $__vars['option']['option_value']['enabled'],
		'label' => $__templater->escape($__vars['option']['title']),
		'_dependent' => array('
			<div>' . 'API-ключ' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[api_key]',
		'value' => $__vars['option']['option_value']['api_key'],
		'required' => 'required',
		'pattern' => '^[a-zA-Z0-9]{32}$',
		'title' => 'Пожалуйста, введите действительный API-ключ',
	)) . '
			<dfn class="formRow-explain">' . 'Вы должны получить ключ в <a href="https://developers.giphy.com/dashboard/" target="_blank">панели разработчиков GIPHY</a> и обновить его до ключа для рабочей среды.' . '</dfn>
		', '
			<div>' . 'Показывать GIF-файлы до следующего рейтинга (включительно)' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formSelect(array(
		'name' => $__vars['inputName'] . '[rating]',
		'id' => $__vars['option']['option_id'] . '_rating',
		'value' => $__vars['option']['option_value']['rating'],
	), array(array(
		'value' => 'g',
		'label' => 'G - Без ограничений',
		'_type' => 'option',
	),
	array(
		'value' => 'pg',
		'label' => 'PG - Рекомендуется родительский контроль',
		'_type' => 'option',
	),
	array(
		'value' => 'pg-13',
		'label' => 'PG-13 - Требуется родительский контроль',
		'_type' => 'option',
	),
	array(
		'value' => 'r',
		'label' => 'R - Только для взрослых',
		'_type' => 'option',
	))) . '
			<dfn class="formRow-explain">' . 'Пояснения к рейтингам можна найти в <a href="https://developers.giphy.com/docs/optional-settings#rating" target="_blank">документации для разработчиков GIPHY</a>.' . '</dfn>
		'),
		'_type' => 'option',
	)), array(
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);