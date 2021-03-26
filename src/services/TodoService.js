const url = "https://jsonplaceholder.typicode.com/todos"

class TodoService {
    // Fetch all todos
    static async fetchAll() {
        const response = await fetch(url);
        const todos = await response.json();
        console.log(todos)
        return todos;
    }
}

export default TodoService;