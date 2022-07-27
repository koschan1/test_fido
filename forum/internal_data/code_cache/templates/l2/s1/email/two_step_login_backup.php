<?php
// FROM HASH: 5129e5be2662a25b963897333fdd01cb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' - авторизация с помощью резервного кода' . '</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ',</p>

<p>недавно Вы авторизовались на сайте ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ' и завершили двухфакторную аутентификацию, введя резервный код проверки. Резервные коды должны использоваться только в случае, если у Вас нет доступа к другим способам проверки.</p>

<p>Вход был запрошен с этого IP: ' . $__templater->escape($__vars['ip']) . '. Если Вы не отправляли этот запрос, необходимо как можно скорее поменять свой пароль.</p>';
	return $__finalCompiled;
}
);