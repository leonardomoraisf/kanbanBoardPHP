<li class="dd-item">
    <h3 class="title dd-handle"><i class="fa-solid fa-filters"></i>{{task_title}}</h3>
    <div class="text">{{task_description}}</div>
    <small>{{task_date}}</small>
    <div class="actions">
        <a href="{{URL}}/?status=1&id={{task_id}}" type="button" class="btn btn-notstarted"><i class="fa-solid fa-circle-exclamation"></i></a>
        <a href="{{URL}}/?status=2&id={{task_id}}" type="button" class="btn btn-inprogress"><i class="fa-solid fa-wrench"></i></a>
        <a href="{{URL}}/?status=3&id={{task_id}}" type="button" class="btn btn-completed"><i class="fa-solid fa-circle-check"></i></a>
        <a href="{{URL}}/?d={{task_id}}" type="button" class="btn btn-delete"><i class="fa-solid fa-trash"></i></a>
    </div>
</li>