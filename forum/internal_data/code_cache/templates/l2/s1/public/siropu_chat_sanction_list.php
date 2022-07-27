<?php
// FROM HASH: a357927c80d855267aee625681951b0e
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Наказаные пользователи');
	$__finalCompiled .= '

';
	$__templater->includeCss('structured_list.less');
	$__finalCompiled .= '

<div class="block">
	<div class="block-outer">
		<div class="block-outer-opposite">
			';
	if ($__templater->method($__vars['xf']['visitor'], 'canSanctionSiropuChat', array())) {
		$__finalCompiled .= '
				' . $__templater->button($__templater->fontAwesome('fa-ban', array(
		)) . ' ' . 'Наказание к пользователю', array(
			'href' => $__templater->func('link', array('chat/sanction', ), false),
			'class' => 'button--cta',
			'data-xf-click' => 'overlay',
		), '', array(
		)) . '
			';
	}
	$__finalCompiled .= '
			' . $__templater->button('Найти наказание', array(
		'class' => 'button--link menuTrigger',
		'data-xf-click' => 'menu',
		'aria-expanded' => 'false',
		'aria-haspopup' => 'true',
	), '', array(
	)) . '
			<div class="menu" data-menu="menu" aria-hidden="true">
				' . $__templater->form('
					<div class="menu-row">
						' . 'Найти наказание пользователя' . $__vars['xf']['language']['label_separator'] . '
						' . $__templater->formTextBox(array(
		'name' => 'username',
		'ac' => 'single',
		'maxlength' => $__templater->func('max_length', array($__vars['xf']['visitor'], 'username', ), false),
	)) . '
					</div>
					<div class="menu-footer">
						<span class="menu-footer-controls">' . $__templater->button('', array(
		'type' => 'submit',
		'class' => 'button--primary',
		'icon' => 'search',
	), '', array(
	)) . '</span>
					</div>
				', array(
		'action' => $__templater->func('link', array('chat/sanctions', ), false),
		'class' => 'menu-content',
	)) . '
			</div>
		</div>
	</div>
    <div class="block-container">
		<h2 class="block-tabHeader tabs">
			<a href="' . $__templater->func('link', array('chat/sanctions/', ), true) . '" class="tabs-tab' . (($__vars['type'] == '') ? ' is-active' : '') . '">' . 'Все наказания' . '</a>
			<a href="' . $__templater->func('link', array('chat/sanctions/', null, array('type' => 'ban', ), ), true) . '" class="tabs-tab' . (($__vars['type'] == 'ban') ? ' is-active' : '') . '">' . 'Пользователи, которых заблокировали' . '</a>
			<a href="' . $__templater->func('link', array('chat/sanctions/', null, array('type' => 'kick', ), ), true) . '" class="tabs-tab' . (($__vars['type'] == 'kick') ? ' is-active' : '') . '">' . 'Пользователи, которых выгнали' . '</a>
			<a href="' . $__templater->func('link', array('chat/sanctions/', null, array('type' => 'mute', ), ), true) . '" class="tabs-tab' . (($__vars['type'] == 'mute') ? ' is-active' : '') . '">' . 'Пользователи, которым запретили писать сообщения' . '</a>
		</h2>
        <div class="block-body">
			';
	if (!$__templater->test($__vars['sanctions'], 'empty', array())) {
		$__finalCompiled .= '
				';
		$__compilerTemp1 = '';
		if ($__templater->isTraversable($__vars['sanctions'])) {
			foreach ($__vars['sanctions'] AS $__vars['sanction']) {
				$__compilerTemp1 .= '
						';
				$__compilerTemp2 = '';
				if (!$__templater->test($__vars['sanction']['Room'], 'empty', array())) {
					$__compilerTemp2 .= '
									' . $__templater->escape($__vars['sanction']['Room']['room_name']) . '
								';
				} else {
					$__compilerTemp2 .= '
									' . 'Все комнаты' . '
								';
				}
				$__compilerTemp3 = '';
				if ($__vars['sanction']['sanction_end']) {
					$__compilerTemp3 .= '
									' . $__templater->func('date_dynamic', array($__vars['sanction']['sanction_end'], array(
					))) . '
								';
				} else {
					$__compilerTemp3 .= '
									' . 'Никогда' . '
								';
				}
				$__compilerTemp4 = '';
				if ($__vars['sanction']['sanction_reason']) {
					$__compilerTemp4 .= '
									<span title="' . $__templater->filter('Причина наказания', array(array('for_attr', array()),), true) . ': ' . $__templater->filter($__vars['sanction']['sanction_reason'], array(array('for_attr', array()),), true) . '" data-xf-init="tooltip">' . $__templater->fontAwesome('fa-question-circle', array(
					)) . '</span>
								';
				}
				$__compilerTemp5 = '';
				if ($__templater->method($__vars['sanction'], 'canRemove', array())) {
					$__compilerTemp5 .= '
									<a href="' . $__templater->func('link', array('chat/sanction/edit', $__vars['sanction'], ), true) . '" title="' . $__templater->filter('Редактировать наказание', array(array('for_attr', array()),), true) . '" data-xf-init="tooltip" data-xf-click="overlay">' . $__templater->fontAwesome('fa-cog', array(
					)) . '</a>
									<a href="' . $__templater->func('link', array('chat/sanction/lift', $__vars['sanction'], ), true) . '" title="' . $__templater->filter('Снять наказание', array(array('for_attr', array()),), true) . '" data-xf-init="tooltip" data-xf-click="overlay">' . $__templater->fontAwesome('fa-times-circle', array(
					)) . '</a>
								';
				}
				$__compilerTemp1 .= $__templater->dataRow(array(
					'rowclass' => 'dataList-row--noHover',
				), array(array(
					'_type' => 'cell',
					'html' => $__templater->func('avatar', array($__vars['sanction']['User'], 'xxs', false, array(
				))) . ' ' . $__templater->func('username_link', array($__vars['sanction']['User'], false, array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp2 . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->escape($__templater->method($__vars['sanction'], 'getTypePhrase', array())),
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('date_dynamic', array($__vars['sanction']['sanction_start'], array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp3 . '
							',
				),
				array(
					'_type' => 'cell',
					'html' => $__templater->func('avatar', array($__vars['sanction']['Author'], 'xxs', false, array(
				))) . ' ' . $__templater->func('username_link', array($__vars['sanction']['Author'], false, array(
				))),
				),
				array(
					'_type' => 'cell',
					'html' => '
								' . $__compilerTemp4 . '
								' . $__compilerTemp5 . '
							',
				))) . '
					';
			}
		}
		$__finalCompiled .= $__templater->dataList('
					' . $__templater->dataRow(array(
			'rowtype' => 'header',
		), array(array(
			'_type' => 'cell',
			'html' => 'Имя пользователя',
		),
		array(
			'_type' => 'cell',
			'html' => 'Комната',
		),
		array(
			'_type' => 'cell',
			'html' => 'Тип наказания',
		),
		array(
			'_type' => 'cell',
			'html' => 'Наказание началось',
		),
		array(
			'_type' => 'cell',
			'html' => 'Наказание заканчивается',
		),
		array(
			'_type' => 'cell',
			'html' => 'Наказание за',
		),
		array(
			'_type' => 'cell',
			'html' => '&nbsp;',
		))) . '
					' . $__compilerTemp1 . '
				', array(
			'data-xf-init' => 'responsive-data-list',
		)) . '
				' . $__templater->func('page_nav', array(array(
			'page' => $__vars['page'],
			'total' => $__vars['total'],
			'link' => 'portal',
			'wrapperclass' => 'block',
			'perPage' => $__vars['perPage'],
		))) . '
			';
	} else {
		$__finalCompiled .= '
				<div class="block-row">' . 'В данный момент наказания отсутствуют.' . '</div>
			';
	}
	$__finalCompiled .= '
        </div>
		';
	if (!$__templater->test($__vars['sanctions'], 'empty', array())) {
		$__finalCompiled .= '
			<div class="block-footer">
				' . $__templater->func('display_totals', array($__templater->func('count', array($__vars['sanctions'], ), false), $__vars['total'], ), true) . '
			</div>
		';
	}
	$__finalCompiled .= '
    </div>
</div>';
	return $__finalCompiled;
}
);