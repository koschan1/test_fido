<?php
// FROM HASH: 0bd5d56204e3e0089855913c5ff5c37c
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'type_config[allow_answer_voting]',
		'selected' => $__vars['typeConfig']['allow_answer_voting'],
		'label' => 'Поддержка голосования',
		'hint' => 'Если включено, пользователи смогут голосовать за ответы на вопросы.',
		'_dependent' => array($__templater->formCheckBox(array(
	), array(array(
		'name' => 'type_config[allow_downvote]',
		'selected' => ((!$__vars['typeConfig']['allow_answer_voting']) OR $__vars['typeConfig']['allow_downvote']),
		'label' => 'Разрешить голосовать против',
		'hint' => 'Если отключено, пользователи смогут голосовать только За.',
		'_type' => 'option',
	)))),
		'_type' => 'option',
	)), array(
	));
	return $__finalCompiled;
}
);