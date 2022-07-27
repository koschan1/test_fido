<?php
// FROM HASH: 5540c2bbc5947ea070002f53014e9e7d
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Переписки');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	$__templater->includeJs(array(
		'src' => 'xf/inline_mod.js',
		'min' => '1',
	));
	$__finalCompiled .= '

';
	if ($__templater->method($__vars['xf']['visitor'], 'canStartConversation', array())) {
		$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('Начать переписку', array(
			'href' => $__templater->func('link', array('conversations/add', ), false),
			'class' => 'button--cta',
			'icon' => 'write',
		), '', array(
		)) . '
');
	}
	$__finalCompiled .= '

<div class="block" data-xf-init="inline-mod" data-type="conversation" data-href="' . $__templater->func('link', array('inline-mod', ), true) . '">
	<div class="block-outer">
		' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'conversations',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer-main',
		'perPage' => $__vars['perPage'],
	))) . '
		<div class="block-outer-opposite">
			<div class="buttonGroup">
				' . $__templater->callMacro('inline_mod_macros', 'button', array(
		'variant' => 'inlineModButton--withLabel',
		'label' => 'Выбрано',
		'tooltip' => false,
	), $__vars) . '
			</div>
		</div>
	</div>

	<div class="block-container">
		<div class="block-filterBar">
			<div class="filterBar">
				';
	$__compilerTemp1 = '';
	$__compilerTemp1 .= '
						';
	if ($__vars['filters']['starter_id'] AND $__vars['starterFilter']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array('conversations', null, $__templater->filter($__vars['filters'], array(array('replace', array('starter_id', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Удалить этот фильтр', array(array('for_attr', array()),), true) . '">
								' . 'Автор ' . $__templater->escape($__vars['starterFilter']['username']) . '' . '</a></li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['filters']['receiver_id'] AND $__vars['receiverFilter']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array('conversations', null, $__templater->filter($__vars['filters'], array(array('replace', array('receiver_id', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Удалить этот фильтр', array(array('for_attr', array()),), true) . '">
								' . 'Полученные пользователем ' . $__templater->escape($__vars['receiverFilter']['username']) . '' . '</a></li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['filters']['starred']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array('conversations', null, $__templater->filter($__vars['filters'], array(array('replace', array('starred', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Удалить этот фильтр', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Показать только' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Помечено' . '</a></li>
						';
	}
	$__compilerTemp1 .= '
						';
	if ($__vars['filters']['unread']) {
		$__compilerTemp1 .= '
							<li><a href="' . $__templater->func('link', array('conversations', null, $__templater->filter($__vars['filters'], array(array('replace', array('unread', null, )),), false), ), true) . '"
								class="filterBar-filterToggle" data-xf-init="tooltip" title="' . $__templater->filter('Удалить этот фильтр', array(array('for_attr', array()),), true) . '">
								<span class="filterBar-filterToggle-label">' . 'Показать только' . $__vars['xf']['language']['label_separator'] . '</span>
								' . 'Непрочитанные' . '</a></li>
						';
	}
	$__compilerTemp1 .= '
					';
	if (strlen(trim($__compilerTemp1)) > 0) {
		$__finalCompiled .= '
					<ul class="filterBar-filters">
					' . $__compilerTemp1 . '
					</ul>
				';
	}
	$__finalCompiled .= '

				<a class="filterBar-menuTrigger" data-xf-click="menu" role="button" tabindex="0" aria-expanded="false" aria-haspopup="true">' . 'Фильтры' . '</a>
				<div class="menu" data-menu="menu" aria-hidden="true">
					<div class="menu-content">
						<h4 class="menu-header">' . 'Показать только' . $__vars['xf']['language']['label_separator'] . '</h4>
						' . $__templater->form('
							<div class="menu-row menu-row--separated">
								' . $__templater->formRadio(array(
		'name' => 'filter_type',
	), array(array(
		'value' => '',
		'selected' => ((!$__vars['starterFilter']) AND (!$__vars['receiverFilter'])),
		'label' => 'Показать все переписки',
		'_type' => 'option',
	),
	array(
		'value' => 'started',
		'selected' => ($__vars['starterFilter'] ? true : false),
		'data-hide' => 'true',
		'label' => 'Автор' . $__vars['xf']['language']['ellipsis'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'starter',
		'value' => ($__vars['starterFilter'] ? $__vars['starterFilter']['username'] : ''),
		'ac' => 'single',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
	))),
		'_type' => 'option',
	),
	array(
		'value' => 'received',
		'selected' => ($__vars['receiverFilter'] ? true : false),
		'data-hide' => 'true',
		'label' => 'Полученные пользователем' . $__vars['xf']['language']['ellipsis'],
		'_dependent' => array($__templater->formTextBox(array(
		'name' => 'receiver',
		'value' => ($__vars['receiverFilter'] ? $__vars['receiverFilter']['username'] : ''),
		'ac' => 'single',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
	))),
		'_type' => 'option',
	))) . '
							</div>
							<div class="menu-row menu-row--separated">
								' . $__templater->formCheckBox(array(
	), array(array(
		'name' => 'starred',
		'selected' => $__vars['filters']['starred'],
		'label' => 'Помеченные переписки',
		'_type' => 'option',
	),
	array(
		'name' => 'unread',
		'selected' => $__vars['filters']['unread'],
		'label' => 'Непрочитанные переписки',
		'_type' => 'option',
	))) . '
							</div>

							<div class="menu-footer">
								<span class="menu-footer-controls">
									' . $__templater->button('Фильтровать', array(
		'type' => 'submit',
		'class' => 'button--primary',
	), '', array(
	)) . '
								</span>
							</div>
							' . $__templater->formHiddenVal('apply', '1', array(
	)) . '
						', array(
		'action' => $__templater->func('link', array('conversations/filters', ), false),
	)) . '
					</div>
				</div>
			</div>
		</div>

		<div class="block-body">
			';
	if (!$__templater->test($__vars['userConvs'], 'empty', array())) {
		$__finalCompiled .= '
				<div class="structItemContainer">
					';
		if ($__templater->isTraversable($__vars['userConvs'])) {
			foreach ($__vars['userConvs'] AS $__vars['userConv']) {
				$__finalCompiled .= '
						' . $__templater->callMacro('conversation_list_macros', 'item', array(
					'userConv' => $__vars['userConv'],
				), $__vars) . '
					';
			}
		}
		$__finalCompiled .= '
				</div>
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row">' . 'Нет переписок для отображения.' . '</div>
			';
	}
	$__finalCompiled .= '
		</div>
	</div>

	' . $__templater->func('page_nav', array(array(
		'page' => $__vars['page'],
		'total' => $__vars['total'],
		'link' => 'conversations',
		'params' => $__vars['filters'],
		'wrapperclass' => 'block-outer block-outer--after',
		'perPage' => $__vars['perPage'],
	))) . '
</div>

';
	$__templater->modifySidebarHtml('_xfWidgetPositionSidebar0369c3abcfda40d4fb4ce9645b96b8de', $__templater->widgetPosition('conversation_list_sidebar', array()), 'replace');
	return $__finalCompiled;
}
);