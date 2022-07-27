<?php
// FROM HASH: faa943c4749072dae44bb3f53a4c2b4f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<mail:subject>
	' . '' . $__templater->escape($__vars['xf']['options']['boardTitle']) . ' - запрос на подтверждение учётной записи' . '
</mail:subject>

' . '<p>' . $__templater->escape($__vars['user']['username']) . ', для завершения регистрации на сайте ' . (((('<a href="' . $__templater->func('link', array('canonical:index', ), true)) . '">') . $__templater->escape($__vars['xf']['options']['boardTitle'])) . '</a>') . ', Вам необходимо подтвердить свою учётную запись, перейдя по ссылке ниже.</p>' . '

<p><a href="' . $__templater->func('link', array('canonical:account-confirmation/email', $__vars['user'], array('c' => $__vars['confirmation']['confirmation_key'], ), ), true) . '" class="button">' . 'Подтвердите Ваш email' . '</a></p>';
	return $__finalCompiled;
}
);