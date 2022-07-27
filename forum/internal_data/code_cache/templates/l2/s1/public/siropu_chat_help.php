<?php
// FROM HASH: 73e0737a76cfe460bf8c355b09f616e5
return array(
'code' => function($__templater, array $__vars, $__extensions = null)
{
	$__finalCompiled = '';
	$__templater->pageParams['pageTitle'] = $__templater->preEscaped('Помощь');
	$__finalCompiled .= '

';
	$__templater->includeCss('siropu_chat_help.less');
	$__finalCompiled .= '

<div class="block siropuChatHelp">
	<div class="block-container">
		<div class="block-body">
			';
	if (!$__templater->test($__vars['commands'], 'empty', array())) {
		$__finalCompiled .= '
				<div class="block-row block-row--separated">
					' . 'Здесь Вы можете узнать разные команды и параметры, которые можно использовать в чате.' . '
				</div>
				';
		if ($__templater->isTraversable($__vars['commands'])) {
			foreach ($__vars['commands'] AS $__vars['command']) {
				$__finalCompiled .= '
					<div class="block-row block-row--separated">
						<h3 class="block-textHeader">/' . $__templater->escape($__vars['command']['command_name']) . '</h3>
						' . $__templater->filter($__vars['command']['description'], array(array('raw', array()),), true) . '
					</div>
				';
			}
		}
		$__finalCompiled .= '
			';
	}
	$__finalCompiled .= '
		</div>
	</div>
</div>';
	return $__finalCompiled;
}
);