<?php
// FROM HASH: 7fe42d9e26ffce7b5691e135aa0dc1ba
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' - подтверждение авторизации' . '</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ',</p>

<p>для завершения авторизации (или завершения настройки двухфакторной аутентификации) на сайте ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ', Вам необходимо ввести следующий код:</p>' . '

<h2>' . $__templater->escape($__vars['code']) . '</h2>

' . '<p>Этот код действителен в течение 15 минут.</p>

<p>Вход был запрошен с этого IP: ' . $__templater->escape($__vars['ip']) . '. Если Вы не отправляли этот запрос, необходимо как можно скорее поменять свой пароль.</p>';
	return $__finalCompiled;
}
);