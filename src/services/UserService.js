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
}

export default UserService;