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

    public function modify($id, $params=[])
    {

    }

    public function delete($id):void
    {
        $sql='DELETE FROM meetings WHERE id=:id';
        $this->connect()->prepare($sql)->execute($id);
    }
}
