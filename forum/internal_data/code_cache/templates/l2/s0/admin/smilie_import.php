<?php
// FROM HASH: 16d0297f4101ff1fd6437ac12a9f9d8b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Импорт смайлов');
	$__finalCompiled .= '

';
	$__compilerTemp1 = array(array(
		'value' => 'upload',
		'label' => 'Импорт из загруженного XML-файла',
		'hint' => 'Используйте эту опцию для импорта XML-файла, содержащего определения смайлов. Перед тем, как перейти к следующему шагу, Вы должны убедиться, что на сервере в соответствующих местах были вручную загружены все необходимые изображения смайлов.',
		'_dependent' => array($__templater->formUpload(array(
		'name' => 'upload',
		'accept' => '.xml',
	))),
		'_type' => 'option',
	));
	if ($__vars['smilieXmlFiles']) {
		$__compilerTemp2 = $__templater->mergeChoiceOptions(array(), $__vars['smilieXmlFiles']);
		$__compilerTemp1[] = array(
			'value' => 'imported',
			'label' => 'Импорт смайлов из XML-файла, созданного системой импорта',
			'hint' => 'Если Вы используете инструменты/импорт данных для импорта смайлов из другой системы, то результаты будут сохранены в XML-файл, используя который Вы можете импортировать их здесь.',
			'_dependent' => array($__templater->formSelect(array(
			'name' => 'filename',
		), $__compilerTemp2)),
			'_type' => 'option',
		);
	}
	$__compilerTemp1[] = array(
		'value' => 'directory',
		'label' => 'Импорт из директории на Вашем сервере',
		'hint' => 'Используйте эту опцию, чтобы просканировать доступные директории, содержащие изображения смайлов, а затем вручную ввести данные настройки для каждого импортируемого смайла. Прежде чем приступить к этому шагу, убедитесь, что изображения смайлов загружены.',
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'directory',
		'placeholder' => 'styles/default/xenforo/smilies...',
	))),
		'_type' => 'option',
	);
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formRadioRow(array(
		'name' => 'mode',
		'value' => 'upload',
	), $__compilerTemp1, array(
	)) . '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Продолжить' . $__vars['xf']['language']['ellipsis'],
	), array(
	)) . '
	</div>
', array(
		'action' => $__templater->func('link', array('smilies/import-form', ), false),
		'upload' => 'true',
		'class' => 'block',
	));
	return $__finalCompiled;
}
);