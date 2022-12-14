<?php
// FROM HASH: 2687898194b0aeaaf83e7b91e26b7730
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped($__templater->escape($__vars['conversation']['title']));
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	$__vars['i'] = 0;
	if ($__templater->isTraversable($__vars['conversation']['recipients'])) {
		foreach ($__vars['conversation']['recipients'] AS $__vars['recipient']) {
			if (($__vars['recipient']['user_id'] != $__vars['conversation']['user_id']) AND ($__vars['i'] < 4)) {
				$__vars['i']++;
				$__compilerTemp1 .= trim('
					<li>' . $__templater->func('username_link', array($__vars['recipient'], false, array(
					'defaultname' => 'Неизвестный пользователь',
					'href' => '',
				))) . '</li>
				');
			}
		}
	}
	$__compilerTemp2 = '';
	if ($__vars['conversation']['recipient_count'] > 5) {
		$__compilerTemp2 .= '
				' . '...и ещё ' . $__templater->filter($__vars['conversation']['recipient_count'] - 5, array(array('number', array()),), true) . '.' . '
			';
	}
	$__templater->pageParams['pageDescription'] = $__templater->preEscaped('
	<ul class="listInline listInline--bullet">
		<li>
			' . $__templater->fontAwesome('fa-users', array(
		'title' => $__templater->filter('Участники', array(array('for_attr', array()),), false),
	)) . '
			<span class="u-srOnly">' . 'Участники' . '</span>

			<ul class="listInline listInline--selfInline listInline--comma">
				<li>' . $__templater->func('username_link', array($__vars['conversation']['Starter'], false, array(
		'defaultname' => $__vars['conversation']['username'],
		'title' => 'Инициатор переписки',
		'href' => '',
	))) . '</li>' . trim('
				') . $__compilerTemp1 . '
			</ul>
			' . $__compilerTemp2 . '
		</li>
		<li>
			' . $__templater->fontAwesome('fa-clock', array(
		'title' => $__templater->filter('Дата начала', array(array('for_attr', array()),), false),
	)) . '
			<span class="u-srOnly">' . 'Дата начала' . '</span>

			<a href="' . $__templater->func('link', array('conversations', $__vars['conversation'], ), true) . '" class="u-concealed">' . $__templater->func('date_dynamic', array($__vars['conversation']['start_date'], array(
	))) . '</a>
		</li>
	</ul>
');
	$__templater->pageParams['pageDescriptionMeta'] = false;
	$__finalCompiled .= '

';
	$__templater->breadcrumb($__templater->preEscaped('Переписки'), $__templater->func('link', array('conversations', ), false), array(
	));
	$__finalCompiled .= '

';
	$__templater->modifySidebarHtml('conversationInfo', '
	<div class="block">
		<div class="block-container">
			<h3 class="block-minorHeader">' . 'Информация о переписке' . '</h3>
			<div class="block-body block-row block-row--minor">
				<dl class="pairs pairs--justified"><dt>' . 'Участники' . '</dt> <dd>' . $__templater->filter($__vars['conversation']['recipient_count'], array(array('number', array()),), true) . '</dd></dl>
				<dl class="pairs pairs--justified"><dt>' . 'Ответы' . '</dt> <dd>' . $__templater->filter($__vars['conversation']['reply_count'], array(array('number', array()),), true) . '</dd></dl>
				<dl class="pairs pairs--justified"><dt>' . 'Последний ответ' . '</dt> <dd>' . $__templater->func('date_dynamic', array($__vars['conversation']['last_message_date'], array(
	))) . '</dd></dl>
				<dl class="pairs pairs--justified"><dt>' . 'Последний ответ от' . '</dt> <dd>' . $__templater->func('username_link', array($__vars['conversation']['LastMessageUser'], false, array(
	))) . '</dd></dl>
			</div>
		</div>
	</div>
', 'replace');
	$__finalCompiled .= '

