<?php

namespace models;

use libs\Database;

class User extends Database
{
    const TABLENAME = 'users';

    const PRIMARY_KEY = 'user_id';

    const USERNAME = 'username';

    const PASSWORD = 'password';

    const EMAIL = 'email';

    public function getUsers()
    {
        return $this->createQuery('SELECT *', self::TABLENAME);
    }

    public function getByUsername($username)
    {
        return $this->createQuery('SELECT *', self::TABLENAME, [self::USERNAME => $username])->results;
    }

    public function getById($id)
    {
        return $this->createQuery('SELECT *', self::TABLENAME, [self::PRIMARY_KEY => $id])->getResults()[0];
    }

    public function deleteUser($conditions)
    {
        $this->createQuery('DELETE', self::TABLENAME, $conditions);
    }

    public function addUser($data)
    {
        $this->add(self::TABLENAME, $data);
    }

    public function updateById($id, $data)
    {
        $this->update(self::TABLENAME, self::PRIMARY_KEY, $id, $data);
    }

    // FIX THIS
    public function updateByUsername($username, $data)
    {
        $this->update(self::TABLENAME, self::USERNAME, $username, $data);
    }
}
