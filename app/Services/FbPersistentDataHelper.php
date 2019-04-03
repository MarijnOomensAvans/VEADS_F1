<?php
namespace App\Helpers;

use Facebook\PersistentData\PersistentDataInterface;

class FbPersistentDataHelper implements PersistentDataInterface {

    /**
     * Get a value from a persistent data store.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return session()->get($key);
    }

    /**
     * Set a value in the persistent data store.
     *
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value)
    {
        session()->put($key, $value);
    }
}
