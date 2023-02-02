<?php

namespace App\Controller\Public;

use App\Utils\View;
use WilliamCosta\DatabaseManager\Database;
use App\Model\Entity\Task as EntityTask;

class Home extends Page
{

    private static function getStatusItems($request)
    {
        $itens = '';

        $status = EntityTask::$mapStatus;

        foreach ($status as $key => $value) {
            $itens .= View::render('views/home/status', [
                'status' => $key,
                'status_name' => $value,
            ]);
        }

        return $itens;
        
        
    }


    public static function getNotStartedTasks()
    {
        $tasks = '';

        // RESULTS
        $results = (new Database('tasks'))->select('status = '."1", 'id ASC');

        // RENDER ITEM
        while ($obTask = $results->fetchObject(EntityTask::class)) {
            $tasks .= View::render('views/home/tasks', [
                'task_id' => $obTask->id,
                'task_title' => $obTask->title,
                'task_description' => $obTask->description,
                'task_date' => date('d/m/Y H:i', strtotime($obTask->date)),
                'task_status' => $obTask->status,
            ]);
        }

        return $tasks;
    }

    public static function getInProgressTasks()
    {
        $tasks = '';

        // RESULTS
        $results = (new Database('tasks'))->select('status = '."2", 'id ASC');

        // RENDER ITEM
        while ($obTask = $results->fetchObject(EntityTask::class)) {
            $tasks .= View::render('views/home/tasks', [
                'task_id' => $obTask->id,
                'task_title' => $obTask->title,
                'task_description' => $obTask->description,
                'task_date' => date('d/m/Y H:i', strtotime($obTask->date)),
                'task_status' => $obTask->status,
            ]);
        }

        return $tasks;
    }

    public static function getCompletedTasks()
    {
        $tasks = '';

        // RESULTS
        $results = (new Database('tasks'))->select('status = '."3", 'id ASC');

        // RENDER ITEM
        while ($obTask = $results->fetchObject(EntityTask::class)) {
            $tasks .= View::render('views/home/tasks', [
                'task_id' => $obTask->id,
                'task_title' => $obTask->title,
                'task_description' => $obTask->description,
                'task_date' => date('d/m/Y H:i', strtotime($obTask->date)),
                'task_status' => $obTask->status,
            ]);
        }

        return $tasks;
    }

    /**
     * Method to return home view
     * @return string
     */
    public static function getHome($request, $errorMessage = null)
    {

        $queryParams = $request->getQueryParams();

        if(isset($queryParams["status"]) && isset($queryParams["id"])){
            $obTask = EntityTask::getTaskById($queryParams["id"]);
            if(!$obTask instanceof EntityTask){
                $request->getRouter()->redirect('/');
            }
            $obTask->changeStatus($queryParams["status"]);
            $request->getRouter()->redirect('/');
        }

        if(isset($queryParams["d"])){
            $obTask = EntityTask::getTaskById($queryParams["d"]);
            if(!$obTask instanceof EntityTask){
                $request->getRouter()->redirect('/');
            }
            $obTask->delete($queryParams["d"]);
            $request->getRouter()->redirect('/');
        }

        $statusError = !is_null($errorMessage) ? Alert::getError($errorMessage) : '';

        $elements = self::getElements();
        return View::render('views/home', [
            'title' => "PHP - KanbanBoard",
            'links' => $elements["links"],
            'scriptlinks' => $elements["scriptlinks"],
            'not_started_tasks' => self::getNotStartedTasks(),
            'in_progress_tasks' => self::getInProgressTasks(),
            'completed_tasks' => self::getCompletedTasks(),
            'select_status' => self::getStatusItems($request),
            'statusError' => $statusError,
        ]);
    }

    public static function setTask($request){

        $postVars = $request->getPostVars();

        $title = $postVars["title"];
        $description = $postVars["description"];
        $status = $postVars["status"];

        if(empty($title) or empty($description) or empty($status)){
            return self::getHome($request, 'There are empty fields!');
        }

        $obTask = new EntityTask;
        $obTask->title = $title;
        $obTask->description = $description;
        $obTask->status = $status;

        $obTask->insert();

        $request->getRouter()->redirect('/');

    }
}
