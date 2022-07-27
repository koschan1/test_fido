<?php

namespace Siropu\Chat\Service;

abstract class AbstractActionLogger extends \XF\Service\AbstractService
{
     protected $cache;
     protected $actions;
     protected $action;

	public function __construct(\XF\App $app, $action = '')
	{
		parent::__construct($app);

          $this->cache   = $this->app->simpleCache();
          $this->actions = $this->cache['Siropu/Chat']['actions'] ?: [];
          $this->action  = $action;
	}
     public function cleanLog()
     {
          $update = false;

          foreach ($this->actions as $type => $typeActions)
          {
               foreach ($typeActions as $itemId => $actions)
               {
                    foreach ($actions as $messageId => $action)
                    {
                         foreach ($action['action'] as $actionType => $date)
                         {
                              if ($date <= \XF::$time - 60)
                              {
                                   unset($this->actions[$type][$itemId][$messageId]['action'][$actionType]);

                                   if (empty($this->actions[$type][$itemId][$messageId]['action']))
                                   {
                                        unset($this->actions[$type][$itemId][$messageId]);

                                        if (empty($this->actions[$type][$itemId]))
                                        {
                                             unset($this->actions[$type][$itemId]);
                                        }
                                   }

                                   $update = true;
                              }
                         }
                    }
               }
          }

          if ($update)
          {
               $this->cache['Siropu/Chat']['actions'] = $this->actions;
          }
     }
     public function emptyLog()
     {
          $this->cache['Siropu/Chat']['actions'] = [
               'rooms'         => [],
               'conversations' => []
          ];
     }
}
