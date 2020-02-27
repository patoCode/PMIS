const { callService, composeUri} = require('../helpers/request')
const config = require('../config/config')
const dsgService = {}
/* Not determinated at start, but also declared it, type is LET no CONST */
let _base = ""


dsgService.loadForm = (next) => {
    var _path = 'list';
    _base = '/Form/'
    config.options.uri = composeUri(config._apiBase, _base, _path)
    config.options.method = 'GET'

    callService(config.options, next, (users, err) => {
        if (err) {
            next(null, err)
        } else {
            next(users, null)
        }
    })
}

dsgService.create = (body, next) => {
    var _path = 'create';
    config.options.uri = composeUri(config._apiBase, _base, _path)
    config.options.method = 'POST'
    config.options.json = body
    callService(config.options, (create, err) => {
        if (err) {
            next(null, err)
        } else {
            next(create, null)
        }
    })
}

dsgService.addGroup = (body, next) => {
    var _path = 'addGroup';
    config.options.uri = composeUri(config._apiBase, _base, _path)
    config.options.method = 'POST'
    config.options.json = body
    console.log(body)
    callService(config.options, (create, err) => {
        if (err) {
            next(null, err)
        } else {
            next(create, null)
        }
    })
}


module.exports = dsgService