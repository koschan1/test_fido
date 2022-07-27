<?php
// FROM HASH: c1c6f62979bd3c293fa1ae116e26dfba
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . 'Учётная запись на сайте ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' одобрена' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ', учётная запись на сайте ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ' зарегистрирована и одобрена. Теперь Вы можете посещать наш сайт, как зарегистрированный пользователь. </p>' . '

<h2>' . '<a href="' . $__templater->func('link', array('canonical:index', ), true) . '">Перейти на ' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '</a>' . '</h2>';
	return $__finalCompiled;
}
);