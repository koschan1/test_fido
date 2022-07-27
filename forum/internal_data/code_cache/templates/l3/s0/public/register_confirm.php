<?php
// FROM HASH: ef69da576c9a2e5e4033ae9b46384ca4
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="blockMessage">
	';
	if ($__vars['xf']['visitor']['user_state'] == 'moderated') {
		$__finalCompiled .= '
		' . 'Вы подтвердили email. Теперь Ваша регистрация должна быть одобрена администратором. Вы получите письмо, когда будет принято решение.' . '
	';
	} else if (($__templater->method($__vars['xf']['visitor'], 'getPreviousValue', array('user_state', )) == 'email_confirm_edit')) {
		$__finalCompiled .= '
		' . 'Вы подтвердили email и теперь Ваша учётная запись снова активна' . '
	';
	} else {
		$__finalCompiled .= '
		' . 'Вы подтвердили email и завершили регистрацию.' . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__vars['preRegContentUrl']) {
		$__finalCompiled .= '
		<br />
		<br />
		' . 'Контент, созданный Вами до регистрации, был автоматически размещён.' . '
		<div style="margin-top: .5em">
			' . $__templater->button('Посмотреть Ваш контент', array(
			'href' => $__vars['preRegContentUrl'],
		), '', array(
		)) . '
		</div>
	';
	}
	$__finalCompiled .= '

	<ul>
		';
	if ($__vars['redirect']) {
		$__finalCompiled .= '<li><a href="' . $__templater->escape($__vars['redirect']) . '">' . 'Вернуться к просматриваемой странице' . '</a></li>';
	}
	$__finalCompiled .= '
		<li><a href="' . $__templater->func('link', array('index', ), true) . '">' . 'Вернуться на главную страницу форума' . '</a></li>
		';
	if ($__templater->method($__vars['xf']['visitor'], 'canEditProfile', array())) {
		$__finalCompiled .= '
			<li><a href="' . $__templater->func('link', array('account', ), true) . '">' . 'Редактировать информацию о Вашей учётной записи' . '</a></li>
		';
	}
	$__finalCompiled .= '
	</ul>
</div>';
	return $__finalCompiled;
}
);