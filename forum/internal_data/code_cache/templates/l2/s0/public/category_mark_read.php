<?php
// FROM HASH: 25496a12b48a763a87215468c5d202c1
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Отметить раздел прочитанным');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Вы действительно хотите отметить этот раздел прочитанным?' . '
				<strong><a href="' . $__templater->func('link', array('categories', $__vars['category'], ), true) . '">' . $__templater->escape($__vars['category']['title']) . '</a></strong>
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Отметить раздел прочитанным',
		'icon' => 'markRead',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('categories/mark-read', $__vars['category'], array('date' => $__vars['date'], ), ), false),
		'class' => 'block',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);