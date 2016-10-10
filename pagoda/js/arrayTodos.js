
function displayTodos(){
console.log('My todos:'
, todos);
}

function addTodo(todo){
todos.push(todo);
displayTodos();
}

function changeTodo(postion,newValue){
todos[postion] = newValue;
displayTodos();
}


function deleteTodo(position) {
todos.splice(position, 1);
displayTodos();
}