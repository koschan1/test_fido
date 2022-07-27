<?php

namespace Siropu\Chat\ControllerPlugin;

class Update extends \XF\ControllerPlugin\AbstractPlugin
{
	public function getUpdates(array $params)
	{
		$visitor  = \XF::visitor();
          $options  = \XF::options();

		$settings = $visitor->getSiropuChatSettings();
		$whereOr  = [];

		if (!empty($params['lastId']))
		{
			foreach ($params['lastId'] as $roomId => $lastId)
			{
				if (isset($visitor->siropuChatGetJoinedRooms()[$roomId]))
				{
					$whereOr[] = [['message_room_id', $roomId], ['message_id', '>', $lastId]];
				}
			}
		}

          $finder = $this->getMessageRepo()->findMessages()->defaultLimit();

		if (!$visitor->canSanctionSiropuChat())
		{
			$finder->notIgnored();
		}

          if (!empty($params['roomId']))
          {
               $finder->fromRoom($params['roomId']);
          }
          else if ($whereOr)
          {
			$finder->whereOr($whereOr);
          }
		else
		{
			$finder->fromRoom($visitor->siropuChatGetRoomIds());
		}

		if ($settings['hide_bot'] && empty($params['roomId']))
		{
			$finder->notFromType('bot');
		}

		if (!$settings['show_ignored'])
          {
               $finder->notFromIgnoredUsers();
          }

          $messages = $finder->fetch()->filter(function(\Siropu\Chat\Entity\Message $message)
		{
			return ($message->canView());
		});

          $userUpdateInterval = $this->getChannel() == 'room' ? 30 : 60;
          $userLastUpdate     = $this->filter('user_last_update', 'uint') ?: \XF::$time - $userUpdateInterval;
          $inactiveRoomId     = isset($params['inactiveRoomId']) ? $params['inactiveRoomId'] : false;

		if ($inactiveRoomId
               || $params['action'] != 'submit'
                    && !$settings['hide_chatters']
                    && \XF::$time - $userLastUpdate >= $userUpdateInterval)
		{
			$users = $this->repository('Siropu\Chat:User')
				->findActiveUsers()
				->fetch()
				->filter(function(\XF\Entity\User $user) use ($visitor)
				{
					return ($user->isVisibleSiropuChat() && !$visitor->isIgnoring($user));
				});

               $params['updateUsers'] = true;
		}
		else
		{
			$users = [];
		}

		$messageSorterService = $this->service('Siropu\Chat:Message\Sorter');
		$messageSorterService->prepareForDisplay($messages);

          $viewParams = [
               'users'       => $this->getUserRepo()->groupUsersByRoom($users),
			'userCount'   => $this->getUserRepo()->getUserCount($users),
			'messages'    => $messageSorterService->getGroupedMessages(),
			'lastMessage' => $messageSorterService->getLastMessage(),
               'lastRoomIds' => $messageSorterService->getLastIds(),
			'playSound'   => $messageSorterService->getPlaySound(),
               'hasImages'   => $messageSorterService->getHasImages(),
               'isSelf'      => $messageSorterService->getIsSelf(),
               'params'      => $params
          ];

		if ($params['action'] == 'update')
		{
			$viewParams = array_merge($viewParams, $this->getConvData($params));
		}

          if ($params['action'] == 'join')
		{
               $userIds = $this->getUserRepo()->getUserIdsByRoom($users);

               if (isset($userIds[$params['roomId']]))
               {
                    $viewParams['params']['userIds'] = $userIds[$params['roomId']];
               }
          }

          return $this->view('Siropu\Chat:Chat', '', $viewParams);
	}
	public function getConvUpdates(array $params = [])
	{
		return $this->view('Siropu\Chat:Chat', '', $this->getConvData($params));
	}
	public function getConvData(array $params)
	{
		$visitor = \XF::visitor();
		$options = \XF::options();

		if (!($options->siropuChatPrivateConversations
               && $visitor->canChatInPrivateSiropuChat()
               && $visitor->hasConversationsSiropuChat()))
          {
			return [];
		}

          $convUpdateInterval = $this->getChannel() == 'conv' ? 30 : 60;
          $convLastUpdate     = $this->filter('conv_last_update', 'uint') ?: \XF::$time - $convUpdateInterval;

          if (\XF::$time - $convLastUpdate >= $convUpdateInterval)
          {
               $contacts = $this->getConversationRepo()->getUserConversations();
               $params['updateConv'] = true;
          }
          else
          {
               $contacts = [];
          }

		$finder = $this->getConversationMessageRepo()
			->findMessages()
			->forConversation($visitor->siropuChatGetConvIds());

		if (!empty($params['insert_id']))
		{
			$finder->where('message_id', '>=', $params['insert_id']);
		}
		else
		{
			$finder->unread();
		}

		$messages = $finder->fetch()->filter(function(\Siropu\Chat\Entity\ConversationMessage $message)
		{
			return ($message->canView());
		});

		$conversationPreparer = $this->service('Siropu\Chat:Conversation\Preparer');
		$conversationPreparer->prepareForDisplay($messages);

          $viewParams = [
               'convContacts'    => $contacts,
			'convMessages'    => $conversationPreparer->getGroupedMessages(),
			'convLastMessage' => $conversationPreparer->getLastMessage(),
			'convUnread'      => $conversationPreparer->getUnread(),
               'hasImages'       => $conversationPreparer->getHasImages(),
               'isSelf'          => $conversationPreparer->getIsSelf(),
			'params'          => $params
          ];

          switch ($options->siropuChatConvTabCount)
          {
               case 'onlineCount':
                    $viewParams['convTabCount'] = $conversationPreparer->getOnlineCount($contacts);
                    break;
               case 'unreadCount':
                    $viewParams['convTabCount'] = $conversationPreparer->getUnreadCount();
                    break;
          }

		return $viewParams;
	}
     public function getChannel()
     {
          return $this->request->getCookie('siropu_chat_channel', 'room');
     }
	protected function getMessageRepo()
	{
		return $this->repository('Siropu\Chat:Message');
	}
	protected function getUserRepo()
	{
		return $this->repository('Siropu\Chat:User');
	}
	protected function getConversationRepo()
	{
		return $this->repository('Siropu\Chat:Conversation');
	}
	protected function getConversationMessageRepo()
	{
		return $this->repository('Siropu\Chat:ConversationMessage');
	}
}
