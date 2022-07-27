<?php
// FROM HASH: e5d42d28fb93cfb89fec19e28b6b47d8
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRadioRow(array(
		'name' => $__vars['inputName'] . '[bypassType]',
		'value' => $__vars['option']['option_value']['bypassType'],
	), array(array(
		'value' => '',
		'label' => 'Не использовать обход и проксировать все изображения',
		'_type' => 'option',
	),
	array(
		'value' => 'https',
		'label' => 'Обходить для всех запросов по HTTPS',
		'_type' => 'option',
	),
	array(
		'value' => 'domains',
		'label' => 'Обходить только для доменов, перечисленных ниже' . $__vars['xf']['language']['label_separator'],
		'_dependent' => array('
			' . $__templater->formTextArea(array(
		'name' => $__vars['inputName'] . '[bypassDomains]',
		'value' => $__vars['option']['option_value']['bypassDomains'],
		'rows' => '3',
		'autosize' => 'true',
	)) . '
			<dfn class="inputChoices-explain inputChoices-explain--after">' . 'Укажите каждый домен с новой строки. Если строку будет начинаться с /, то она будет являться регулярным выражением (например: /^domain.com$/i). Поддомены будут включены автоматически, если строка домена не является регулярным выражением.' . '</dfn>
		'),
		'_type' => 'option',
	)), array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => $__templater->escape($__vars['explainHtml']),
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);