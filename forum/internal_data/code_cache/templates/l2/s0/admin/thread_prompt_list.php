<?php
// FROM HASH: 81f6d824852495d367c8dec25069286e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Подсказки для тем');
	$__finalCompiled .= '

' . $__templater->includeTemplate('base_prompt_list', $__vars) . '

<div class="block">
	<div class="block-container">
		<h2 class="block-header">' . 'Подсказка для имён тем по умолчанию' . '</h2>
		<div class="block-body">
			' . $__templater->dataList('
				' . $__templater->dataRow(array(
	), array(array(
		'href' => $__templater->func('link', array('phrases/edit-by-name', array(), array('title' => 'thread_prompt.default', ), ), false),
		'class' => 'dataList-cell',
		'_type' => 'cell',
		'html' => 'Заголовок темы',
	))) . '
			', array(
	)) . '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);