<?php
// FROM HASH: 2e113d5ed1e99da078b26cd414a24e26
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Регистрация');
	$__finalCompiled .= '

';
	$__templater->setPageParam('head.' . 'robots', $__templater->preEscaped('<meta name="robots" content="noindex" />'));
	$__finalCompiled .= '

<div class="blockMessage">
	';
	if ($__vars['xf']['visitor']['user_state'] == 'email_confirm') {
		$__finalCompiled .= '
		' . 'Спасибо за регистрацию. Для её завершения, пожалуйста, перейдите по ссылке в письме, которое было только что отправлено Вам по электронной почте.' . '
		';
		if ($__vars['hasPreRegAction']) {
			$__finalCompiled .= '
			<br /><br />
			' . 'Как только Ваша регистрация будет завершена, Ваш контент будет автоматически опубликован.' . '
		';
		}
		$__finalCompiled .= '
	';
	} else if ($__vars['xf']['visitor']['user_state'] == 'moderated') {
		$__finalCompiled .= '
		' . 'Спасибо за регистрацию. Ваша учётная запись должна быть утверждена администратором. Когда это произойдёт, Вы получите письмо по электронной почте.' . '
		';
		if ($__vars['hasPreRegAction']) {
			$__finalCompiled .= '
			<br /><br />
			' . 'Как только Ваша регистрация будет завершена, Ваш контент будет автоматически опубликован.' . '
		';
		}
		$__finalCompiled .= '
	';
	} else if ($__vars['facebook']) {
		$__finalCompiled .= '
		' . 'Спасибо за создание учётной записи с использованием Facebook. Теперь она полностью активна.' . '
	';
	} else {
		$__finalCompiled .= '
		' . 'Благодарим, что присоединились к нам. Ваша регистрация завершена.' . '
	';
	}
	$__finalCompiled .= '

	';
	if ($__vars['xf']['session']['preRegContentUrl']) {
		$__finalCompiled .= '
		<br />
		<br />
		' . 'Контент, созданный Вами до регистрации, был автоматически размещён.' . '
		<div style="margin-top: .5em">
			' . $__templater->button('Посмотреть Ваш контент', array(
			'href' => $__vars['xf']['session']['preRegContentUrl'],
		), '', array(
		)) . '
		</div>
	';
	}
	$__finalCompiled .= '

	<ul>
		';
	if ($__vars['redirect']) {
		$__finalCompiled .= '<li><a href="' . $__templater->func('link', array($__vars['redirect'], ), true) . '">' . 'Вернуться к просматриваемой странице' . '</a></li>';
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