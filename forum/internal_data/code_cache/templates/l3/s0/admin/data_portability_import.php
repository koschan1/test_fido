<?php
// FROM HASH: 9c5099accefc90d2d35d92680fbab73b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Импорт пользователя');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formUploadRow(array(
		'name' => 'upload',
		'accept' => '.xml',
	), array(
		'label' => 'Импорт из загруженного XML-файла',
		'explain' => 'Новому пользователю будет отправлен запрос на сброс пароля на его email, прежде чем он сможет использовать свою учётную запись.',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'import',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array($__vars['urlPrefix'] . '/import', ), false),
		'upload' => 'true',
		'ajax' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);