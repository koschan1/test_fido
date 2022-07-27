<?php
// FROM HASH: f55ec0602f5aace40e6d1318d54fbda5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Обновление XenForo' . $__vars['xf']['language']['label_separator'] . ' ' . $__templater->escape($__vars['availableUpdate']['version_string']));
	$__finalCompiled .= '

<div class="blocks">

';
	$__compilerTemp1 = '';
	if ($__vars['availableUpdate']['significant_upgrade']) {
		$__compilerTemp1 .= '
				<br />
				<br />
				' . 'Это значительное обновление, которое добавляет новые функции и содержит множество изменений. Возможно, после завершения обновления потребуется установить более новые версии стилей и плагинов.<br />
<br />
Для получения подробной информации, пожалуйста, ознакомьтесь с нашими <a href="https://xenforo.com/community/forums/announcements/" target="_blank">объявлениями о выпусках</a>.' . '
			';
	}
	$__compilerTemp2 = '';
	if ($__vars['useLatest']) {
		$__compilerTemp2 .= '
		' . $__templater->formHiddenVal('latest', '1', array(
		)) . '
	';
	}
	$__finalCompiled .= $__templater->form('
	<div class="block-container">
		<div class="block-body block-row">
			' . 'Версия XenForo ' . $__templater->escape($__vars['availableUpdate']['version_string']) . ' доступна для установки.' . '
			' . $__compilerTemp1 . '

			<br />
			<br />
			' . 'Вы можете выполнить обновление до этой версию из панели управления. Если Вы продолжите, новая версия будет загружена, файлы скопированы и обновление будет применено.<br />
<br />
Обратите внимание, что может быть рекомендовано выполнить обновление с помощью инструмента командной строки и в таком случае Вам будет предоставлена возможность использовать его вместо обновления через браузер.' . '

			<div class="block-rowMessage block-rowMessage--important">
				<b>' . 'Примечание' . $__vars['xf']['language']['label_separator'] . '</b>
				' . 'Прежде чем продолжить, настоятельно рекомендуется создать резервную копию базы данных и файлов. Это не делается автоматически.' . '
			</div>
		</div>
		' . $__templater->formSubmitRow(array(
		'icon' => 'download',
		'submit' => 'Загрузить и обновить' . $__vars['xf']['language']['ellipsis'],
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
	' . $__templater->formHiddenVal('confirm_version_id', $__vars['availableUpdate']['version_id'], array(
	)) . '
	' . $__compilerTemp2 . '
', array(
		'action' => $__templater->func('link', array('tools/upgrade-xf', ), false),
		'class' => 'block',
	)) . '

';
	if ($__vars['alternativeVersion']) {
		$__finalCompiled .= '
	<div class="blocks-textJoiner"><span></span><em>' . 'или' . '</em><span></span></div>

	<div class="block">
		<div class="block-container">
			<h2 class="block-minorHeader">' . 'Альтернативное обновление: XenForo ' . $__templater->escape($__vars['alternativeVersion']['version_string']) . '' . '</h2>
			<div class="block-body block-row">
				' . 'Версия XenForo ' . $__templater->escape($__vars['alternativeVersion']['version_string']) . ' доступна для установки.' . '
				<br />
				<br />
				' . 'Это значительное обновление, которое добавляет новые функции и содержит множество изменений. Возможно, после завершения обновления потребуется установить более новые версии стилей и плагинов.<br />
<br />
Для получения подробной информации, пожалуйста, ознакомьтесь с нашими <a href="https://xenforo.com/community/forums/announcements/" target="_blank">объявлениями о выпусках</a>.' . '
			</div>
			' . $__templater->formSubmitRow(array(
		), array(
			'rowtype' => 'simple',
			'html' => '
				' . $__templater->button('Обновить до версии ' . $__templater->escape($__vars['alternativeVersion']['version_string']) . '' . $__vars['xf']['language']['ellipsis'], array(
			'href' => $__templater->func('link', array('tools/upgrade-xf', null, array('latest' => 1, ), ), false),
			'class' => 'button--primary',
		), '', array(
		)) . '
			',
		)) . '
		</div>
	</div>
';
	}
	$__finalCompiled .= '

</div>';
	return $__finalCompiled;
}
);