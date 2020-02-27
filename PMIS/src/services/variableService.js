const request = require('request')
const serialize = require('node-serialize')
const { callService } = require('../helpers/request')
const { composeUri } = require('../helpers/request')
const config = require('../config/config')
const variableService = {}
const _base = "/Variable/"


variableService.loadVariable = (next) => {
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

variableService.create = (body, next) => {
    var _path = 'create';
    config.options.uri = composeUri(config._apiBase, _base, _path)
    config.options.method = 'POST'
    config.options.json = body

    console.log("ENVIANDO.. ", body)

    callService(config.options, (create, err) => {
        if (err) {
            next(null, err)
        } else {
            next(create, null)
        }
    })
}

module.exports = variableService