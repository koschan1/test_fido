<?php
// FROM HASH: 5ad572b462ceef411bdf7374c993289d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтвердите действие');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['isDemotion']) {
		$__compilerTemp1 .= '
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Пожалуйста, подтвердите удаление выбранного повышения у этого пользователя' . $__vars['xf']['language']['label_separator'] . '
					<strong>' . $__templater->escape($__vars['user']['username']) . ' - ' . $__templater->escape($__vars['promotion']['title']) . '</strong>
					' . 'Этот пользователь не получит данное повышение прав, даже если он или она соответствует требованиям.' . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'submit' => 'Понизить пользователя',
		), array(
			'rowtype' => 'simple',
		)) . '
		';
	} else {
		$__compilerTemp1 .= '
			<div class="block-body">
				' . $__templater->formInfoRow('
					' . 'Пожалуйста, подтвердите включение повышения для выбранного пользователя' . $__vars['xf']['language']['label_separator'] . '
					<strong>' . $__templater->escape($__vars['user']['username']) . ' - ' . $__templater->escape($__vars['promotion']['title']) . '</strong>
					' . 'Этот пользователь получит данное повышение прав, когда он или она будет соответствовать требованиям.' . '
				', array(
			'rowtype' => 'confirm',
		)) . '
			</div>
			' . $__templater->formSubmitRow(array(
			'submit' => 'Включить повышение для пользователя',
		), array(
			'rowtype' => 'simple',
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('

	<div class="block-container">
		' . $__compilerTemp1 . '
	</div>

	' . $__templater->func('redirect_input', array(null, null, true)) . '
', array(
		'action' => $__templater->func('link', array('user-group-promotions/demote', null, array('promotion_id' => $__vars['promotion']['promotion_id'], 'user_id' => $__vars['promotionLog']['user_id'], ), ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);