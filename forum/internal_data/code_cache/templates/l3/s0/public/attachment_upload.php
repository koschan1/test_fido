<?php
// FROM HASH: f9a9a6cbbf78cfa8a5cca92c79d88bbd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Загрузка вложений');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if (!$__templater->test($__vars['existing'], 'empty', array()) OR !$__templater->test($__vars['new'], 'empty', array())) {
		$__compilerTemp1 .= '
				';
		$__templater->includeCss('attachments.less');
		$__compilerTemp2 = '';
		if ($__templater->isTraversable($__vars['existing'])) {
			foreach ($__vars['existing'] AS $__vars['attachment']) {
				$__compilerTemp2 .= '
							' . $__templater->callMacro('helper_attach_upload', 'uploaded_file', array(
					'attachment' => $__vars['attachment'],
					'noJsFallback' => true,
				), $__vars) . '
						';
			}
		}
		$__compilerTemp3 = '';
		if ($__templater->isTraversable($__vars['new'])) {
			foreach ($__vars['new'] AS $__vars['attachment']) {
				$__compilerTemp3 .= '
							' . $__templater->callMacro('helper_attach_upload', 'uploaded_file', array(
					'attachment' => $__vars['attachment'],
					'noJsFallback' => true,
				), $__vars) . '
						';
			}
		}
		$__compilerTemp1 .= $__templater->formRow('
					' . '' . '
					<ul class="attachUploadList">
						' . $__compilerTemp2 . '
						' . $__compilerTemp3 . '
					</ul>
				', array(
			'label' => 'Существующие вложения',
		)) . '
			';
	}
	$__compilerTemp4 = '';
	if ($__vars['canUpload']) {
		$__compilerTemp4 .= '
				' . $__templater->formUploadRow(array(
			'name' => 'upload',
			'accept' => '.' . $__templater->filter($__vars['constraints']['extensions'], array(array('join', array(',.', )),), false),
		), array(
			'label' => 'Прикрепить файл',
			'explain' => 'Вы можете закрыть это окно/вкладку после загрузки файлов, чтобы вернуться к своему контенту.',
		)) . '
			';
	} else if ((!$__vars['canUpload']) AND $__vars['uploadError']) {
		$__compilerTemp4 .= '
				' . $__templater->formRow($__templater->escape($__vars['uploadError']), array(
			'label' => 'Прикрепить файл',
		)) . '
			';
	}
	$__compilerTemp5 = '';
	if ($__vars['canUpload']) {
		$__compilerTemp5 .= '
			' . $__templater->formSubmitRow(array(
			'submit' => 'Загрузить',
			'icon' => 'upload',
		), array(
		)) . '
		';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__compilerTemp1 . '
			' . $__compilerTemp4 . '
		</div>
		' . $__compilerTemp5 . '
	</div>
', array(
		'action' => $__templater->func('link', array('attachments/upload', null, array('type' => $__vars['type'], 'hash' => $__vars['hash'], 'context' => $__vars['context'], ), ), false),
		'class' => 'block',
		'upload' => 'true',
		'ajax' => 'true',
	));
	return $__finalCompiled;
}
);