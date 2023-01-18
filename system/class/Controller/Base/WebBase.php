<?php
namespace Service\Controller\Base;

use Firaiz\Ufl\Date;
use Firaiz\Ufl\Exception\Session\NotStarted;
use Firaiz\Ufl\Render;
use Firaiz\Ufl\Security\Csrf;
use Firaiz\Ufl\Session;

abstract class WebBase extends Base
{
    /** @var ?string */
    protected ?string $mode = '';
    
    protected function init():void
    {
        parent::init();

        // IP許可設定
        $ipEnables = $this->conf->get('application.ip.enables', array());
        if (0 < count($ipEnables) && !in_array(REAL_IP, $ipEnables, true)) {
            http_response_code(404);
            exit;
        }

        // IP拒否設定
        $ipDisables = $this->conf->get('application.ip.disables', array());
        if (0 < count($ipDisables) && in_array(REAL_IP, $ipDisables, true)) {
            http_response_code(404);
            exit;
        }

        // session 初期設定
        $session = Session::getInstance();
//        $session->setConfig('save_path', storage('storage/session', true));
//        $session->setConfig('cache_limiter', 'private_no_expire');
//        $session->setConfig('cache_expire', 86400);
        $session->start();

        // mode自動設定
        $this->mode = $this->request->post('mode', $this->request->get('mode'));

        if (!$this->preRouting()) {
            exit;
        }

        // 汎用的なassign
        $this->initCommonAssign();

        // commonレイアウト定義
        $render = Render::getInstance();
        $render->setLayout('defaultLayout.tpl');
        $render->assign('baseLink', $this->conf->get('application.baseLink'));
    }

    protected function initCommonAssign(): void
    {
        $this->response->assign('now', Date::now());
        $this->response->assign('today', Date::today());
        $this->response->assign('isDebuggable', IS_DEBUGGABLE);
        $this->response->assign('isLegacyBrowser', IS_LEGACY_BROWSER);
    }

    private function preRouting(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return true;
        }
        try {
            if (!Csrf::isValidToken($this->request->post(Csrf::CSRF_TAG))) {
                return false;
            }
        } catch (NotStarted $e) {
            // session not start
            return false;
        }
        return true;
    }
}