<?php

namespace HuangYi\Shadowfax\Server\Events;

class ManagerStartEvent extends Event
{
    /**
     * Handle the event.
     *
     * @param  mixed  ...$args
     * @return void
     */
    public function handle(...$args)
    {
        $this->outputProcessInfo($args[0]);
    }

    /**
     * Output the process information.
     *
     * @param  \Swoole\Server  $server
     * @return void
     */
    protected function outputProcessInfo($server)
    {
        $this->output->writeln("<info>[√] manager process started. [{$server->manager_pid}]</info>");

        $host = $server->mode == SWOOLE_BASE ? " {$server->host}:{$server->port}" : '';

        $this->setProcessName(sprintf(
            '%s: manager process%s',
            $this->getName(),
            $host
        ));
    }
}
