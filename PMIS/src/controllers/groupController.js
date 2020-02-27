var groupService = require('../services/groupService')
var {menu, user} = require('../config/static.config')


const group = {}
const session = {};
session.user = user
session.menu = menu

group.list = (req, res) => {
    //TODO GET MENU OFF SESSION
    groupService.loadGroups((data, err) =>{
        if (err) {
            console.error('Error al recuperar los groups')
        } else {
            session.list = data.list
            res.render('group/list', {session, title: "Lista de groups", smallLegend: 'Pequeña descripcion de la pantalla', })
            //res.render('user/list', {users: users.list})
        }
    })
}

group.create = (req, res) => {
    groupService.create(req.body, (_data, err) =>{
        if (err) {
            console.error('Error al recuperar los groups')
        } else {
            res.redirect('/group/list')
            //res.render('user/list', {users: users.list})
        }
    })
}

group.addVariable = (req, res) => {
    groupService.addVariable(req.body, (_data, err) =>{
        if (err) {
            console.error('Error al recuperar los groups')
        } else {
            res.redirect('/group/list')
        }
    })
}



module.exports = group