const request = require('request')

const helpers = {}

helpers.callService = (options, next) => {
    request(options, (err, response, body) => {
        if (!err && response.statusCode == 200) {
            console.log(options.json)
            next(body, null)
        }else{
            next(null, err)
        }
    })
}

helpers.composeUri = (api, base, specific) => {
    return api + base + specific
}


module.exports = helpers
