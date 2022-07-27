<?php
// FROM HASH: 5807eed418d7e73b92facc381f91262f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="inlineModBar">
	<div class="inlineModBar-inner">
		<div class="inlineModBar-close">
			' . $__templater->button('X', array(
		'class' => 'js-inlineModClose',
		'aria-label' => $__templater->filter('Закрыть', array(array('for_attr', array()),), false),
	), '', array(
	)) . '
		</div>

		<ul class="inlineModBar-controls">
			<li class="inlineModBar-title">' . $__templater->escape($__vars['title']) . ' ' . $__templater->filter($__vars['total'], array(array('number', array()),array('parens', array()),), true) . '</li>
			<li>' . $__templater->formCheckBox(array(
		'standalone' => 'true',
	), array(array(
		'labelclass' => 'iconic--inherit-color',
		'class' => 'js-inlineModSelectAll',
		'label' => 'Выбрать все',
		'_type' => 'option',
	))) . '</li>
			<li>
				<select class="input input--inline js-inlineModAction">
					<optgroup>
						<option value="" hidden="hidden">' . 'Выберите действие' . $__vars['xf']['language']['ellipsis'] . '</option>
						';
	if ($__templater->isTraversable($__vars['actions'])) {
		foreach ($__vars['actions'] AS $__vars['id'] => $__vars['action']) {
			$__finalCompiled .= '
							<option value="' . $__templater->escape($__vars['id']) . '">' . $__templater->escape($__vars['action']) . '</option>
						';
		}
	}
	$__finalCompiled .= '
					</optgroup>
					';
	if (!$__vars['actions']['deselect']) {
		$__finalCompiled .= '
						<optgroup>
							<option value="deselect">' . 'Отменить выделение' . '</option>
						</optgroup>
					';
	}
	$__finalCompiled .= '
				</select>
				' . $__templater->button('Выполнить', array(
		'type' => 'submit',
		'class' => 'button--primary inlineModBar-goButton',
	), '', array(
	)) . '
			</li>
		</ul>
	</div>
</div>';
	return $__finalCompiled;
}
);