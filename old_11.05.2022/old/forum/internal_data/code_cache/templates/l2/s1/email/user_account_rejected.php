<?php
// FROM HASH: 1d60ba3d84ffbd468e5a94ded45d07df
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . 'Учётная запись на сайте ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' отклонена' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ', к сожалению, учётная запись на сайте ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ' не соответствует нашим правилам. Ваша учётная запись удалена и больше недоступна.</p>' . '

';
	if ($__vars['reason']) {
		$__finalCompiled .= '
	<p>' . 'Была указана следующая причина:' . ' ' . $__templater->escape($__vars['reason']) . '</p>
';
	}
	$__finalCompiled .= '
';
	return $__finalCompiled;
}
);