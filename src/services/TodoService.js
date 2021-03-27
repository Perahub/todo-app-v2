const url = "https://jsonplaceholder.typicode.com/todos"

class TodoService {
    // Fetch all todos
    static async getAllByUser(id) {
        const response = await fetch(url + `?userId=${id}`);
        const todos = await response.json();
        return todos;
    }

    static async addTodoForUser(id, text, todos) {
        const maxId = await Math.max.apply(Math, todos.map(todo => {
            return todo.id;
        }));

        console.log(maxId);

        const requestOptions = {
            method: 'POST',
            body: JSON.stringify({
                title: text,
                completed: false,
                userId: id
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        }

        const response = await fetch(url, requestOptions);
        const todo = await response.json();

        todo.id = maxId + 1;
        todos.push(todo)

        console.log(todo)
        return todos;
    }

    static async update(todo, todos) {
        const requestOptions = {
            method: 'PATCH',
            body: JSON.stringify({
                title: todo.title,
                completed: todo.completed
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        }

        const response = await fetch(url + `/${todo.id}`, requestOptions);
        const updated = await response.json();

        todos[todos.findIndex(x => x.id === updated.id)] = updated;

        return todos;
    }

    static async delete(id) {
        const requestOptions = {
            method: 'DELETE',
        }

        await fetch(url + `/${id}`, requestOptions);
    }
}

export default TodoService;