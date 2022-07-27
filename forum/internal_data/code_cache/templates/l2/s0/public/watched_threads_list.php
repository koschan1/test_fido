<?php
// FROM HASH: 86db6280ad03906067d54362e5eaf414
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Отслеживаемые темы');
	$__templater->pageParams['pageNumber'] = $__vars['page'];
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['threads'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['threads'])) {
			foreach ($__vars['threads'] AS $__vars['thread']) {
				$__compilerTemp1 .= '
						';
				$__vars['extra'] = ($__vars['thread']['Watch'][$__vars['xf']['visitor']['user_id']]['email_subscribe'] ? 'Электронная почта' : '');
				$__compilerTemp1 .= '
						' . $__templater->callMacro('thread_list_macros', 'item', array(
					'thread' => $__vars['thread'],
					'chooseName' => 'thread_ids',
					'showWatched' => false,
					'extraInfo' => $__vars['extra'],
					'allowEdit' => false,
				), $__vars) . '
					';
			}
		}
		$__finalCompiled .= $__templater->form('
		<div class="block-outer">
			' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'watched/threads',
			'wrapperclass' => 'block-outer-main',
			'perPage' => $__vars['perPage'],
		))) . '
			<div class="block-outer-opposite">
				' . $__templater->button('Управление отслеживаемыми темами', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
		), '', array(
		)) . '
				<div class="menu" data-menu="menu" aria-hidden="true">
					<div class="menu-content">
						<h3 class="menu-header">' . 'Управление отслеживаемыми темами' . '</h3>
						' . '
						<a href="' . $__templater->func('link', array('watched/threads/manage', null, array('state' => 'watch_no_email', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Отключить уведомления по электронной почте' . '</a>
						<a href="' . $__templater->func('link', array('watched/threads/manage', null, array('state' => 'delete', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Перестать отслеживать темы' . '</a>
						' . '
					</div>
				</div>
			</div>
		</div>

		<div class="block-container">
			<div class="block-body">
				<div class="structItemContainer">
					' . $__compilerTemp1 . '
				</div>
			</div>
			<div class="block-footer block-footer--split">
				<span class="block-footer-counter"></span>
				<span class="block-footer-select">' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'check-all' => '< .block-container',
			'label' => 'Выбрать все',
			'_type' => 'option',
		))) . '</span>
				<span class="block-footer-controls">
						' . $__templater->formSelect(array(
			'name' => 'state',
			'class' => 'input--inline',
		), array(array(
			'label' => 'С выбранным' . $__vars['xf']['language']['ellipsis'],
			'_type' => 'option',
		),
		array(
			'value' => 'watch_email',
			'label' => 'Включить уведомления по электронной почте',
			'_type' => 'option',
		),
		array(
			'value' => 'watch_no_email',
			'label' => 'Отключить уведомления по электронной почте',
			'_type' => 'option',
		),
		array(
			'value' => 'delete',
			'label' => 'Перестать отслеживать',
			'_type' => 'option',
		))) . '
					' . $__templater->button('Выполнить', array(
			'type' => 'submit',
		), '', array(
		)) . '
				</span>
			</div>
		</div>

		' . $__templater->func('page_nav', array(array(
			'link' => 'watched/threads',
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'wrapperclass' => 'block-outer block-outer--after',
			'perPage' => $__vars['perPage'],
		))) . '

		' . $__templater->func('show_ignored', array(array(
			'wrapperclass' => 'block-outer block-outer-opposite block-outer--after',
		))) . '
	', array(
			'action' => $__templater->func('link', array('watched/threads/update', ), false),
			'ajax' => 'true',
			'class' => 'block',
			'autocomplete' => 'off',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">
		';
		if ($__vars['page'] > 1) {
			$__finalCompiled .= '
			' . 'Нет тем для отображения.' . '
		';
		} else {
			$__finalCompiled .= '
			<p>' . 'Вы не следите ни за одной темой.' . '</p>
			<div>' . 'Показать все' . $__vars['xf']['language']['label_separator'] . '</div>
			<ul>
				<li><a href="' . $__templater->func('link', array('find-threads/started', ), true) . '">' . 'Темы, созданные Вами' . '</a></li>
				<li><a href="' . $__templater->func('link', array('find-threads/contributed', ), true) . '">' . 'Темы с Вашими участием' . '</a></li>
			</ul>
		';
		}
		$__finalCompiled .= '
	</div>
';
	}
	return $__finalCompiled;
}
);