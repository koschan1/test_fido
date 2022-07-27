<?php
// FROM HASH: f0ffec761a56ddfd9eca1b22ee876d1b
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__finalCompiled .= '<div class="u-alignCenter">
	' . 'На данном сайте используются cookie-файлы, чтобы персонализировать контент и сохранить Ваш вход в систему, если Вы зарегистрируетесь.<br />
Продолжая использовать этот сайт, Вы соглашаетесь на использование наших cookie-файлов.' . '
</div>

<div class="u-inputSpacer u-alignCenter">
	' . $__templater->button('Принять', array(
		'icon' => 'confirm',
		'href' => $__templater->func('link', array('account/dismiss-notice', null, array('notice_id' => $__vars['notice']['notice_id'], ), ), false),
		'class' => 'js-noticeDismiss button--notice',
	), '', array(
	)) . '
	' . $__templater->button('Узнать больше.' . $__vars['xf']['language']['ellipsis'], array(
		'href' => $__templater->func('link', array('help/cookies', ), false),
		'class' => 'button--notice',
	), '', array(
	)) . '
</div>';
	return $__finalCompiled;
}
);