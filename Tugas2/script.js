let todoList = [];

function addTask() {
    const taskInput = document.getElementById('todo-input');
    const taskText = taskInput.value.trim();

    if (taskText !== '') {
        todoList.push({ id: Date.now(), text: taskText });
        taskInput.value = '';
        renderList();
    }
}

function deleteTask(id) {
    todoList = todoList.filter(task => task.id !== id);
    renderList();
}

function editTask(id) {
    const newText = prompt("Edit your task:");
    if (newText) {
        todoList = todoList.map(task => task.id === id ? { ...task, text: newText } : task);
        renderList();
    }
}

function renderList() {
    const listElement = document.getElementById('todo-list');
    listElement.innerHTML = '';

    todoList.forEach(task => {
        const li = document.createElement('li');
        li.textContent = task.text;

        const editButton = document.createElement('button');
        editButton.className = 'edit';
        editButton.textContent = 'Edit';
        editButton.onclick = () => editTask(task.id);
        li.appendChild(editButton);

        const deleteButton = document.createElement('button');
        deleteButton.className = 'delete';
        deleteButton.textContent = 'Delete';
        deleteButton.onclick = () => deleteTask(task.id);
        li.appendChild(deleteButton);

        listElement.appendChild(li);
    });
}
