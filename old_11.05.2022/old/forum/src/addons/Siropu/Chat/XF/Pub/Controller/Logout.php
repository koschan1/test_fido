<?php

namespace Siropu\Chat\XF\Pub\Controller;

use XF\Mvc\ParameterBag;

class Logout extends XFCP_Logout
{
     public function actionIndex()
	{
          if (\XF::options()->siropuChatLogoutUserOnSiteLogout)
          {
               $visitor = \XF::visitor();
               $visitor->siropuChatLogout();
               $visitor->save(false);
          }

          return parent::actionIndex();
     }
}
