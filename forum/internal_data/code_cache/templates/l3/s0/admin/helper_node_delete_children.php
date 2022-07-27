<?php
// FROM HASH: c64c9ad7000bbb84a741989e9b57012f
return array(
'macros' => array('delete_row' => array(
'arguments' => function($__templater, array $__vars) { return array(
		'node' => '!',
		'nodeTree' => '!',
	); },
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	';
	if ($__templater->method($__vars['node'], 'hasChildren', array())) {
		$__finalCompiled .= '
		' . $__templater->formRadioRow(array(
			'name' => 'child_nodes_action',
		), array(array(
			'value' => 'move',
			'selected' => true,
			'label' => 'Присоединить дочерние элементы этого узла к родительскому узлу',
			'_type' => 'option',
		),
		array(
			'value' => 'delete',
			'label' => 'Удалить дочерние элементы этого узла',
			'_type' => 'option',
		)), array(
		)) . '
	';
	}
	$__finalCompiled .= '
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