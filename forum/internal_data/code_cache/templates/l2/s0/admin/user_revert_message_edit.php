<?php
// FROM HASH: 176fb7073766bafc3db6648bb71252dc
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Отменить правки сообщений');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRow($__templater->escape($__vars['user']['username']), array(
		'label' => 'Пользователь',
	)) . '
			' . $__templater->formRow('

				<div class="inputGroup">
					' . $__templater->formNumberBox(array(
		'name' => 'cutoff[amount]',
		'value' => '1',
		'min' => '0',
	)) . '
					<span class="inputGroup-splitter"></span>
					' . $__templater->formSelect(array(
		'name' => 'cutoff[unit]',
		'value' => 'days',
		'class' => 'input--inline',
	), array(array(
		'value' => 'hours',
		'label' => 'Часов',
		'_type' => 'option',
	),
	array(
		'value' => 'days',
		'label' => 'Дней',
		'_type' => 'option',
	),
	array(
		'value' => 'weeks',
		'label' => 'Недель',
		'_type' => 'option',
	),
	array(
		'value' => 'months',
		'label' => 'Месяцев',
		'_type' => 'option',
	))) . '
				</div>
			', array(
		'rowtype' => 'input',
		'label' => 'Отменить правки за последние',
		'explain' => 'Будут отменены правки только за последние ' . $__templater->escape($__vars['xf']['options']['editHistory']['length']) . ' дней.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Отменить правки',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('users/revert-message-edit', $__vars['user'], ), false),
		'class' => 'block',
	));
	return $__finalCompiled;
}
);