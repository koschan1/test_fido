<?php
// FROM HASH: ea96c2dd286b23e57ad5bb7bedc5c8bd
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('История шаблона');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body block-body--contained block-row" dir="ltr">
			<pre>' . $__templater->escape($__vars['history']['template']) . '</pre>
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);