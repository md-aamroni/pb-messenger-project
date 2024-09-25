<?php

namespace App\Repositories\Adapters;

abstract readonly class DataObjectAdapter extends PersistentAdapter
{
    /**
     * Define the default timezone
     * @var string
     */
    protected const string TIMEZONE = 'Asia/Dhaka';

    /**
     * Define the UI avatar url
     * @var string
     */
    protected const string UI_AVATAR = 'https://ui-avatars.com/api/?background=random&color=fff&bold=true&format=svg&name=';

    /**
     * Create a new data object instance
     * @return void
     */
    abstract public function __construct();

    /**
     * Data object from incoming data
     * @param  object|array $data
     * @return static
     */
    abstract public static function from(object|array $data): static;
}
