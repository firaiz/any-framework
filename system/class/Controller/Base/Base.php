<?php
namespace Service\Controller\Base;


use Firaiz\Ufl\Base as SystemBase;
use Firaiz\Ufl\Date;
use Firaiz\Ufl\Session;
use Firaiz\Ufl\StringUtility;

abstract class Base extends SystemBase
{
    protected string $logKey;

    protected function init(): void
    {
        // 初期化
        parent::init();

        // timezone設定
        Date::init($this->conf->get('application.timezone'));

        // db自動接続
        // $this->db->connect();

        $this->logKey = StringUtility::randomUUID('');
    }

    public function __destruct()
    {
        if (USE_DEBUG_LOG) {
            $logDir = storage('storage/log', true);
            $fileName = $this->getLogFileName();
            file_put_contents($logDir.DS.$fileName, $this->getLogString().PHP_EOL, FILE_APPEND);
        }
    }

    protected function getLogString(): bool|string
    {
        return json_encode($this->getLogData(), JSON_THROW_ON_ERROR);
    }

    private $userLogs = [];

    protected function appendLog($message): void
    {
        $dbg = debug_backtrace();
        $this->userLogs[] = [
            'info' => $dbg[1],
            'message' => $message
        ];
    }

    protected function getLogData() {
        $logValues = array('date' => Date::nowString(), 'one-time-key' => $this->logKey, 'IP' => REAL_IP, 'REQUEST' => $_REQUEST, 'FILE' => $_FILES);
        if (Session::getInstance()->isStarted()) {
            $sessionKey = $this->session->get('__key__', StringUtility::randomUUID());
            $this->session->set('__key__', $sessionKey);
            $logValues['uuid'] = $sessionKey;
            $logValues['SESSION'] = $_SESSION;
        }
        $logValues['user-logs'] = $this->userLogs;
        return $logValues;
    }


    protected function getSQLLogFileName(): string
    {
        return 'sql-'.$this->getLogFileName();
    }

    protected function getLogFileName(): string
    {
        return basename($_SERVER['PHP_SELF']).'.log';
    }
}