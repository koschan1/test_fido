<?php
// FROM HASH: fdd9ccc614631b047373c1ec32d17c59
return array(
'macros' => array('find_new_filter_footer' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<hr class="menu-separator" />
	<div class="menu-row">
		' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'save',
		'label' => 'Сохранить по умолчанию',
		'hint' => 'Эти фильтры будут использованы для Вас по умолчанию.',
		'_type' => 'option',
	))) . '
	</div>
	<div class="menu-footer">
		<span class="menu-footer-controls">
			' . $__templater->button('Фильтровать', array(
		'type' => 'submit',
		'class' => 'button--primary',
	), '', array(
	)) . '
		</span>
		' . $__templater->formHiddenVal('skip', '1', array(
	)) . '
	</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';

	return $__finalCompiled;
}
);