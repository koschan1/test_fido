<?php
// FROM HASH: 6a6e960870eceea8d4ad7ada1ec3800b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '"' . $__templater->escape($__vars['xf']['options']['boardTitle']) . '" - сброс пароля' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ', Ваш пароль на сайте ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ' успешно сброшен. Теперь Вы можете войти с использованием своего нового пароля.</p>' . '

<p><a href="' . $__templater->func('link', array('canonical:index', ), true) . '" class="button">' . 'Вход' . '</a></p>';
	return $__finalCompiled;
}
);