';
	$__compilerTemp3 = '';
	if ($__templater->isTraversable($__vars['recipients'])) {
		foreach ($__vars['recipients'] AS $__vars['recipient']) {
			$__compilerTemp3 .= '
					<li class="block-row">
						<div class="contentRow">
							';
			if ($__vars['recipient']['User']) {
				$__compilerTemp3 .= '
								<div class="contentRow-figure">
									' . $__templater->func('avatar', array($__vars['recipient']['User'], 'xs', false, array(
				))) . '
								</div>
								<div class="contentRow-main">
									' . $__templater->func('username_link', array($__vars['recipient']['User'], true, array(
				))) . '
									<div class="contentRow-minor">' . $__templater->func('user_title', array($__vars['recipient']['User'], false, array(
				))) . '</div>
								</div>
							';
			} else {
				$__compilerTemp3 .= '
								<div class="contentRow-figure">
									' . $__templater->func('avatar', array(null, 'xs', false, array(
				))) . '
								</div>
								<div class="contentRow-main">
									' . 'Неизвестный пользователь' . '
								</div>
							';
			}
			$__compilerTemp3 .= '
						</div>
					</li>
				';
		}
	}
	$__compilerTemp4 = '';
	if ($__templater->method($__vars['conversation'], 'canInvite', array())) {
		$__compilerTemp4 .= '
				<div class="block-footer">
					<span class="block-footer-controls">
						<a href="' . $__templater->func('link', array('conversations/invite', $__vars['conversation'], ), true) . '" data-xf-click="overlay">' . 'Пригласить ещё' . '</a>
					</span>
				</div>
			';
	}
	$__templater->modifySidebarHtml('conversationParticipants', '
	<div class="block">
		<div class="block-container">
			<h3 class="block-minorHeader">' . 'Участники переписки' . '</h3>
			<ol class="block-body">
				' . $__compilerTemp3 . '
			</ol>
			' . $__compilerTemp4 . '
		</div>
	</div>
', 'replace');
	$__finalCompiled .= '

<div class="block block--messages">
	<div class="block-outer">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => ($__vars['conversation']['reply_count'] + 1),
		'link' => 'conversations',
		'data' => $__vars['conversation'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
		<div class="block-outer-opposite">
			<div class="buttonGroup">
				';
	if ($__templater->method($__vars['conversation'], 'canEdit', array())) {
		$__finalCompiled .= '
					' . $__templater->button('', array(
			'href' => $__templater->func('link', array('conversations/edit', $__vars['conversation'], ), false),
			'class' => 'button--link',
			'icon' => 'edit',
			'overlay' => 'true',
		), '', array(
		)) . '
				';
	}
	$__finalCompiled .= '
				' . $__templater->button('
					' . ($__vars['userConv']['is_starred'] ? 'Снять пометку' : 'Пометить') . '
				', array(
		'href' => $__templater->func('link', array('conversations/star', $__vars['conversation'], ), false),
		'class' => 'button--link',
		'data-xf-click' => 'switch',
		'data-sk-star' => 'Пометить',
		'data-sk-unstar' => 'Снять пометку',
	), '', array(
	)) . '
				' . $__templater->button('
					' . ($__vars['userConv']['is_unread'] ? 'Отметить как прочитанное' : 'Отметить как непрочитанное') . '
				', array(
		'href' => $__templater->func('link', array('conversations/mark-unread', $__vars['conversation'], ), false),
		'class' => 'button--link',
		'data-xf-click' => 'switch',
		'data-sk-read' => 'Отметить как прочитанное',
		'data-sk-unread' => 'Отметить как непрочитанное',
	), '', array(
	)) . '
				' . $__templater->button('
					' . 'Покинуть' . '
				', array(
		'href' => $__templater->func('link', array('conversations/leave', $__vars['conversation'], ), false),
		'class' => 'button--link',
		'overlay' => 'true',
	), '', array(
	)) . '
			</div>
		</div>
	</div>

	<div class="block-container lbContainer"
		data-xf-init="lightbox' . ($__vars['xf']['options']['selectQuotable'] ? ' select-to-quote' : '') . '"
		data-message-selector=".js-message"
		data-lb-id="conversation-' . $__templater->escape($__vars['conversation']['conversation_id']) . '"
		data-lb-universal="' . $__templater->escape($__vars['xf']['options']['lightBoxUniversal']) . '">

		<div class="block-body js-replyNewMessageContainer">
			';
	if ($__templater->isTraversable($__vars['messages'])) {
		foreach ($__vars['messages'] AS $__vars['message']) {
			$__finalCompiled .= '
				' . $__templater->callMacro('conversation_message_macros', 'message', array(
				'message' => $__vars['message'],
				'conversation' => $__vars['conversation'],
				'lastRead' => $__vars['lastRead'],
			), $__vars) . '
			';
		}
	}
	$__finalCompiled .= '
		</div>
	</div>

	<div class="block-outer block-outer--after">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => ($__vars['conversation']['reply_count'] + 1),
		'link' => 'conversations',
		'data' => $__vars['conversation'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
		' . $__templater->func('show_ignored', array(array(
		'wrapperclass' => 'block-outer-opposite',
	))) . '
	</div>

	';
	if (!$__vars['conversation']['conversation_open']) {
		$__finalCompiled .= '
		<div class="block-outer block-outer--after">
			<dl class="blockStatus">
				<dt>' . 'Статус' . '</dt>
				<dd class="blockStatus-message blockStatus-message--locked">
					' . 'Эта переписка закрыта для новых ответов.' . '
				</dd>
			</dl>
		</div>
	';
	}
	$__finalCompiled .= '
</div>

';
	if ($__templater->method($__vars['conversation'], 'canReply', array())) {
		$__finalCompiled .= '
	';
		$__templater->includeJs(array(
			'src' => 'xf/message.js',
			'min' => '1',
		));
		$__vars['lastMessage'] = $__templater->filter($__vars['messages'], array(array('last', array()),), false);
		$__finalCompiled .= $__templater->form('

		' . '' . '
		' . '' . '

		<div class="block-container">
			<div class="block-body">
				' . $__templater->callMacro('quick_reply_macros', 'body', array(
			'message' => $__vars['conversation']['draft_reply']['message'],
			'attachmentData' => $__vars['attachmentData'],
			'forceHash' => $__vars['conversation']['draft_reply']['attachment_hash'],
			'messageSelector' => '.js-message',
			'supportsMultiQuote' => $__vars['xf']['options']['multiQuote'],
			'multiQuoteHref' => $__templater->func('link', array('conversations/multi-quote', $__vars['conversation'], ), false),
			'multiQuoteStorageKey' => 'multiQuoteConversation',
			'lastDate' => $__vars['lastMessage']['message_date'],
			'previewUrl' => $__templater->func('link', array('conversations/reply-preview', $__vars['conversation'], ), false),
		), $__vars) . '
			</div>
		</div>
	', array(
			'action' => $__templater->func('link', array('conversations/add-reply', $__vars['conversation'], ), false),
			'ajax' => 'true',
			'draft' => $__templater->func('link', array('conversations/draft', $__vars['conversation'], ), false),
			'class' => 'block js-quickReply',
			'data-xf-init' => 'attachment-manager quick-reply',
		)) . '
';
	}
	$__finalCompiled .= '

';
	$__templater->modifySidebarHtml('_xfWidgetPositionSidebar14001ceb8e193e28fd6df3e3c473d18c', $__templater->widgetPosition('conversation_view_sidebar', array(
		'conversation' => $__vars['conversation'],
	)), 'replace');
	return $__finalCompiled;
}
);