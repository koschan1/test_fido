<?php
// FROM HASH: 3926640d9f58425b73573e6f2070fb71
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Плагины');
	$__finalCompiled .= '

';
	$__templater->includeCss('addon_list.less');
	$__finalCompiled .= '

';
	$__compilerTemp1 = '';
	if ($__vars['disabled']) {
		$__compilerTemp1 .= '
		' . $__templater->button('
			' . 'Включить' . '
		', array(
			'href' => $__templater->func('link', array('add-ons/mass-toggle', null, array('enable' => 1, ), ), false),
			'overlay' => 'true',
			'data-cache' => '0',
		), '', array(
		)) . '
	';
	}
	$__templater->pageParams['pageAction'] = $__templater->preEscaped('
	' . $__templater->button('
		' . 'Установить/обновить из архива' . '
	', array(
		'href' => $__templater->func('link', array('add-ons/install-from-archive', ), false),
		'overlay' => 'true',
		'icon' => 'add',
	), '', array(
	)) . '
	' . $__compilerTemp1 . '
	' . $__templater->button('
		' . 'Отключить все' . '
	', array(
		'href' => $__templater->func('link', array('add-ons/mass-toggle', null, array('enable' => 0, ), ), false),
		'overlay' => 'true',
		'data-cache' => '0',
	), '', array(
	)) . '
');
	$__finalCompiled .= '

';
	if ($__vars['hasProcessing']) {
		$__finalCompiled .= '
	<div class="blockMessage blockMessage--error blockMessage--iconic">
		' . 'В настоящее время один или несколько плагинов ожидают выполнения действий и могут находиться в несогласованном состоянии. Из-за этого могут возникать ошибки. Если это не изменится в ближайшее время, обратитесь за дополнительной информацией к разработчику.' . '
	</div>
';
	}
	$__finalCompiled .= '

';
	if ($__vars['upgradeCheck']) {
		$__finalCompiled .= '
	' . $__templater->callMacro('upgrade_check_macros', 'installable_add_ons', array(
			'upgradeCheck' => $__vars['upgradeCheck'],
		), $__vars) . '
';
	}
	$__finalCompiled .= '

' . $__templater->callMacro('addon_list_macros', 'addon_list_filter', array(), $__vars) . '

';
	if ($__vars['total']) {
		$__finalCompiled .= '
	<div class="addOnList">
		' . '
		' . $__templater->callMacro('addon_list_macros', 'addon_list_block', array(
			'addOns' => $__vars['upgradeable'],
			'heading' => 'Плагины, которые можно обновить',
		), $__vars) . '
		' . '
		' . $__templater->callMacro('addon_list_macros', 'addon_list_block', array(
			'addOns' => $__vars['installable'],
			'heading' => 'Плагины, которые можно установить',
			'addOnDirWritable' => $__vars['addOnDirWritable'],
		), $__vars) . '
		' . '
		' . $__templater->callMacro('addon_list_macros', 'addon_list_block', array(
			'addOns' => $__vars['installed'],
			'heading' => 'Установленные плагины',
		), $__vars) . '
		' . '
		' . $__templater->callMacro('addon_list_macros', 'addon_list_block', array(
			'addOns' => $__vars['legacy'],
			'heading' => 'Устаревшие плагины',
			'desc' => 'Устаревшие плагины совместимы только с XenForo 1-х версий. Они находятся в отключённом состоянии и не могут быть включены до тех пор, пока не будут обновлены до версий, совместимых с текущей версией XenForo. При удалении устаревшего плагина все его изменения базы данных останутся. Вы можете обратиться за советом к разработчику плагина для консультаций по обновлению.',
		), $__vars) . '
		' . '
	</div>
';
	} else {
		$__finalCompiled .= '
	<div class="blockMessage">' . 'Нет установленных или доступных для установки плагинов.' . '</div>
';
	}
	return $__finalCompiled;
}
);