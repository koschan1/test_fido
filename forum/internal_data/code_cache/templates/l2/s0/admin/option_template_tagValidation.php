<?php
// FROM HASH: 92c3906133b2e917b21e3162be306e57
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formRow('

	<ul class="inputChoices inputChoices--noChoice">
		<li class="inputChoices-choice">
			<div>' . 'Запрещённые слова в тегах' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextArea(array(
		'name' => $__vars['inputName'] . '[disallowedWords]',
		'value' => $__vars['option']['option_value']['disallowedWords'],
		'autosize' => 'true',
	)) . '
			<dfn class="inputChoices-explain">' . 'Слова или фразы из этого поля будут запрещены для использования в любой части тегов. Каждое слово или фразу размещайте на новой строке. Введя слово "зве", будут запрещены также слова "звено", "звезда" и т.д.' . '</dfn>
		</li>
		<li class="inputChoices-choice">
			<div>' . 'Соответствие тега регулярному выражению' . $__vars['xf']['language']['label_separator'] . '</div>
			' . $__templater->formTextBox(array(
		'name' => $__vars['inputName'] . '[matchRegex]',
		'value' => $__vars['option']['option_value']['matchRegex'],
	)) . '
			<dfn class="inputChoices-explain">' . 'Эта опция требует соответствия заданному регулярному выражению для новых тегов. Регулярное выражение должно содержать разделители и модификаторы (например, /example/siU).' . '</dfn>
		</li>
	</ul>
', array(
		'label' => $__templater->escape($__vars['option']['title']),
		'hint' => $__templater->escape($__vars['hintHtml']),
		'explain' => 'Это ограничение применяется только для вновь создаваемых тегов. Существующие теги не будут затронуты и могут использоваться дальше.',
		'html' => $__templater->escape($__vars['listedHtml']),
		'rowclass' => $__vars['rowClass'],
	));
	return $__finalCompiled;
}
);