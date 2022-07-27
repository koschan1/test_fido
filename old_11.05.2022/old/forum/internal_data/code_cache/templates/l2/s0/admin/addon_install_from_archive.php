<?php
// FROM HASH: a5157f5396b962cd603f535fb77cc239
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Установить/обновить из архива');
	$__finalCompiled .= '

' . $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formUploadRow(array(
		'name' => 'uploads[]',
		'multiple' => 'multiple',
		'required' => 'required',
		'accept' => '.zip',
	), array(
		'label' => 'Архив плагина',
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'upload',
		'submit' => 'Загрузить',
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('add-ons/install-from-archive', ), false),
		'upload' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);