const url = "https://jsonplaceholder.typicode.com/users"

class UserService {
    // Fetch all users
    static async authenticate(username, password) {
        const response = await fetch(url + `?username=${username}`);
        const user = await response.json();
        if (password === user[0].email) {
            return user[0];
        } else {
            return null;
        }
    }

    static async addPassword(id, password) {
        console.log(id, password)
        const requestOptions = {
            method: 'PATCH',
            body: JSON.stringify({
                password: password
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        }

        const response = await fetch(url + `/${id}`, requestOptions)
        const user = await response.json();
        console.log(user)
    }

    static async update(user) {
        const requestOptions = {
            method: 'PUT',
            body: JSON.stringify({
                title: user.title,
                completed: user.completed
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            }
        }

        return requestOptions;
    }
}

export default UserService;