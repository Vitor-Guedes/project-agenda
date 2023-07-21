<?php

namespace Guedes\Agenda\Models;

use Guedes\Agenda\MysqlConnection;

class Contact
{
    protected $connection;

    public function __construct()
    {
        $this->connection = MysqlConnection::make();    
    }

    /**
     * @return array
     */
    public function getAll() : array
    {
        $query = 'SELECT * FROM contacts';
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? $stmt->fetchAll() : [];
    }

    /**
     * @param int $id
     * 
     * @return array
     */
    public function findById(int $id) : array
    {
        $query = 'SELECT * FROM contacts WHERE id = :id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? $stmt->fetch() : [];
    }

    /**
     * @param array $data
     * 
     * @return bool
     */
    public function create(array $data = [])
    {
        $query = 'INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)';
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':observations', $data['observations']);
        return $stmt->execute();
    }

    /**
     * @param array $data
     * 
     * @return bool
     */
    public function update(array $data = [])
    {
        $query = 'UPDATE contacts set name = :name, phone = :phone, observations = :observations WHERE id = :id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':phone', $data['phone']);
        $stmt->bindParam(':observations', $data['observations']);
        return $stmt->execute();
    }

    /**
     * @param int $id
     * 
     * @return bool
     */
    public function delete(int $id)
    {
        $query = 'DELETE FROM contacts WHERE id = :id';
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();;
    }
}