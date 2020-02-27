var variableService = require('../services/variableService')
var {menu, user} = require('../config/static.config')


const variable = {}
const session = {};
session.user = user
session.menu = menu

variable.list = (req, res) => {
    //TODO GET MENU OFF SESSION
    variableService.loadVariable((data, err) =>{
        if (err) {
            console.error('Error al recuperar los variables')
        } else {
            session.list = data.list
            res.render('variable/list', {session, title: "Lista de Variables", smallLegend: 'Pequeña descripcion de la pantalla', })
            //res.render('user/list', {users: users.list})
        }
    })
}

variable.create = (req, res) => {
    //console.log(req.body)
    //TODO GET MENU OFF SESSION

    variableService.create(req.body, (data, err) =>{
        if (err) {
            console.error('Error al recuperar los variables')
        } else {
            res.redirect('/variable/list')
            //res.render('user/list', {users: users.list})
        }
    })
}



module.exports = variable