<?php
// FROM HASH: 7f2cac8d689fa0d4a39bcb6a6db437eb
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Отслеживаемые разделы');
	$__finalCompiled .= '

';
	$__templater->includeCss('node_list.less');
	$__finalCompiled .= '

';
	if (!$__templater->test($__vars['watchedForums'], 'empty', array())) {
		$__finalCompiled .= '
	';
		$__compilerTemp1 = '';
		$__compilerTemp2 = $__templater->method($__vars['nodeTree'], 'getFlattened', array());
		if ($__templater->isTraversable($__compilerTemp2)) {
			foreach ($__compilerTemp2 AS $__vars['id'] => $__vars['treeEntry']) {
				$__compilerTemp1 .= '
					';
				$__vars['node'] = $__vars['treeEntry']['record'];
				$__compilerTemp1 .= '
					';
				$__vars['forumWatch'] = $__vars['watchedForums'][$__vars['node']['node_id']];
				$__compilerTemp1 .= '
					';
				if ($__vars['forumWatch']) {
					$__compilerTemp1 .= '
						';
					$__compilerTemp3 = '';
					if ($__vars['forumWatch']['notify_on'] == 'thread') {
						$__compilerTemp3 .= '
									<li>' . 'Новые темы' . '</li>
								';
					} else if ($__vars['forumWatch']['notify_on'] == 'message') {
						$__compilerTemp3 .= '
									<li>' . 'Новые сообщения' . '</li>
								';
					}
					$__compilerTemp4 = '';
					if ($__vars['forumWatch']['send_alert']) {
						$__compilerTemp4 .= '<li>' . 'Оповещения' . '</li>';
					}
					$__compilerTemp5 = '';
					if ($__vars['forumWatch']['send_email']) {
						$__compilerTemp5 .= '<li>' . 'Электронная почта' . '</li>';
					}
					$__vars['bonusInfo'] = $__templater->preEscaped('
							<ul class="listInline listInline--bullet">
								' . $__compilerTemp3 . '
								' . $__compilerTemp4 . '
								' . $__compilerTemp5 . '
							</ul>
						');
					$__compilerTemp1 .= '
						' . $__templater->callMacro('node_list_forum', 'forum', array(
						'node' => $__vars['node'],
						'extras' => $__vars['nodeExtras'][$__vars['node']['node_id']],
						'children' => $__vars['nodeTree'][$__vars['id']]['children'],
						'childExtras' => $__vars['nodeExtras'],
						'depth' => '2',
						'chooseName' => 'node_ids',
						'bonusInfo' => $__vars['bonusInfo'],
					), $__vars) . '
					';
				}
				$__compilerTemp1 .= '
				';
			}
		}
		$__finalCompiled .= $__templater->form('

		<div class="block-outer">

			<div class="block-outer-opposite">
				' . $__templater->button('Управление отслеживаемыми разделами', array(
			'class' => 'button--link menuTrigger',
			'data-xf-click' => 'menu',
			'aria-expanded' => 'false',
			'aria-haspopup' => 'true',
		), '', array(
		)) . '
				<div class="menu" data-menu="menu" aria-hidden="true">
					<div class="menu-content">
						<h3 class="menu-header">' . 'Управление отслеживаемыми разделами' . '</h3>
						' . '
						<a href="' . $__templater->func('link', array('watched/forums/manage', null, array('state' => 'watch_no_email', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Отключить уведомления по электронной почте' . '</a>
						<a href="' . $__templater->func('link', array('watched/forums/manage', null, array('state' => 'delete', ), ), true) . '" data-xf-click="overlay" class="menu-linkRow">' . 'Перестать отслеживать разделы' . '</a>
						' . '
					</div>
				</div>
			</div>
		</div>

		<div class="block-container">
			<div class="block-body">
				' . $__compilerTemp1 . '
			</div>
			<div class="block-footer block-footer--split">
				<span class="block-footer-counter"></span>
				<span class="block-footer-select">' . $__templater->formCheckBox(array(
			'standalone' => 'true',
		), array(array(
			'class' => 'input--inline',
			'check-all' => '< .block-container',
			'label' => 'Выбрать все',
			'_type' => 'option',
		))) . '</span>
				<span class="block-footer-controls">
					' . $__templater->formSelect(array(
			'name' => 'action',
			'class' => 'input--inline',
		), array(array(
			'label' => 'С выбранным' . $__vars['xf']['language']['ellipsis'],
			'_type' => 'option',
		),
		array(
			'value' => 'email',
			'label' => 'Включить уведомления по электронной почте',
			'_type' => 'option',
		),
		array(
			'value' => 'no_email',
			'label' => 'Отключить уведомления по электронной почте',
			'_type' => 'option',
		),
		array(
			'value' => 'alert',
			'label' => 'Включить оповещения',
			'_type' => 'option',
		),
		array(
			'value' => 'no_alert',
			'label' => 'Отключить оповещения',
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
	', array(
			'action' => $__templater->func('link', array('watched/forums/update', ), false),
			'ajax' => 'true',
			'class' => 'block',
			'autocomplete' => 'off',
		)) . '
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Вы не следите ни за одним разделом.' . '</div>
';
	}
	return $__finalCompiled;
}
);