import Sortable from 'sortablejs';

let taskContainer = document.querySelector('#task-container');

Sortable.create(taskContainer, {
    onEnd: function(event) {

        let selectedTask = event.item
        let selectedTaskId = selectedTask.closest('.task-item').dataset.id
        let taskMovement = (event.newIndex) - (event.oldIndex)

        axios({
            method: 'put',
            url: `/api/v1/tasks/${selectedTaskId}/arrange-order`,
            data: {
                movement: taskMovement
            }
        })
    },
    animation: 150
});
