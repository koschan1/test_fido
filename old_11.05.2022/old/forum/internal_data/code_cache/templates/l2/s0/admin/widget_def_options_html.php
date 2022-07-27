<?php
// FROM HASH: c561c656cac0645ca1618259f9c0636a
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<hr class="formRowSep" />

' . $__templater->formCodeEditorRow(array(
		'name' => 'options[template]',
		'value' => $__vars['template']['template'],
		'class' => 'codeEditor--short',
		'mode' => 'html',
	), array(
		'label' => 'Шаблон',
		'explain' => 'Здесь Вы можете использовать специальный синтаксис шаблонов XenForo.',
	)) . '

' . $__templater->formCheckBoxRow(array(
	), array(array(
		'name' => 'options[advanced_mode]',
		'value' => '1',
		'selected' => $__vars['options']['advanced_mode'],
		'label' => 'Расширенный режим',
		'hint' => 'Если включено, то HTML-код Вашей страницы не будет содержаться внутри стандартного div-блока.',
		'_type' => 'option',
	)), array(
	)) . '

';
	if ($__vars['options']['template_title']) {
		$__finalCompiled .= '
	' . $__templater->formHiddenVal('options[template_title]', $__vars['options']['template_title'], array(
		)) . '
';
	}
	return $__finalCompiled;
}
);