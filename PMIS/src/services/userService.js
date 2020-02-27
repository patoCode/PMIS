const request = require('request')
const serialize = require('node-serialize')
const { callService } = require('../helpers/request')
const { composeUri } = require('../helpers/request')
const config = require('../config/config')
const userService = {}
const _base = "/User/"


userService.loadUsers = (next) => {
    var _path = 'list';

    config.options.uri = composeUri(config._apiBase, _base, _path)
    config.options.method = 'GET'

    callService(config.options, null, (users, err) => {
        if (err) {
            next(null, err)
        } else {
            next(users, null)
        }
    })
}

userService.login = (username, password, next) => {
    var _path = 'login';

    config.options.uri = composeUri(config._apiBase, _base, _path)
    config.options.method = 'POST'

    var userData = {
		username : username,
		password : password
    }
    config.options.json = userData

    callService(config.options, (login, err) => {
        if (err) {
            next(null, err)
        } else {
            next(login, null)
        }
    })
}

module.exports = userService