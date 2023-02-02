<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{title}}</title>
    <link rel="stylesheet" href="{{URL}}/resources/views/styles/home.css">
    {{links}}
</head>

<body>

    <!-- Simple MDL Progress Bar -->
    <div id="p1" class="mdl-progress mdl-js-progress"></div>
    <div class="kanban__title">
        <h1><i class="fa-solid fa-check"></i> KanbanBoard</h1>
    </div>
    <div class="dd">

        <!--Not started table-->
        <ol class="kanban To-do">
            <div class="kanban__title">
                <h2><i class="fa-solid fa-circle-exclamation"></i> Not started</h2>
            </div>
            {{not_started_tasks}}
        </ol>

        <!--In progress table-->
        <ol class="kanban progress">
            <h2><i class="fa-solid fa-wrench"></i> In progress</h2>
            {{in_progress_tasks}}
        </ol>

        <!--Completed table-->
        <ol class="kanban Done">
            <h2><i class="fa-solid fa-circle-check"></i> Completed</h2>
            {{completed_tasks}}
        </ol>

    </div>
    <menu class="kanban">
        <h2>Create Task</h2>
        <form method="post">
            <div class="input-group input-group-sm mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Title</span>
                </div>
                <input name="title" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group mb-2">
                <label for="exampleFormControlSelect1">Status</label>
                <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option value=""></option>
                    {{select_status}}
                </select>
            </div>
            <div class="actions">
                <button class="addbutt"><i class="fa-solid fa-plus"></i> Add new</button>
            </div>
            {{errorStatus}}
        </form>
    </menu>
    {{scriptlinks}}
</body>

</html>