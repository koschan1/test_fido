<?php
// FROM HASH: 4541ab7dba7fe2746f4e446c2c194441
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	if ($__vars['hasNewPost']) {
		$__finalCompiled .= '
	<div class="message js-newMessagesIndicator">
		<div class="message-inner">
			<div class="message-cell message-cell--alert">
				' . 'С момента последней загрузки страницы были добавлены новые сообщения.' . '
				<a href="' . $__templater->func('link', array('threads/new-posts', $__vars['thread'], array('after' => $__vars['lastDate'], ), ), true) . '" data-xf-click="message-loader">' . 'Посмотреть их?' . '</a>
			</div>
		</div>
	</div>
';
	}
	return $__finalCompiled;
}
);