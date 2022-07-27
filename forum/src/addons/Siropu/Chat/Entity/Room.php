<?php

namespace Siropu\Chat\Entity;

use XF\Mvc\Entity\Entity;
use XF\Mvc\Entity\Structure;

class Room extends Entity
{
     public static function getStructure(Structure $structure)
	{
          $structure->table      = 'xf_siropu_chat_room';
          $structure->shortName  = 'Chat:Room';
          $structure->primaryKey = 'room_id';

          $structure->columns = [
               'room_id'            => ['type' => self::UINT, 'autoIncrement' => true],
               'room_user_id'       => ['type' => self::UINT, 'default' => \XF::visitor()->user_id],
               'room_name'          => ['type' => self::STR, 'maxLength' => 100, 'required' => 'siropu_chat_room_name_required', 'unique' => 'siropu_chat_room_name_must_be_unique', 'censor' => true],
               'room_description'   => ['type' => self::STR, 'maxLength' => 255, 'required' => 'siropu_chat_room_description_required', 'censor' => true],
               'room_password'      => ['type' => self::STR, 'maxLength' => 15, 'default' => ''],
               'room_users'         => ['type' => self::JSON_ARRAY, 'default' => []],
               'room_user_groups'   => ['type' => self::JSON_ARRAY, 'default' => []],
               'room_language_id'   => ['type' => self::UINT, 'default' => 0],
               'room_leave'         => ['type' => self::UINT, 'default' => 1],
               'room_readonly'      => ['type' => self::UINT, 'default' => 0],
               'room_locked'        => ['type' => self::UINT, 'default' => 0],
               'room_rss'           => ['type' => self::UINT, 'default' => 0],
               'room_prune'         => ['type' => self::UINT, 'default' => 0],
               'room_flood'         => ['type' => self::UINT, 'default' => 0],
               'room_thread_id'     => ['type' => self::UINT, 'default' => 0],
               'room_thread_reply'  => ['type' => self::BOOL, 'default' => false],
               'room_child_ids'     => ['type' => self::JSON_ARRAY, 'default' => []],
               'room_date'          => ['type' => self::UINT, 'default' => \XF::$time],
               'room_user_count'    => ['type' => self::UINT, 'default' => 0],
               'room_last_activity' => ['type' => self::UINT, 'default' => 0],
               'room_last_prune'    => ['type' => self::UINT, 'default' => 0],
               'room_state'         => ['type' => self::STR, 'default' => 'visible', 'allowedValues' => ['visible', 'deleted']]
          ];

          $structure->getters   = [];
          $structure->relations = [
               'User' => [
                    'entity'     => 'XF:User',
                    'type'       => self::TO_ONE,
                    'conditions' => [['user_id', '=', '$room_user_id']]
               ]
          ];

          return $structure;
     }
     public function isMain()
     {
          return $this->room_id == 1;
     }
     public function isActive()
     {
          $visitor = \XF::visitor();

          return $this->room_id == $visitor->getLastRoomIdSiropuChat();
     }
     public function isPrivate()
     {
          return $this->room_users || $this->room_password || $this->room_user_groups;
     }
     public function canJoin($password = null, $requirePassword = true)
     {
          $visitor = \XF::visitor();

          if ($this->isAuthor())
          {
               return true;
          }

          if ($visitor->canJoinAnyRoomSiropuChat())
          {
               return true;
          }

          if ($this->room_users && !isset($this->room_users[$visitor->user_id]))
          {
               return false;
          }

          if ($this->room_language_id && $this->room_language_id != $visitor->language_id)
          {
               return false;
          }

          if ($this->isLocked())
          {
               return false;
          }

          if ($this->room_password
               && $requirePassword
               && !($this->room_password == $password || $visitor->canBypassSiropuChatRoomPassword()))
          {
               return false;
          }

          if ($this->room_user_groups && !$visitor->isMemberOf($this->room_user_groups))
          {
               return false;
          }

          return true;
     }
     public function canEdit()
     {
          $visitor = \XF::visitor();

          if ($this->isAuthor() || $visitor->hasPermission('siropuChatModerator', 'editAnyRoom'))
          {
               return true;
          }
     }
     public function canDelete()
     {
          $visitor = \XF::visitor();

          if ($this->isMain())
          {
               return false;
          }

          if ($this->isAuthor() || $visitor->hasPermission('siropuChatModerator', 'deleteAnyRoom'))
          {
               return true;
          }
     }
     public function canLeave(&$error = null)
     {
          $options = \XF::options();

          if ($this->room_leave == 0 || !$options->siropuChatRooms)
          {
               $error = \XF::phraseDeferred('siropu_chat_cannot_leave_room');
               return false;
          }

          return true;
     }
     public function isJoined()
     {
          $visitor = \XF::visitor();

          return $visitor->hasJoinedRoomSiropuChat($this->room_id);
     }
     public function isReadOnly()
     {
          return $this->room_readonly == 1;
     }
     public function isLocked(&$error = null)
     {
          if ($this->room_locked && $this->room_locked > \XF::$time)
          {
               $error = \XF::phraseDeferred('siropu_chat_room_is_locked_until', [
                    'date' => \XF::language()->date($this->room_locked, 'M d, Y')
               ]);

               return true;
          }
     }
     public function isSanctionNotice()
     {
          $visitor = \XF::visitor();

          if ($visitor->isSanctionedSiropuChat() && ($sanction = $visitor->siropuChatGetRoomSanction($this->room_id)))
          {
               return $sanction->getNotice();
          }
     }
     public function isAuthor()
     {
          $visitor = \XF::visitor();

          return $visitor->user_id == $this->room_user_id;
     }
     public function getUserCount($users)
     {
          return !empty($users[$this->room_id]) ? count($users[$this->room_id]) : 0;
     }
     public function getActiveUsers()
     {
          return $this->app()->repository('Siropu\Chat:User')
               ->findActiveUsers()
               ->where('siropu_chat_room_id', $this->room_id)
               ->fetch()
               ->filter(function(\XF\Entity\User $user)
               {
                    return ($user->isVisibleSiropuChat());
               });
     }
     protected function _preSave()
	{
          if ($this->isChanged('room_child_ids'))
          {
               $rooms = \XF::finder('siropu\Chat:Room')->notFromRoom($this->room_id)->fetch();

               foreach ($rooms as $room)
               {
                    if (in_array($this->room_id, $room->room_child_ids) && in_array($room->room_id, $this->room_child_ids))
                    {
                         return $this->error(\XF::phrase('siropu_chat_infinite_loop_room_post_error', [
                              'room1' => $room->room_name,
                              'room2' => $this->room_name
                         ]));
                    }
               }
          }
     }
     protected function _postSave()
	{
          $visitor = \XF::visitor();

          if ($this->isChanged('room_users'))
          {
               $alertRepo = \XF::repository('XF:UserAlert');
               $oldUsers  = $this->getPreviousValue('room_users');

               $joinRoom = array_diff($this->room_users, $oldUsers);
               unset($joinRoom[$visitor->user_id]);

               if ($joinRoom)
               {
                    $users = $this->finder('XF:User')
                         ->where('user_id', array_keys($joinRoom))
                         ->fetch();

                    foreach ($users as $user)
                    {
                         $user->siropuChatUpdateRooms($this->room_id, false);
                         $user->save();

                         $alertRepo->alert(
                              $user,
                              $visitor->user_id,
                              $visitor->username,
                              'siropu_chat_room',
                              $this->room_id,
                              'private_join'
                         );
                    }
               }

               $leaveRoom = array_diff($oldUsers, $this->room_users);
               unset($leaveRoom[$visitor->user_id]);

               if ($leaveRoom)
               {
                    $users = $this->finder('XF:User')
                         ->where('user_id', array_keys($leaveRoom))
                         ->fetch();

                    foreach ($users as $user)
                    {
                         if ($user->hasJoinedRoomSiropuChat($this->room_id))
                         {
                              $user->siropuChatLeaveRoom($this->room_id, false);
                              $user->save();

                              $alertRepo->alert(
                                   $user,
                                   $visitor->user_id,
                                   $visitor->username,
                                   'siropu_chat_room',
                                   $this->room_id,
                                   'private_leave'
                              );
                         }
                    }
               }
          }

          \XF::repository('Siropu\Chat:Room')->rebuildRoomCache();
	}
	protected function _postDelete()
	{
          \XF::repository('Siropu\Chat:Room')->rebuildRoomCache();
          \XF::repository('Siropu\Chat:Message')->pruneRoomMessages($this->room_id);
          \XF::repository('Siropu\Chat:Sanction')->deleteRoomSanctions($this->room_id);
	}
}
