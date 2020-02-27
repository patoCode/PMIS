var userService = require('../services/userService')

const user = {}
/**
 * Gets all the users and list them all in screen.
 */
user.list = (req, res) => {
    // Use the method loadUsers form userService to get all the users
    userService.loadUsers((users, err) =>{
        if (err) {
            console.error('Error al recuperar los usuarios')
        } else {
            console.log('Users recuperados:', users)
            res.render('user/list', {users: users.list})
        }
    })
}

user.login = (req, res) => {
    const { username, password } = req.body
    const session = {};
    userService.login(username, password, (login, err) =>{
        if (err) {
            console.error('Error al logear ', err)
        } else {
            if (login.result == 1) {
                // MOCK USER
                console.log(login)
                session.menu = login.elmentList
                session.user = login.element
                res.render('user/dashboard', {session: session})
                console.log(session)
            } else {
                console.log("ERROR de login, las credenciales no coinciden")
                res.redirect('user/login');
            }
        }
    })

}

module.exports = user