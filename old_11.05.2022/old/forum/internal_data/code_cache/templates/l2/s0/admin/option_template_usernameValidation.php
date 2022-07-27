<?php
// FROM HASH: d2db709b7b61ec300ceb6cb9d3c5e3d3
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('

	<ul class="inputChoices inputChoices--noChoice">
		<li class="inputChoices-choice">
			<div>' . 'Запрещённый текст в именах пользователей' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextArea(array(
		'name' => $__vars['inputName'] . '[disallowedNames]',
		'value' => $__vars['option']['option_value']['disallowedNames'],
		'autosize' => 'true',
	)) . '
			<dfn class="inputChoices-explain">' . 'Слова или фразы, которые запрещены для использования в любой части имени пользователя. Каждое слово или фразу размещайте на новой строке. Введя слово "зве", будут запрещены также слова "звено", "звезда" и т.д.' . '</dfn>
		</li>
		<li class="inputChoices-choice">
			<div>' . 'Регулярное выражение для проверки имени пользователя' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[matchRegex]',
		'value' => $__vars['option']['option_value']['matchRegex'],
	)) . '
			<dfn class="inputChoices-explain">' . 'Пользователи при регистрации будут вынуждены указать имя пользователя, удовлетворяющее заданному регулярному выражению. <b>Примечание</b>: используйте полное выражение, включая разделители и переключатели.' . '</dfn>
		</li>
	</ul>
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