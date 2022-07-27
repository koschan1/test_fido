<?php
// FROM HASH: a1c944437b0beca52088100191f1bafb
return array(
'macros' => array('javascript' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<noscript><div class="blockMessage blockMessage--important blockMessage--iconic u-noJsOnly">' . 'JavaScript отключён. Для полноценно использования нашего сайта, пожалуйста, включите JavaScript в своём браузере.' . '</div></noscript>
';
	return $__finalCompiled;
}
),
'browser' => array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '
	<div class="blockMessage blockMessage--important blockMessage--iconic js-browserWarning" style="display: none">' . 'Вы используете устаревший браузер. Этот и другие сайты могут отображаться в нем неправильно.<br />Необходимо обновить браузер или попробовать использовать <a href="https://www.google.com/chrome/" target="_blank" rel="noopener">другой</a>.' . '</div>
';
	return $__finalCompiled;
}
)),
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '

';
	return $__finalCompiled;
}
);