<?php

namespace App\Model\Entity;

use WilliamCosta\DatabaseManager\Database;
use PDO;

class Task{

    /**
     * Task id
     * @var int
     */
    public $id;

    /**
     * Task title
     * @var string
     */
    public $title;

    /**
     * Task description
     * @var string
     */
    public $description;

    /**
     * Task date creation
     * @var string
     */
    public $date;

    /**
     * Task status
     * @var int
     */
    public $status;

    /**
     * Status mapper
     * @var array
     */
    public static $mapStatus = [
        1 => "Not started",
        2 => "In progress",
        3 => "Completed"
    ];

    public static function getTaskById($id){
        return (new Database('tasks'))->select('id = ' . $id)->fetchObject(self::class);
    }

    /**
     * Insert task on db
     * @return boolean
     */
    public function insert(){

        $this->id = (new Database('tasks'))->insert([
            'title' => $this->title,
            'description' => $this->description,
            'date' => date('Y-m-d H:i:s'),
            'status' => $this->status
        ]);

        return true;
    }

    /**
     * Delete task on db
     * @return boolean
     */
    public function delete(){
        return (new Database('tasks'))->delete('id = ' . $this->id);
    }

    /**
     * Change task status
     * @param int $newStatus
     * @return boolean
     */
    public function changeStatus($newStatus){
        $values = [
            "status" => $newStatus
        ];
        return (new Database('tasks'))->update('id = '.$this->id,$values);
    }

}