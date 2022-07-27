<?php
// FROM HASH: 732f6f490ebd361ee2ddf9c932e93b8f
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Link to this room');
	$__finalCompiled .= '

<div class="block">
	<div class="block-container">
		<div class="block-body">
			' . $__templater->formTextBoxRow(array(
		'value' => $__templater->func('link', array('full:chat/room/', $__vars['room'], ), false),
	), array(
		'label' => 'Room URL',
	)) . '
			';
	if ($__vars['xf']['visitor']['is_admin']) {
		$__finalCompiled .= '
				' . $__templater->formTextBoxRow(array(
			'value' => $__templater->func('link', array('full:chat/room/', $__vars['room'], array('fullpage' => true, ), ), false),
		), array(
			'label' => 'Room full page URL',
		)) . '
				' . $__templater->formTextAreaRow(array(
			'value' => '<iframe src=' . '"' . $__templater->func('link', array('full:chat/room/', $__vars['room'], array('fullpage' => true, ), ), false) . '"' . ' width=' . '"' . '100%' . '"' . ' height=' . '"' . '400' . '"' . ' frameborder=' . '"' . '0' . '"' . '></iframe>',
			'rows' => '3',
		), array(
			'label' => 'Room embed code',
		)) . '
				';
		if ($__vars['room']['room_rss']) {
			$__finalCompiled .= '
					<hr class="formRowSep" />
					' . $__templater->formTextBoxRow(array(
				'value' => $__templater->func('link', array('full:chat/room/rss', $__vars['room'], ), false),
			), array(
				'label' => 'RSS',
			)) . '
				';
		}
		$__finalCompiled .= '
			';
	}
	$__finalCompiled .= '
		</div>
		' . $__templater->formSubmitRow(array(
		'submit' => 'Okay',
		'class' => 'js-overlayClose',
	), array(
		'rowtype' => 'simple',
	)) . '
	</div>
</div>';
	return $__finalCompiled;
}
);