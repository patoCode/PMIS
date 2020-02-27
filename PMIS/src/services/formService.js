const request = require('request')
const serialize = require('node-serialize')
const { callService } = require('../helpers/request')
const { composeUri } = require('../helpers/request')
const config = require('../config/config')
const formService = {}
const _base = "/Form/"


formService.loadForms = (next) => {
    var _path = 'list';
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

formService.create = (body, next) => {
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

formService.addGroup = (body, next) => {
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


module.exports = formService