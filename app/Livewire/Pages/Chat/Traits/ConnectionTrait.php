<?php

namespace App\Livewire\Pages\Chat\Traits;

use App\Livewire\Traits\EventStringTrait;
use App\Services\Contracts\Connect\CreateContract;
use App\Services\Contracts\Connect\DeleteContract;
use App\Services\Interfaces\ConnectServiceInterface;
use Livewire\Attributes\On;

trait ConnectionTrait
{
    use EventStringTrait;

    /**
     * Handle the socket connection event
     * @param  array                   $state
     * @param  ConnectServiceInterface $service
     * @return void
     */
    #[On(self::SOCKET_CONNECTION)]
    public function connection(array $state, ConnectServiceInterface $service): void
    {
        $payload = new CreateContract(id: $state['id'], socket: $state['io']);
        $created = $service->create(contract: $payload);
        $this->dispatch(event: self::RELOAD_ONLINE_STATUS, status: $created);
    }

    /**
     * Handle the socket disconnect event
     * @param  array                   $state
     * @param  ConnectServiceInterface $service
     * @return void
     */
    #[On(self::SOCKET_DISCONNECT)]
    public function disconnect(array $state, ConnectServiceInterface $service): void
    {
        $payload = new DeleteContract(id: $state['id']);
        $deleted = $service->delete(contract: $payload);
        $this->dispatch(event: self::RELOAD_ONLINE_STATUS, status: $deleted);
    }
}
