<?php
// FROM HASH: 5bbe69445b14ce2225a99ab657328619
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подтвердите действие');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__templater->method($__vars['content'], 'hasDataUriAssets', array())) {
		$__compilerTemp1 .= '
					<div class="blockMessage blockMessage--important blockMessage--iconic">
						' . 'Все файлы ресурсов, связанные с этим стилем, также будут удалены.' . '
					</div>
				';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formInfoRow('
				' . 'Пожалуйста, подтвердите удаление' . $__vars['xf']['language']['label_separator'] . '
				<strong><a href="' . $__templater->escape($__vars['contentUrl']) . '">' . $__templater->escape($__vars['contentTitle']) . '</a></strong>
				' . $__compilerTemp1 . '
			', array(
		'rowtype' => 'confirm',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'delete',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
', array(
		'action' => $__vars['confirmUrl'],
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);