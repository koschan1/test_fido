<?php
// FROM HASH: a6cdf2ecd310a31d7a6d6715cbda82dd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Вставить спойлер');
	$__finalCompiled .= '

<form class="block" id="editor_spoiler_form">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'id' => 'editor_spoiler_title',
	), array(
		'label' => 'Введите заголовок спойлера',
		'explain' => 'Введите здесь текст, если хотите указать заголовок для кнопки спойлера, который будет служить подсказкой к его содержимому. Оставьте поле пустым, если заголовок не требуется.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Продолжить',
		'id' => 'editor_spoiler_submit',
	), array(
	)) . '
	</div>
</form>';
	return $__finalCompiled;
}
);