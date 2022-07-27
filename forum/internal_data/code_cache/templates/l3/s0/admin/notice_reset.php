<?php
// FROM HASH: 84687b08e1697f07078849e525204f09
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтвердите действие');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите сброс следующего объявления' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->func('link', array('notices/edit', $__vars['notice'], ), true) . '">' . $__templater->escape($__vars['notice']['title']) . '</a></strong>
				' . 'Сброс этого объявления приведёт к его повторному отображению для всех пользователей, соответствующих критериям объявления, даже если они уже скрывали его ранее.' . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Сбросить',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('notices/reset', $__vars['notice'], ), false),
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);