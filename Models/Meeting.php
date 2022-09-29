<?php
namespace Models;

class Meeting {

    public function connect() //Подключение к БД
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

    public function all() //Получение всех данных таблицы
    {
        $sql =  'SELECT * FROM meetings';
        return $this->connect()->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get($id) //Получение конкретной записи
    {
        $sql =  'SELECT * FROM meetings WHERE id=:id';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute($id);
        return $stmt->fetchAll();
    }

    public function update($data):void //Изменение данных
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

    public function create($data):void //Добавление строки
    {
        $sql = 'INSERT INTO meetings (title, country, date, latitude, longitude)
        VALUES (:title, :country, :date, :latitude, :longitude)';
        $this->connect()->prepare($sql)->execute($data);
    }

    public function delete($id):void //Удаление строки
    {
        $sql='DELETE FROM meetings WHERE id=:id';
        $this->connect()->prepare($sql)->execute($id);
    }
}
