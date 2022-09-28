<?php
namespace Models;
//require_once 'src/connection.php';

class Meeting {


    public function connect()
    {
        try {
            $connection = new \PDO("mysql:host=localhost;dbname=bwt_task",
                'root','root');
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $connection;
    }

    public function all()
    {
        $sql =  'SELECT * FROM meetings';
        return $this->connect()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get($id)
    {
        $sql =  'SELECT * FROM meetings WHERE id=:id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($id);
        return $stmt->fetchAll();
    }

    public function update($data)
    {
        $sql = 'UPDATE meetings SET title=:title, country=:country, date=:date, latitude=:latitude,
                    longitude=:longitude WHERE id=:id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':date', $data['date']);
        $stmt->bindParam(':country', $data['country']);
        $stmt->bindParam(':latitude', $data['latitude']);
        $stmt->bindParam(':longitude', $data['longitude']);
        $stmt->execute();
    }

    public function delete($id):void
    {
        $sql='DELETE FROM meetings WHERE id=:id';
        $this->connect()->prepare($sql)->execute($id);
    }
}
